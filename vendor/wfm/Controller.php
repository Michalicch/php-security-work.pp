<?php

namespace wfm;

abstract class Controller
{
    public array $data = []; //сюда мы будем загружать данные из модели и передавать их в ВИД.
    public array $meta = ['title' => '', 'keywords' => '', 'description' => ''];
    public false|string $layout = ''; //шаблон страницы
    public string $view = '';
    public object $model;
    public function __construct(public $route = [])
    {

    }
    public function getModel()
    {
        $model = 'app\models\\' . $this->route['admin_prefix'] . $this->route['controller'];
        if(class_exists($model)){
            $this->model = new $model();
        }
    }
//
//    /**
//     * @throws \Exception
//     */
    public function getView()
    {
        $this->view = $this->view ?: $this->route['action'];
        (new View($this->route, $this->layout, $this->view, $this->meta))->render($this->data);
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