<?php

namespace wfm;

class App
{
    public static $app; //В это свойство записывается контейнер формирующийся через Registry.php
    public function __construct()
    {
        $query = trim(urldecode($_SERVER['QUERY_STRING']), '/'); //строка запроса без слешей
        new ErrorHandler();
        self::$app = Registry::getInstance();
        $this->getParams();
        Router::dispatch($query);

    }

    protected function getParams()
    {
        $params = require_once CONFIG . '/params.php';
        if(!empty($params)) {
            foreach ($params as $k => $v) {
                self::$app->setProperty($k, $v);
            }
        }
    }


}