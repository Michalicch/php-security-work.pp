<?php
//front controller
//проверка на используемую версию PHP
if (PHP_MAJOR_VERSION < 8) {
    die('Необходима версия PHP >= 8');
}


require_once dirname(__DIR__) . '/config/init.php'; //Подключение файла конфигурации (констант и автозагрузки пространства имен)
require_once HELPERS . '/functions.php';
require_once CONFIG . '/routes.php';

new \wfm\App();



//throw new Exception('eeeeeeeeeeeeeee');
//echo \wfm\App::$app->getProperty('admin_email'); //вывести клнкретный элемент из массива в params.php
//\wfm\App::$app->setProperty('TEST', 'test'); //добавить в контейнер свойства
 //var_dump(\wfm\App::$app->getProperties());


//debug(\wfm\Router::getRoutes());

