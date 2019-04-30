<?php

namespace App\Controller;

class Home extends \App\Controller\Base {

    public function __construct() {
        parent::__construct();
        
        $content = [
            'title' => 'Kitas title',
            'subtitle' => 'subtitle'
        ];

        $this->page['content'] = (new \Core\Page\View($content))->render(ROOT_DIR . '/app/views/content.tpl.php');
    }

}
