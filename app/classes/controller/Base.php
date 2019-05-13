<?php

namespace App\Controller;

class Base extends \Core\Page\Controller {

    public function __construct() {
        parent::__construct();

        if (\App\App::$session->isLoggedIn()) {
            $navigation = [
                [
                    'link' => 'cashin',
                    'title' => 'CASH-IN'
                ],
                [
                    'link' => 'play',
                    'title' => 'PLAY'
                ],
                [
                    'link' => 'logout',
                    'title' => 'LOGOUT'
                ]
            ];
        } else {
            $navigation = [
                [
                    'link' => 'login',
                    'title' => 'LOGIN'
                ],
                [
                    'link' => 'register',
                    'title' => 'REGISTER'
                ]
            ];
        }

        $footer = [
//            [
//                'link' => 'index',
//                'title' => 'BACK to INDEX.PHP'
//            ]
        ];


        $this->page['header'] = (new \App\View\Navigation($navigation))->render();
        $this->page['footer'] = (new \App\View\Footer($footer))->render();
    }

}
