<?php

namespace kenzo\Jeu20\Repository;

use kenzo\Jeu20\Entity\Answer;
use kenzo\Jeu20\Entity\Question;
use PDO;

class QuestionRepository extends BaseRepository
{
    private function getQuestionsByLevel(int $level): ?array
    {
        $this->pdoStatement = $this->pdo->prepare("
            SELECT
                q.id AS question_id,
                q.level AS question_level,
                q.content_text AS question_content_text,
                q.content_code AS question_content_code,
                q.content_image AS question_content_image,
                q.is_to_be_revised AS question_is_to_be_revised,
                q.created_at AS question_created_at,
                q.revised_at AS question_revised_at,
                a.id AS answer_id,
                a.content_text AS answer_content_text,
                a.content_code AS answer_content_code,
                a.content_image AS answer_content_image,
                a.is_true AS answer_is_true,
                a.created_at AS answer_created_at,
                a.revised_at AS answer_revised_at,
                a.fk_question AS answer_fk_question
            FROM 
                questions AS q
            INNER JOIN 
                answers AS a ON q.id = a.fk_question
            WHERE 
                q.level = :level
            ");
        $this->pdoStatement->bindValue(':level', $level, \PDO::PARAM_INT);
        $this->pdoStatement->execute();
        $fetchedObjects = $this->pdoStatement->fetchAll(\PDO::FETCH_OBJ);
        return Question::hydrateAllWithAnswers($fetchedObjects);
    }

    private function getRandomQuestionByDifficulty(int $level): Question
    {
        $questions = $this->getQuestionsByLevel($level);
        if (empty($questions)) throw new \Exception("aucune question pour le niveau $level");
        return $questions[array_rand($questions,1)];
    }

    public function findRandomQuestionByDifficulty(int $difficulty): Question
    {
        return self::getRandomQuestionByDifficulty($difficulty);
    }
}