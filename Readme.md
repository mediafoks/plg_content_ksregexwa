[![GitHub Release](https://img.shields.io/github/v/release/mediafoks/plg_content_ksregexwa?display_name=release&style=flat-square&color=blue)](https://github.com/mediafoks/plg_content_ksregexwa/releases)
[![Static Badge](https://img.shields.io/badge/Joomla-5-orange?style=flat-square&logo=joomla&logoColor=white)](https://github.com/joomla/joomla-cms) ![Static Badge](https://img.shields.io/badge/type-plugin-yellow?style=flat-square) ![Static Badge](https://img.shields.io/badge/group-content-violet?style=flat-square)

# KS Regex Wa

## Описание

Плагин контента для Joomla 5.\
Позволяет регистрировать ассет по наличию подстроки в теле материала. HTML разметка тоже учитывается. \
Например, если вам необходимо подключить ассет только тогда, когда он действительно нужен. Плагин ищет в теле материала подстроку, указанную в настройках плагина. В зависимости есть ли соответствие, подключает ассет. Ассет должен присутствовать в joomla.asset.json вашего шаблона. Плагин работает в материалах, категориях, контактах и модулях.

## Пример

Например вам нужно подключить скрипт и стили LightGallery только если на странице есть картинки с `data-lightgallery`.\
В joomla.asset.json вы уже создали ассет типа preset c подключением библиотеки Lightgallery.

**Подстрока:** data-lightgallery\
**Тип ассета:** Пресет\
**Имя ассета:** lightgallery

**Итог:** подключение вашего ассета\
`<link href="https://cdn.jsdelivr.net/npm/lightgallery@2/css/lightgallery-bundle.min.css" rel="lazy-stylesheet" /> <script src="https://cdn.jsdelivr.net/combine/npm/lightgallery@2/lightgallery.min.js,npm/lightgallery@2/plugins/zoom/lg-zoom.min.js,npm/lightgallery@2/plugins/fullscreen/lg-fullscreen.min.js" defer></script>`
