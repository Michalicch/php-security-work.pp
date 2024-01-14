<?php

namespace wfm;

class Router
{
    protected static array $routes = []; //таблица маршрутов
    protected static array $route = []; //один конкретный маршрут которому найдено соответствие

    public static function add($regexp, $route = [])
    {
        self::$routes[$regexp] = $route;
    }
    public static function getRoutes(): array //метод вовращает все имеющиеся маршруты
    {
        return self::$routes;
    }
    public static function getRoute(): array //метод возвращает конкретный маршрут найденный по соответствию
    {
        return self::$route;
    }
    protected static function removeQueryString($url)
    {
        if($url){
            $params = explode('&', $url, 2); //разбиваем адрес на два элемента до первого & и после, то что после это get параметры и тд
            if(false === str_contains($params[0], '=')){ //проверяем елементы масива на знак = если он есть то этот элемен относится к get параметрам
                return rtrim($params[0], '/');//удаляем последний слеш и возвращаем строку
            }
        }
        return '';
    }
    public static function dispatch($url)

    {

        $url = self::removeQueryString($url); //удаляем из url get-параметры
        if(self::matchRoute($url)){
            
//            if(!empty(self::$route['lang'])){
//                App::$app->setProperty('lang', self::$route['lang']);
        //}
           $controller = 'app\controllers\\' . self::$route['admin_prefix'] . self::$route['controller'] . 'Controller';
            if(class_exists($controller)) {

                /** @var Controller $controllerObject */
                $controllerObject = new $controller(self::$route);

                $controllerObject->getModel();

                $action = self::lowerCamelCase(self::$route['action'] . 'Action');
                if(method_exists($controllerObject, $action)){
                    $controllerObject->$action();
                    $controllerObject->getView(); //вид нужно подключать после Экшена, чтобы была возможность его переопределить

                }else{

                    throw new \Exception("Метод {$controller}::{$action} не найден!", 404);
                }
            }else{
                throw new \Exception("Контроллер {$controller} не найден!", 404);
            }
        }else{
          throw new \Exception("Страница не найдена!", 404);
        }
    }

    //метод сравнивает поступивший запрос с шаблоном регулярного выражения
    public static function matchRoute($url): bool
    {
        foreach (self::$routes as $pattern => $route){
            if(preg_match("#{$pattern}#", $url, $matches)){
                foreach ($matches as $k=>$v){
                    if(is_string($k)){
                        $route[$k] = $v;
                    }
                }
                if(empty($route['action'])){
                    $route['action'] = 'index';
                }
                if(!isset($route['admin_prefix'])){
                    $route['admin_prefix'] = '';
                }else{
                    $route['admin_prefix'] .= '\\'; // "\\" нужен для пространства имен
                }
                $route['controller'] = self::upperCamelCase($route['controller']);
                self::$route = $route;

                return true;
            }
        }
        return false;
    }

    protected static function upperCamelCase($name): string
    {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $name)));
    }
    protected static function lowerCamelCase($name): string
    {
        return lcfirst(self::upperCamelCase($name));
    }

}