<?php

namespace app\controllers;



use wfm\Controller;

class PageController extends Controller
{
    public function viewAction()
    {
        echo "Page active" . '<br>';
        echo __METHOD__;
        //$this->view = 'Main';

    }

}