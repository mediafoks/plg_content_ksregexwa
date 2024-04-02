[![Version](https://flat.badgen.net//github/release/mediafoks/plg_content_ksregexwa/stable?color=blue)]() [![JoomlaVersion](https://flat.badgen.net/badge/Joomla/5.0/orange)]()

# KS Regex Wa

## Описание

Плагин контента для Joomla 5.\
Позволяет регистрировать Asset по регулярному выражению.\
Например, если вам необходимо подключить Asset только тогда, когда он действительно нужен. Плагин ищет в тексте соответствие регулярному выражению, в зависимости есть ли соответствие, подключает Asset.

## Пример

Например вам нужно подключить скрипт и стили LightGallery только если в тексте есть картинки с `data-lightgallery`.

**Регулярное выражение:** data-lightgallery\
**Тип ассета:** Пресет\
**Имя ассета:** lightgallery

**Итог:** подключение вашего ассета\
`<link href="https://cdn.jsdelivr.net/npm/lightgallery@2/css/lightgallery-bundle.min.css" rel="lazy-stylesheet" />\ <script src="https://cdn.jsdelivr.net/combine/npm/lightgallery@2/lightgallery.min.js,npm/lightgallery@2/plugins/zoom/lg-zoom.min.js,npm/lightgallery@2/plugins/fullscreen/lg-fullscreen.min.js" defer></script>`
