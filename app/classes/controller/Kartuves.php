<?php

namespace App\Controller;

class Kartuves extends \App\Controller\Base {

    /** @var \App\Objects\Form\Cashin */
    protected $form;

    /** @var \App\Hangman\Dictionary\Repository */
    protected $dic_repo;

    /** @var \App\Hangman\User\Repository */
    protected $user_repo;

    /** @var \App\Hangman\Hangman */
    protected $user;
    protected $word;

    public function __construct() {
        parent::__construct();

        $this->dic_repo = new \App\Objects\Hangman\Dictionary\Repository(\App\App::$db_conn);
        $this->user_repo = new \App\Objects\Hangman\User\Repository(\App\App::$db_conn);
        $this->user = $this->user_repo->load(\App\App::$session->getUser()->getEmail());

        if ($this->user) {
            $this->word = $this->dic_repo->loadById($this->user->getWordId());
        } else {
            $this->word = $this->dic_repo->loadAny();
            $this->user = new \App\Objects\Hangman\User\User([
                'email' => \App\App::$session->getUser()->getEmail(),
                'guessLetter' => '',
                'wordId' => $this->word->getId(),
                'completed' => false
            ]);

            $this->user_repo->insert($this->user);
        }

        $this->form = new \App\Objects\Hangman\Form();
        $status = $this->form->process();
        switch ($status) {
            case \Core\Page\Objects\Form::STATUS_SUCCESS:
                $this->guessLetter();
                break;
        }

        $guessed_letters = $this->user->getGuessLetterArray();
        $word_orig = $this->word->getWords();
        $word_display = '';
        var_dump($word_orig);
        var_dump($this->form->getInput()['letter']);
        
        
        foreach (str_split($word_orig) as $letter) {
            

            if (!in_array($letter, $guessed_letters)) {
                
                $word_display .= '_';
            } else {
                $word_display .= $letter;
            }
        }
        
        
        
        $content = [
            'title' => 'Hangman',
            'word' => 'Word to guess: ' . $word_display,
            'spelled_words' => 'Guessed Letters: ' . $this->user->getGuessLetter(),
            'form' => $this->form->render()
        ];

        $this->page['title'] = 'Kartuves';
        $this->page['content'] = (new \Core\Page\View($content))->render(ROOT_DIR . '/app/views/kartuves.tpl.php');
    }

    public function guessLetter() {
        $input = $this->form->getInput();
        $letter = $input['letter'];

        $this->user->addGuessLetter($letter);
        $this->user_repo->update($this->user);
    }

}
