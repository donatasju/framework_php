<?php
require_once '../bootloader.php';

//$controller = new \Core\Page\Controller();
//print $controller->onRender();

$controller2 = new \App\Controller\Home();

print $controller2->onRender();
