<?php

namespace wfm;

class Registry
{
    use TSingleton;

    protected static array $properties = []; // контейнер куда закладываются нужные нам данные
    //метод записывает в контейнер данные
    public function setProperty ($name, $value)
    {
        self::$properties[$name] = $value;
    }
    //метод читающий данные из контейнера
    public function getProperty ($name)
    {
        return self::$properties[$name] ?? null; //если свойство по ключу $name есть вернем его, если нет вернем null чтоб не было ошибки
    }

    //отладочный метод возвращает массив $properties
    public function getProperties(): array
    {
        return self::$properties;
    }
}