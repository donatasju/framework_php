<?php

namespace App\Controller;

require_once '../bootloader.php';

class Login extends \App\Controller\Base {

    public function __construct() {
        if (\App\App::$session->isLoggedIn()) {
            header('Location: /cashin');
            exit();
        } else {
            parent::__construct();

            $form = new \App\Objects\Form\Login();
            $form->process();
            $this->page['content'] = $form->render();
        }
    }

}
