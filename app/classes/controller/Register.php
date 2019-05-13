<?php

namespace App\Controller;

class Register extends \App\Controller\Base {

    /** @var \App\Objects\Form\Register Object */
    protected $form;

    public function __construct() {
        parent::__construct();

        $this->form = new \App\Objects\Form\Register();

        switch ($this->form->process()) {
            case \App\Objects\Form\Register::STATUS_SUCCESS:
                $this->registerSuccess();

                $repo = new \App\User\Repository(\App\App::$db_conn);
                $user = new \App\User\User([
                    'email' => $this->form->getInput()['email'],
                    'balance' => rand(10, 50)
                ]);
                $repo->insert($user);
//                header('Location: /login');
//                exit();
                $this->page['content'] = 'Valio! Tu gavai start\'inį bonus\'ą - ' . $user->getBalance() . ' piginų. ';
                $this->page['content'] .= '<a href="/login">Prisijunk, kad panaudotum!</a>';
                break;

            default:
                $this->page['content'] = $this->form->render();
        };
    }

    public function registerSuccess() {
        $safe_input = $this->form->getInput();
        $user = new \Core\User\User([
            'email' => $safe_input['email'],
            'password' => $safe_input['password'],
            'full_name' => $safe_input['full_name'],
            'age' => $safe_input['age'],
            'gender' => $safe_input['gender'],
            'orientation' => $safe_input['orientation'],
            'account_type' => \Core\User\User::ACCOUNT_TYPE_USER,
            'photo' => $safe_input['photo'],
            'is_active' => true
        ]);

        \App\App::$user_repo->insert($user);
    }

}
