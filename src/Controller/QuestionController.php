<?php

namespace kenzo\Jeu20\Controller;


use kenzo\Jeu20\Repository\QuestionRepository;

class QuestionController extends BaseController {
    public function showQuestionWithRenderView(int $level): void
    {
        $questionRepository = new QuestionRepository();
        $question = $questionRepository->findRandomQuestionByDifficulty($level);
        self::renderFromViewDefinition('show_question_definition', ['question' => $question]);
    }
}