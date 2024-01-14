<?php

namespace wfm;

abstract class Controller
{
    public array $data = []; //сюда мы будем загружать данные из модели и передавать их в ВИД.
    public array $meta = ['title' => '', 'description' => '', 'keywords' => ''];
    public false|string $layout = ''; //шаблон страницы
    public string $view = ''; //мы можем пепеопределить вид, по умолчанию он будет соответствовать названию Экшена
    public object $model; // объект модели, свойство которое будет автоматически загружаться для данного контролера, если оно есть
    public function __construct(public $route = [])
    {

    }
    public function getModel()
    {
        $model = 'app\models\\' . $this->route['admin_prefix'] . $this->route['controller']; //Расположение модели
        if(class_exists($model)){
            $this->model = new $model(); //если класс модели есть то запишем в нее новый экземпляр модели
        }
    }
//
//    /**
//     * @throws \Exception
//     */
    public function getView()
    {
        $this->view = $this->view ?: $this->route['action']; // (Проверяем переопределили ли вид) Виды будут находиться в папке views в папках с именем контролера и файл index.php
        (new View($this->route, $this->layout, $this->view, $this->meta))->render($this->data);
        //Передаем в Вид маршрут, шаблон, вид и Мета данные и вызываем от этого объекта метод render передав ему данные
    }

    public function set($data)
    {
        $this->data = $data;
    }

    public function setMeta($title = '', $description = '', $keywords = '')
    {
        $this->meta = [
            'title' => $title,
            'description' => $description,
            'keywords' => $keywords,
        ];
    }

}