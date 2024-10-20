<?php

namespace kenzo\Jeu20\Repository;

use kenzo\Jeu20\Entity\Answer;
use \PDO;

class AnswerRepository extends BaseRepository
{
    private function getAnswersByQuestionId(int $questionId): array
    {
        $this->pdoStatement = $this->pdo->prepare("SELECT * FROM answers WHERE 'question_id' = :questionId");
        $this->pdoStatement->bindValue(':questionId', $questionId, PDO::PARAM_INT);
        $this->pdoStatement->execute();
        $fetchedAnswers = $this->pdoStatement->fetchAll(\PDO::FETCH_OBJ);
        return Answer::hydrateAll($fetchedAnswers);
    }

    public function getAnswerById(int $answerId): ?Answer
    {
        $this->pdoStatement = $this->pdo->prepare("SELECT * FROM answers WHERE id = :answerId");
        $this->pdoStatement->bindValue(':answerId', $answerId, \PDO::PARAM_INT);
        $this->pdoStatement->execute();
        $fetchedAnswer = $this->pdoStatement->fetch(\PDO::FETCH_OBJ);
        return Answer::hydrate($fetchedAnswer);
    }

    public function findAnswersByQuestionId(int $questionId): array
    {
        return $this->getAnswersByQuestionId($questionId);
    }
}