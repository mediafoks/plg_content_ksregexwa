[![Version](https://flat.badgen.net/github/release/mediafoks/plg_content_ksregexwa/stable?color=blue)]() [![JoomlaVersion](https://flat.badgen.net/badge/Joomla/5.0/orange)]() [![Type](https://flat.badgen.net/badge/type/plugin/yellow)]() [![Group](https://flat.badgen.net/badge/group/content/gray)]()

# KS Regex Wa

## Описание

Плагин контента для Joomla 5.\
Позволяет регистрировать ассет по регулярному выражению.\
Например, если вам необходимо подключить ассет только тогда, когда он действительно нужен. Плагин ищет в материале соответствие регулярному выражению, в зависимости есть ли соответствие, подключает ассет. Ассет должен присутствовать в joomla.asset.json вашего шаблона.

## Пример

Например вам нужно подключить скрипт и стили LightGallery только если в материале есть картинки с `data-lightgallery`.

**Регулярное выражение:** data-lightgallery\
**Тип ассета:** Пресет\
**Имя ассета:** lightgallery

**Итог:** подключение вашего ассета\
`<link href="https://cdn.jsdelivr.net/npm/lightgallery@2/css/lightgallery-bundle.min.css" rel="lazy-stylesheet" /> <script src="https://cdn.jsdelivr.net/combine/npm/lightgallery@2/lightgallery.min.js,npm/lightgallery@2/plugins/zoom/lg-zoom.min.js,npm/lightgallery@2/plugins/fullscreen/lg-fullscreen.min.js" defer></script>`
