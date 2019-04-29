<?php

namespace App\Controller;

class Home extends \Core\Page\Controller {
    
    public function __construct() {
        parent::__construct();
        $this->page['content'] = 'Kregzdutes, kregzdutes na**i!';
    }
}
