[![GitHub Release](https://img.shields.io/github/v/release/mediafoks/plg_content_ksregexwa?display_name=release&style=flat-square&color=blue)](https://github.com/mediafoks/plg_content_ksregexwa/releases)
[![Static Badge](https://img.shields.io/badge/Joomla-5-orange?style=flat-square&logo=joomla&logoColor=white)](https://github.com/joomla/joomla-cms) ![Static Badge](https://img.shields.io/badge/type-plugin-yellow?style=flat-square) ![Static Badge](https://img.shields.io/badge/group-system-violet?style=flat-square)

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
