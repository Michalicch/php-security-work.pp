<?php

use wfm\View;

/** @var $this View */
?>
<!DOCTYPE html>
<html lang = "ru">
<head>
    <base href="/"> <-- тег позволяет добавлять к адресу ссылки указанный путь сейчас - "/"-->
    <meta charset = "UTF-8">
    <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0">

    <link rel="apple-touch-icon" sizes="180x180" href="<?php WWW ;?>/assets/img/favicon/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="<?php WWW ;?>/assets/img/favicon/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?php WWW ;?>/assets/img/favicon/favicon-16x16.png" />
    <link rel="manifest" href="<?php WWW ;?>/assets/img/favicon/site.webmanifest" />

    <link rel = "stylesheet" href = "<?php WWW ;?>/assets/css/reset.css">
    <link rel = "stylesheet" href = "<?php WWW ;?>/assets/css/main.css">
    <link rel = "stylesheet" href = "<?php WWW ;?>/assets/css/stylesheet.css">
    <link rel = "stylesheet" href = "<?php WWW ;?>/assets/css/media.css">
    <script src = "<?php WWW ;?>/assets/scripts/index.js" defer></script>
    <?= $this->getMeta(); ?>
</head>

<body>
<div class = "page__wrapper">
    <header class = "container">
        <h1>Специализированная клиническая детская инфекционная больница</h1>
        <h3>Мининистрество здравоохранения Краснодарского края</h3>
        <div class = "header">
            <div class = "header__logo">
                <a class = "logo__wrapper" href = "./index.html"><img src = "<?php WWW ;?>/assets/img/logo-skdib.jpg" width = "50"
                                                                      alt = "Логотип ГБУЗ СКДИБ">
                </a>
            </div>
            <div class = "header__nav">
                <ul class = "nav__menu ">
                    <li class = "menu__item"><a href = "#">Главная</a></li>
                    <li class = "menu__item"><a href = "#">Медицина</a></li>
                    <li class = "menu__item"><a href = "#">Секритариат</a></li>
                </ul>
                <div class = "nav__login">
                    <a class = "flex-row login" type = "button" href = "#" id = "open-auth-btn"><img class = "log__img"
                                                                                                     src = "<?php WWW ;?>/assets/img/account.svg"
                                                                                                     alt = "Авторизация"></img><span>Вход</span>
                    </a>
                    <a class = "flex-row logout visually-hidden" type = "button" href = "#" id = "close-auth-btn"><img
                            class = "log__img"
                            src = "<?php WWW ;?>/assets/img/account.svg" alt = "Авторизация"></img><span>Выход</span>
                    </a>
                </div>

            </div>
        </div>
    </header>