<?php

require_once ('module/include.php');
use module\main\Application;

if (file_exists('./vendor/autoload.php')) {
    require_once('./vendor/autoload.php');
} else {
    echo 'Необхоимо выполнить команду {composer install} в терминале сервера в корне проекта';
    die();
}

global $APPLICATION;
$APPLICATION = Application::getInstance();

