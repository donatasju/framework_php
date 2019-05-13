<?php

namespace App\Controller;

class Logout extends \App\Controller\Base {

    public function __construct() {
        \App\App::$session->logout();
        header('Location: /index');
        exit();
    }

}
