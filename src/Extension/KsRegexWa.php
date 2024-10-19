<?php

/**
 * @version    1.2.0
 * @package    ksregexwa (plugin)
 * @author     Sergey Kuznetsov - mediafoks@google.com
 * @copyright  Copyright (c) 2024 Sergey Kuznetsov
 * @license    GNU/GPL license: https://www.gnu.org/copyleft/gpl.html
 */

namespace Joomla\Plugin\Content\KsRegexWa\Extension;

//kill direct access
\defined('_JEXEC') || die;

use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\Event\SubscriberInterface;
use Joomla\CMS\Event\Content\ContentPrepareEvent;

final class KsRegexWa extends CMSPlugin implements SubscriberInterface
{
    protected $autoloadLanguage = true;
    protected $allowLegacyListeners = false;

    public static function getSubscribedEvents(): array
    {
        return [
            'onContentPrepare' => 'onContentPrepare'
        ];
    }
    /**
     *
     * @param ContentPrepareEvent $event
     *
     * @return  void
     *
     * @since   1.2.0
     */
    public function onContentPrepare(ContentPrepareEvent $event): void
    {
        /**
         * @param   string    $context  The context of the content being passed to the plugin.
         * @param   object   &$row      The article object.  Note $article->text is also available
         * @param   mixed    &$params   The article params
         * @param   integer   $page     The 'page' number
         */

        // Don't run if in the API Application
        // Don't run this plugin when the content is being indexed
        $context = $event->getContext();

        if ($this->getApplication()->isClient('api') || $context === 'com_finder.indexer') {
            return;
        }

        // Get content item
        $row = $event->getItem();

        // If the item does not have a text property there is nothing to do
        if (!property_exists($row, 'text')) {
            return;
        }

        $app = $this->getApplication();
        $document = $app->getDocument();
        $wa = $document->getWebAssetManager();

        $pluginParams = $this->params->get('entry'); // Параметры плагина

        if (!empty($pluginParams)) {
            foreach ($pluginParams as $itemParams) {
                $substring = (string)$itemParams->regex; // Регулярное выражение
                $assetType = (int)$itemParams->{'asset-type'}; // Тип аасета
                $assetName = $itemParams->{'asset-name'}; // Имя ассета

                if (
                    !empty($substring) // Если подстрока не пустая
                    && isset($assetType) // Если выбран тип ассета
                    && !empty($assetName) // Если имя ассета не пустое
                    && str_contains($row->text, $substring) // Если подстрока содержится в теле материала
                ) {
                    if ($assetType === 0 && $wa->assetExists('style', $assetName)) $wa->useStyle($assetName);
                    if ($assetType === 1 && $wa->assetExists('script', $assetName)) $wa->useScript($assetName);
                    if ($assetType === 2 && $wa->assetExists('preset', $assetName)) $wa->usePreset($assetName);
                }
            }
        }
    }
}
