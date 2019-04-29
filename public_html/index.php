<?php

require_once '../bootloader.php';

//$controller = new \Core\Page\Controller();
//print $controller->onRender();
//$controller2 = new \App\Controller\Home();
//
//print $controller2->onRender();

$data = [
    [
        'link' => 'index.php',
        'title' => 'index'
    ],
    [
        'link' => 'register.php',
        'title' => 'register'
    ],
    [
        'link' => 'login.php',
        'title' => 'login'
    ],
    [
        'link' => 'logout.php',
        'title' => 'logout'
    ]
];
$navigation = new App\View\Navigation($data);
//$navigation->addLink('index.php', 'fokinghell');
$navigation->removeLinks();

print $navigation->render();
