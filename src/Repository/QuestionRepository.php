<?php

namespace kenzo\Jeu20\Repository;

use kenzo\Jeu20\Entity\Question;

class QuestionRepository
{
    private function getRandomQuestionByDifficulty(int $level): Question
    {
        $questions = [
            (new Question())->setContentText(
                'Qu\'est-ce qu\'une variable en programmation ?'
            )->setLevel(1),
            (new Question())->setContentText(
                'Quelle est la différence entre une boucle "for" et "while" ?'
            )->setLevel(1),
            (new Question())->setContentText(
                'Qu\'est-ce qu\'un pointeur en langage C ?'
            )->setLevel(1),
            (new Question())->setContentText(
                'Expliquez la différence entre HTTP et HTTPS.'
            )->setLevel(2),
            (new Question())->setContentText(
                'Qu\'est-ce que le polymorphisme en programmation orientée objet ?'
            )->setLevel(2),
            (new Question())->setContentText(
                'Définissez ce qu\'est un algorithme de tri rapide (quick sort).'
            )->setLevel(2),
            (new Question())->setContentText(
                'Qu\'est-ce qu\'un objet en programmation orientée objet ?'
            )->setLevel(1),
            (new Question())->setContentText(
                'Comment fonctionne le garbage collector en Java ?'
            )->setLevel(2),
            (new Question())->setContentText(
                'Quelle est la différence entre un tableau associatif et un tableau indexé en PHP ?'
            )->setLevel(1),
            (new Question())->setContentText(
                'Expliquez ce qu\'est un "cookie" et comment il est utilisé en développement web.'
            )->setLevel(2),
        ];

        $questionsAtLevel = [];
        foreach ($questions as $question) {
            if (!in_array($question->getLevel() === $level, $questions)) throw new \Exception("il n'y a pas de question de niveau $level");
            if ($question->getLevel() === $level) ($questionsAtLevel[] = $question);
        }
        return array_rand($questionsAtLevel,1)[0];
    }

    public function findRandomQuestionByDifficulty(int $difficulty): Question
    {
        return $this->getRandomQuestionByDifficulty($difficulty);
    }
}