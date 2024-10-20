<?php

namespace kenzo\Jeu20\Entity;

class Question extends baseEntity
{
    private readonly ?int $id;
    private int $level;
    private string $contentText;
    private ?string $contentCode;
    private ?string $contentImage;
    private bool $isToBeRevised;
    private \DateTimeImmutable $createdAt;
    private ?\DateTimeImmutable $revisedAt;

    private array $Answers;

    /**
     * @return int
     */
    public function getLevel(): int
    {
        return $this->level;
    }

    /**
     * @param int $level
     * @return Question
     */
    public function setLevel(int $level): Question
    {
        $this->level = $level;
        return $this;
    }

    /**
     * @return string
     */
    public function getContentText(): string
    {
        return $this->contentText;
    }

    /**
     * @param string $contentText
     * @return Question
     */
    public function setContentText(string $contentText): Question
    {
        $this->contentText = $contentText;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getContentCode(): ?string
    {
        return $this->contentCode;
    }

    /**
     * @param string|null $contentCode
     * @return Question
     */
    public function setContentCode(?string $contentCode): Question
    {
        $this->contentCode = $contentCode;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getContentImage(): ?string
    {
        return $this->contentImage;
    }

    /**
     * @param string|null $contentImage
     * @return Question
     */
    public function setContentImage(?string $contentImage): Question
    {
        $this->contentImage = $contentImage;
        return $this;
    }

    /**
     * @return bool
     */
    public function isToBeRevised(): bool
    {
        return $this->isToBeRevised;
    }

    /**
     * @param bool $isToBeRevised
     * @return Question
     */
    public function setIsToBeRevised(bool $isToBeRevised): Question
    {
        $this->isToBeRevised = $isToBeRevised;
        return $this;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setId(int $id): Question
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param \DateTimeImmutable $createdAt
     * @return $this
     */
    public function setCreatedAt(\DateTimeImmutable $createdAt): Question
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTimeImmutable|null $revisedAt
     * @return $this
     */
    public function setRevisedAt(?\DateTimeImmutable $revisedAt): Question
    {
        $this->revisedAt = $revisedAt;
        return $this;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getRevisedAt(): ?\DateTimeImmutable
    {
        return $this->revisedAt;
    }

    /**
     * @return array
     */
    public function getAnswers(): array
    {
        return $this->Answers;
    }

    /**
     * @param array $Answers
     * @return Question
     */
    public function setAnswers(array $Answers): Question
    {
        $trueAnswers = 0;
        foreach ($Answers as $Answer) {
            if (!$Answer instanceof Answer) {
                throw new \InvalidArgumentException($Answer . ' must be an instance of Answer, got ' . gettype($Answer) . 'instead');
            }
            if ($Answer->getIsTrue()) $trueAnswers++;
        }
        if ($trueAnswers !== 1) throw new \InvalidArgumentException('A question should have 1 true answer, got' . $trueAnswers . ' answer');
        if (count($Answers) !== 4) throw new \InvalidArgumentException('$Answers must be 4 elements, got ' . count($Answers) . 'instead');
        $this->Answers = $Answers;
        return $this;
    }

    public static function hydrateAllWithAnswers(array $stmtArray): array
    {

        $questions = [];
        $question = null;
        $answersTab = [];

        foreach ($stmtArray as $stmtRow) {
            if ($question === null || $question->getId() !== $stmtRow->question_id) {
                if ($question !== null) {
                    $question->setAnswers($answersTab);
                    $questions[] = $question;
                }
                $question = Question::hydrate($stmtRow);
                $answersTab = [];
            }
            $answersTab[] = Answer::hydrate($stmtRow);
        }
        if ($question !== null) {
            $question->setAnswers($answersTab);
            $questions[] = $question;
        }
        return $questions;
    }

    public function __toString(): string
    {
        $output = "ID: " . ($this->id ?? 'null') . "<br>";
        $output .= "Level: " . ($this->level) . "<br>";
        $output .= "Content Text: {$this->contentText}<br>";
        $output .= "Content Code: " . ($this->contentCode ?? "null") . "<br>";
        $output .= "Content Image: " . ($this->contentImage ?? "null") . "<br>";
        $output .= "isToBeRevised: " . ($this->isToBeRevised ? "true" : "false") . "<br>";
        $output .= "Created At: {$this->createdAt->format('Y-m-d H:i:s')}<br>";
        $output .= "Updated At: " . ($this->revisedAt ?? 'null') . "<br>";
        return $output;
    }
}