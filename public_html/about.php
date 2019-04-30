<?php

require_once '../bootloader.php';

$about = new App\Controller\About();

print $about->onRender();

