<?php

namespace App\View;

class Footer extends \Core\Page\View {

//    public function __construct($data = []) {
//        $this->data['footer'] = $data;
//        
//        $this->render();
//    }
    
    public function render($tpl_path = ROOT_DIR . '/app/views/footer.tpl.php') {
        return parent::render($tpl_path);
    }

}
