<?php

namespace App\Controller;

class Index extends \App\Controller\Base {

    public function __construct() {
        if (\App\App::$session->isLoggedIn()) {
            header('Location: /play');
            exit();
        } else {
            header('Location: /register');
            exit();
        }
    }

}
