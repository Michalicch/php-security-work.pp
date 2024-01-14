<?php

namespace app\controllers\admin;

use wfm\Controller;
use RedBeanPHP\R;

class MainController extends Controller
{
    public function indexAction()
    {
        echo '<br>' . 'ADMIN AREA';
    }
}