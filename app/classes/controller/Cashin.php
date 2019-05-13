<?php

namespace App\Controller;

class Cashin extends \App\Controller\Base {

    /** @var \App\Objects\Form\Cashin */
    protected $form;

    /** @var \App\User\User\Repository */
    protected $repo;

    /** @var \App\User\User\User */
    protected $user;

    public function __construct() {
        parent::__construct();

        $this->form = new \App\Objects\Form\Cashin();
        $this->repo = new \App\User\Repository(\App\App::$db_conn);
        $this->user = $this->repo->load(\App\App::$session->getUser()->getEmail());

        switch ($this->form->process()) {
            case \App\Objects\Form\Cashin::STATUS_SUCCESS:
                $this->cashinSuccess();
                break;

            default:
                $this->page['content'] = $this->form->render();
        };

        $content = [
            'title' => 'Cash-In',
            'subtitle' => 'Balansas: ' . $this->user->getBalance(),
            'form' => $this->form->render()
        ];
        $this->page['title'] = 'Cash-In';
        $this->page['content'] = (new \Core\Page\View($content))->render(ROOT_DIR . '/app/views/content.tpl.php');
    }

    public function cashinSuccess() {
        $safe_input = $this->form->getInput();

        if ($this->user) {
            $balance = $this->user->getBalance();
            $this->user->setBalance($balance + $safe_input['cashin']);
            $this->repo->update($this->user);
        } else {
            $user = new \App\User\User([
                'email' => \App\App::$session->getUser()->getEmail(),
                'balance' => $safe_input['cashin']
            ]);
            $this->repo->insert($user);
        }
    }

}
