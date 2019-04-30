<?php

namespace App\Controller;

class Home extends \Core\Page\Controller {

    public function __construct() {
        parent::__construct();
        $content = [
            'title' => 'Kitas title',
            'subtitle' => 'subtitle'
        ];

        $navigation = [
            [
                'link' => 'www.opapa.lt',
                'title' => 'LOGO'
            ],
            [
                'link' => 'www.opapa.com',
                'title' => 'KONTAKTAI'
            ]
        ];
        $footer = [
            [
                'name' => 'Do do',
                'contacts' => 74327887
            ]
        ];

        $this->page['content'] = (new \Core\Page\View($content))->render(ROOT_DIR . '/app/views/content.tpl.php');
        $this->page['header'] = (new \App\View\Navigation($navigation))->render(ROOT_DIR . '/app/views/navigation.tpl.php');
        $this->page['footer'] = (new \App\View\Footer($footer))->render(ROOT_DIR . '/app/views/footer.tpl.php');
    }

}
