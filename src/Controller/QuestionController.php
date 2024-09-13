<?php

namespace kenzo\Jeu20\Controller;

use kenzo\Jeu20\Repository\QuestionRepository;

class QuestionController {
    public function showSimpleQuestionTemp (int $difficulty) {
        $question = (new QuestionRepository())->findRandomQuestionByDifficulty($difficulty);
        $params = ['question' => $question];
        extract($params);
        require_once str_replace('\\','/', __dir__ . '/../../templates/question/show_question.php');
    }
}