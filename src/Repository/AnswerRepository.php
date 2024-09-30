<?php

namespace kenzo\Jeu20\Repository;

use kenzo\Jeu20\Entity\Answer;
use \PDO;

class AnswerRepository extends BaseRepository
{
    private function getAnswersByQuestionId(int $questionId): array
    {
        $answers = [];
        $this->pdoStatement = $this->pdo->prepare("SELECT * FROM answers WHERE 'question_id' = :questionId");
        $this->pdoStatement->bindParam(':questionId', $questionId);
        $this->pdoStatement->execute();
        $fetchedAnswers = $this->pdoStatement->fetchAll(\PDO::FETCH_OBJ);

        foreach ($fetchedAnswers as $fetchedAnswer) {
            $answers[] = Answer::hydrate($fetchedAnswer);;
        }
        return $answers;
    }

    public function findAnswersByQuestionId(int $questionId): array
    {
        return $this->getAnswersByQuestionId($questionId);
    }
}