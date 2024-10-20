<?php

namespace kenzo\Jeu20\Controller;

use kenzo\Jeu20\Repository\AnswerRepository;
use kenzo\Jeu20\Repository\QuestionRepository;


class QuestionController extends BaseController {
    public function showQuestionWithRenderView(int $level): void
    {
        $question = QuestionRepository::connect()->findRandomQuestionByDifficulty($level);
        self::renderFromViewDefinition('show_question_definition', ['question' => $question]);
    }

    public static function isValidAnswer(): void
    {
        $answer = AnswerRepository::connect()->getAnswerById($_POST['answer']);
        if ($answer->getIsTrue()) {
            $_SESSION['level']+=1;
        }
        else
        {

        }
        if($_SESSION['level'] > 20) unset($_SESSION['level']);
        if(!isset($_SESSION['level'])) $_SESSION['level'] = 1;

    }
}