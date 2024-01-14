<?php

namespace app\controllers;

use app\models\Main;
use RedBeanPHP\R;
use wfm\Controller;

/** @property Main $model*/
class MainController extends Controller
{
    //public false|string $layout = 'test2'; //переопределение шаблона можно тут или |
     public function indexAction()
    {
        //$this->layout = 'test'; //переопределение шаблона или тут
        //$names1 = ['Петр', 'ronn', 'ketty']; //можно передавать массивы смотри метод set ниже

        $one_name = R::getAll('SELECT id, number_question, text_question, text_answer FROM questions_base_pp WHERE number_question = 1');

//                                SELECT * FROM questions_base_pp WHERE number_question = 1, 
//                                SELECT * FROM questions_base_pp WHERE number_answer = 1, 
//                                SELECT * FROM questions_base_pp WHERE text_question = 1, 
//                                SELECT * FROM questions_base_pp WHERE text_answer = 1, 
//                                SELECT * FROM questions_base_pp WHERE correct_answer = 1
         $one_name = $this->model->get_names();

        $this->setMeta('Наша Больничка', 'Специализированная клиническая детская инфекционная больница', 'больница, инфекционка, лечебное учреждение, детская больница');

        //compact — Создаёт массив, содержащий названия переменных и их значения
        $this->set(compact('one_name')); // передаем данные из Контроллера (MainController.php) в представление (views/Main/index.php) - это более удобный вариант
        //var_dump($one_name);
        //die();

         //$this->set(['names1'=>$names1]); //передача массива в представление здесь
    }
}