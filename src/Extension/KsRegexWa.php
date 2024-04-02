<?php

/**
 * @version    1.0.0
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
use Joomla\CMS\Event\Content\BeforeDisplayEvent;

final class KsRegexWa extends CMSPlugin implements SubscriberInterface
{
    protected $autoloadLanguage = true;
    protected $allowLegacyListeners = false;

    public static function getSubscribedEvents(): array
    {
        return [
            'onContentBeforeDisplay' => 'onContentBeforeDisplay',
        ];
    }

    public function onContentBeforeDisplay(BeforeDisplayEvent $event): void
    {
        $app = $this->getApplication();
        $document = $app->getDocument();
        $view = $app->input->get('view'); // article, category, featured
        $wa = $document->getWebAssetManager();

        if (!$app->isClient('site')) return; // если это не фронтэнд, то прекращаем работу
        if ($view != 'article' && $view != 'feature') return; // если это не материал и не избранное, то прекращаем работу

        $regexParams = $this->params->get('entry'); // Параметры плагина

        $str = $event->getItem()->fulltext ? $event->getItem()->fulltext : $event->getItem()->introtext;

        // echo '<pre>';
        // \var_dump($view);
        // echo '</pre>';

        foreach ($regexParams as $itemParams) {
            $regex = $itemParams->regex;
            $assetType = $itemParams->{'asset-type'};
            $assetName = $itemParams->{'asset-name'};

            if (preg_match('/' . $regex . '/', $str)) {
                if ($assetType == 0) $wa->useStyle($assetName);
                if ($assetType == 1) $wa->useScript($assetName);
                if ($assetType == 2) $wa->usePreset($assetName);
            }
        }
    }
}
