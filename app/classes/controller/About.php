<?php

namespace App\Controller;

class About extends \App\Controller\Base {
    public function __construct() {
        parent::__construct();
        
        $content = [
            'title' => 'Welcome to About',
        ];

        $this->page['content'] = (new \Core\Page\View($content))->render(ROOT_DIR . '/app/views/content.tpl.php');
    }
}

