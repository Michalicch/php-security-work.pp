<?php

namespace wfm;

class ErrorHandler
{
    public function __construct()
    {
        // https://habr.com/ru/articles/161483/
        if(DEBUG){
            error_reporting(-1);
        } else {
            error_reporting(0);
        }
        set_exception_handler([$this, 'exceptionHandler']); // в этом классе используем функцию обработчик exceptionHandler
        set_error_handler([$this, 'errorHandler']); // устанавливаем пользовательский обработчик ошибок
        ob_start(); //буферизируем ошибку, чтобы она не выводилась
        register_shutdown_function([$this, 'fatalErrorHandler']); // регистрируем функцию, которая выполняется после завершения работы скрипта (например, после фатальной ошибки)
    }

    public function errorHandler($errno, $errstr, $errfile, $errline){
        $this->logError($errstr, $errfile, $errline);
        $this->displayError($errno, $errstr, $errfile, $errline);
    }
    public function fatalErrorHandler(){
        $error = error_get_last();
        if(!empty($error) && $error['type'] & (E_ERROR | E_PARSE | E_COMPILE_ERROR | E_CORE_ERROR)) {
            $this->logError($error['message'], $error['file'], $error['line']);
            ob_end_clean(); // очищаем буффер (не выводим стандартное сообщение об ошибке)
            $this->displayError($error['type'], $error['message'], $error['file'], $error['line']);
        }else{
            ob_end_flush(); // отправка (вывод) буфера и его отключение
        }
    }

    public function exceptionHandler(\Throwable $e)
    {
        //возникшую ошибку мы должны 1.залогировать и 2. показать пользователю.
        $this->logError($e->getMessage(), $e->getFile(), $e->getLine());
        $this->displayError('Исключение', $e->getMessage(), $e->getFile(), $e->getLine(), $e->getCode());

    }

    protected function logError($message = '', $file = '', $line = '')
    {
        file_put_contents(
            LOGS . '/errors.log',
            "[" . date('Y-m-d H:i:s') . "] Текст ошибки: {$message} | Файл: {$file} | Строка: {$line}\n=================\n",
            FILE_APPEND); //FILE_APPEND используется чтобы данные в файл дописывались в конце.
    }
    protected function displayError($errno, $errstr, $errfile, $errline, $responce = 500) //номер ошибки, гекст ошибки, файл ошибки, строка ошибки, ответ в случае ошибки по умолчанию - 500
    {
        if($responce == 0) {
            $responce = 404;
        }
        http_response_code($responce);
//
        if($responce == 404 && !DEBUG){
            require_once WWW . '/errors/404.php';
            die;
        }
        if(DEBUG){
            require_once WWW . '/errors/development.php';
        }else {
            require_once WWW . '/errors/production.php';
        }
        die;
    }
}