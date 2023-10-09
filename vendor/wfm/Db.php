<?php

namespace wfm;

use RedBeanPHP\R;
use RedBeanPHP\RedException;
class Db
{
    use TSingleton;

    private function __construct()
    {
        $db = require_once CONFIG . '/config_db.php'; //настройки подключения в базе данных
        R::setup($db['dsn'], $db['user'], $db['password']);
        if(!R::testConnection()) { //Проверка подключения к базе
            throw new \Exception('Нет  подключения к базе данных DB', 500);
        }
        R::freeze(true);//Замораживаем модификацию подключения
        if (DEBUG) {
            R::debug(true, 3);
        }
    }
}