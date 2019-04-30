<?php

namespace App\Controller;

class Base extends \Core\Page\Controller {
    public function __construct() {
        parent::__construct();
        
        $navigation = [
            [
                'link' => 'index',
                'title' => 'INDEX'
            ],
            [
                'link' => 'about',
                'title' => 'ABOUT'
            ]
        ];
        $footer = [
            [
                'name' => 'Do do',
                'contacts' => 74327887
            ]
        ];

        $this->page['header'] = (new \App\View\Navigation($navigation))->render();
        $this->page['footer'] = (new \App\View\Footer($footer))->render();
    }
}

