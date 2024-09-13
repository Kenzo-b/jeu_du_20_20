<?php

namespace kenzo\Jeu20\Controller;

use kenzo\Jeu20\Repository\QuestionRepository;

class QuestionController {
    public function showSimpleQuestionTemp (int $difficulty) {
        $params = [];
        $question = (new QuestionRepository())->findRandomQuestionByDifficulty($difficulty);
        $params[] = $question;
        ob_start();
        extract($params);
        require_once '../templates/question/show_question.php';
        return ob_get_clean();
    }
}