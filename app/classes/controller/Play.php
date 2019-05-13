<?php

namespace App\Controller;

class Play extends \App\Controller\Base {

    /** @var \App\Objects\Form\Play */
    protected $form;

    /** @var \App\User\User\Repository */
    protected $repo;

    /** @var \App\User\User\User */
    protected $user;
    private $message;

    public function __construct() {

        parent::__construct();
        $this->form = new \App\Objects\Form\Play();
        $this->repo = new \App\User\Repository(\App\App::$db_conn);
        $this->user = $this->repo->load(\App\App::$session->getUser()->getEmail());

        switch ($this->form->process()) {
            case \App\Objects\Form\Play::STATUS_SUCCESS:
                $this->play_success();
                break;

            default:
                $this->page['content'] = $this->form->render();
        };
        $content = [
            'title' => 'MESK KAULIUKĄ',
            'subtitle' => 'Balansas: ' . $this->user->getBalance(),
            'form' => $this->form->render(),
            'message' => 'Pastatęs 1 eurą, laimėsi ' . 1 * 2.5 . ' eur!',
            'success_message' => $this->get_message()
        ];
        $this->page ['title'] = 'Play';
        $this->page['content'] = (new \Core\Page\View($content))->render(ROOT_DIR . '/app/views/content.tpl.php');
    }

    public function set_message($msg_text) {
        $this->message = $msg_text;
    }

    public function get_message() {
        return $this->message = $this->message ?? '';
    }

    public function play_success() {
        $safe_input = $this->form->getInput();
        $rand_dice = rand(1, 6);
        $user_balance = $this->user->getBalance();
        if ($safe_input['dice'] == $rand_dice) {
            $win_amount = 2.5 * $safe_input['bet_size'];
            $this->user->setBalance($user_balance + $win_amount - $safe_input['bet_size']);
            $this->set_message('Sveikinu tu laimejai ' . $win_amount);
        } else {
            $this->user->setBalance($user_balance - $safe_input['bet_size']);
            $this->set_message('Sveikinu tu pralaimejai ' . $safe_input['bet_size'] . '$');
        }
        $this->repo->update($this->user);
    }

}
