<?php

namespace wfm;

trait TSingleton
{
    private static ?self $instance = null; //Здесь может быть либо экземпляр класса, либо null
    private function __construct(){}
    public static function getInstance(): static
    {
        return static::$instance ?? static::$instance = new static(); // если у нас есть объект($instance) мы вернем его, если нет то мы присвоем новый экземпляр - new static()
    }
}