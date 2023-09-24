<?php
//front controller
if (PHP_MAJOR_VERSION < 8) {
    die('Необходима версия PHP >= 8');
}


require_once dirname(__DIR__) . '/config/init.php';


//require_once HELPERS . '/functions.php';
//require_once CONFIG . '/routes.php';

new \wfm\App();



//throw new Exception('eeeeeeeeeeeeeee');
echo \wfm\App::$app->getProperty('admin_email');
//\wfm\App::$app->setProperty('TEST', 'test');
//var_dump(\wfm\App::$app->getProperties());


//debug(\wfm\Router::getRoutes());

