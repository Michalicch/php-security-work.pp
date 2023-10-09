<?php

namespace wfm;

abstract class Model
{
    public array $attributes = []; //массив в котором указываются те данные которые мы хотим взять из форм безопасно
    public array $errors = []; //
    public array $rules = []; //массив правил валидации
    public array $labels = []; // массив с указанием какое именно поле не прошло валидацию, нужно чтобы реализовать мультиязычность

    public function __construct()
    {
        Db::getInstance();
    }
}