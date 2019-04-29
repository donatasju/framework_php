<?php

namespace App\View;

class Navigation extends \Core\Page\View {
    
    public function render($tpl_path = ROOT_DIR . '/app/views/navigation.tpl.php') {
        return parent::render($tpl_path);
    }
    
    public function addLink($href, $title) {
        $this->data[] = [
                'link' => $href,
                'title' => $title
        ];
    }
    
    public function addLinks($links) {
        foreach($links as $link => $title) {
            return $this->addLink($href, $title);
        }
    }
    
    public function removeLink($href) {
        foreach($this->data as $index => $link) {
            if($link == $href) {
                unset($this->data[$index]);
            }
        }
    }
    
    public function removeLinks() {
        return $this->data = [];
    }
}

