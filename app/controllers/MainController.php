<?php

namespace app\controllers;

use app\models\Main;
use RedBeanPHP\R;
use wfm\Controller;

/** @property Main $model*/
class MainController extends Controller
{
     public function indexAction()
    {
        $names = $this->model->get_names();

        $one_name = R::getRow('SELECT * FROM questions_base_pp WHERE id = 1');

//                                SELECT * FROM questions_base_pp WHERE number_question = 1, 
//                                SELECT * FROM questions_base_pp WHERE number_answer = 1, 
//                                SELECT * FROM questions_base_pp WHERE text_question = 1, 
//                                SELECT * FROM questions_base_pp WHERE text_answer = 1, 
//                                SELECT * FROM questions_base_pp WHERE correct_answer = 1


        $this->setMeta('Главная страница', 'Description...', 'keywords...');
        $this->set(compact('names'));
    }
}