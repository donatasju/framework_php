<?php

namespace App\Controller;

class Home extends \Core\Page\Controller {
    
    public function __construct() {
        parent::__construct();
        $this->page['content'] = 'Kregzdutes, kregzdutes na**i!';
        $view =  new \Core\Page\View([
            'title' => 'drink nx',
            'ahujet' => 'pppz'
            ]);
        $this->page['content'] = $view->render(ROOT_DIR . '/app/views/content.tpl.php');
    }
}
