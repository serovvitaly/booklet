<?php

$REQUEST_URI = $_SERVER['REQUEST_URI'];

require_once dirname(__FILE__).'/../lib/Twig/Autoloader.php';
Twig_Autoloader::register();

/**
* Twig загрузчик для вывода строк
*/
//$loader = new Twig_Loader_String();

/**
* Twig загрузчик для вывода шаблонов
*/
$loader = new Twig_Loader_Filesystem('../views');

$twig = new Twig_Environment($loader, array(
    'cache' => '../cache',
    'debug' => true,
));


echo $twig->render('index.html', array('name'=>'Валентина'));