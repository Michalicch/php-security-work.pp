<?php

function debug($data, $die = false)
{
    echo '<pre>' . print_r($data, 1) . '</pre>';
    if($die) {
        die;
    }
}
//функция убирает теги из строковых данных, делает так чтобы HTML теги не выполнялись
function h($str)
{
    return htmlspecialchars($str);
}