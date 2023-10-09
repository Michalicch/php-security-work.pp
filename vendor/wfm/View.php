<?php

namespace wfm;

use RedBeanPHP\R;

class View
{
    public string $content = '';

    public function __construct(
        public $route,
        public $layout = '',
        public $view = '',
        public $meta = [],
    )
    {
        if(false !== $this->layout){
            $this->layout = $this->layout ?: LAYOUT;//layout будет равняться либо тому что там есть, либо константе LAYOUT
        }
    }
//
//    /**
//     * @throws \Exception
//     */
    public function render($data)
    {
        if(is_array($data)) {
            extract($data); //Извлечение данных
        }
        $prefix = str_replace('\\', '/', $this->route['admin_prefix']);//ищем прямой слеш и заменяем его на обратный
        $view_file = APP . "/views/{$prefix}{$this->route['controller']}/{$this->view}.php"; //путь к видам

        if(is_file($view_file)){
            ob_start();
            require_once $view_file;
            $this->content = ob_get_clean();
        }else{
            throw new \Exception("Не найден вид: {$view_file}", 500);
        }

        if(false !== $this->layout){
            $layout_file = APP . "/views/layouts/{$this->layout}.php";
            if(is_file($layout_file)){
                require_once $layout_file;//подключение шаблона если он есть
            }else{
                throw new \Exception("Не найден шаблон {$layout_file}", 500);
            }
        }
    }

    public function getMeta()
    {
        $out = '<title>' . h($this->meta['title']) . '</title>' . PHP_EOL;
        $out .= '<meta name="description" content="'. h($this->meta['description']) . '">' . PHP_EOL;
        $out .= '<meta name="keywords" content="'. h($this->meta['keywords']) . '">' . PHP_EOL;
        return $out;
    }
    public function getDbLogs()
    {
        if(DEBUG){
            $logs = R::getDatabaseAdapter()
                ->getDatabase()
                ->getLogger();
            $logs = array_merge(
                $logs->grep('SELECT'),
                $logs->grep('select'),
                $logs->grep('INSERT'),
                $logs->grep('UPDATE'),
                $logs->grep('DELETE')
            );
            debug($logs);
        }
    }

    public function getPart($file, $data = null)
    {
        if(is_array($data)){
            extract($data);
        }
        $file = APP . "/views/{$file}.php";
        if(is_file($file)){
            require $file;  // require используется потому, что файл может использоваться в разных местах больше одного раза
        }else{
            echo "Файл {$file} не найден...";
        }
    }
}