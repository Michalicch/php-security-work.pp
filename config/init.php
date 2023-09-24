<?php

//Константы путей
define("DEBUG", 1);   // DEBUG с флагом "1" ставят при разработке чтобы видеть все ошибки, по окнчании разработки и выпуска в продакшен "1" нужно заменить на "0"
define("ROOT", dirname(__DIR__)); //Эта константа ведет на корень нашего приложения
define("WWW", ROOT . '/public'); //Эта константа путь к публичной папке
define("APP", ROOT . '/app'); //путь к папке приложения
define("CORE", ROOT . '/vendor/wfm'); //путь к ядру
define("HELPERS", ROOT . '/vendor/wfm/helpers');
define("CACHE", ROOT . '/tmp/cache');
define("LOGS", ROOT . '/tmp/logs');
define("CONFIG", ROOT . '/config');

define("LAYOUT", 'php-security-work.pp'); //шаблон сайта по умолчанию
define("PATH", 'http://php-security-work.pp'); //адрес сайта
define("ADMIN", 'http://php-security-work.pp/admin'); //адрес админки
define("NO_IMAGE", WWW . '/uploads/no_image.jpg'); //адрес картинки которая будет показываться при отсутствии картинки на сайте

require_once ROOT . '/vendor/autoload.php'; //подключение автозагрузчика
