<?php

namespace kenzo\Jeu20\Entity;

class Question {

    private ?int $id = null;
    private int $level;
    private string $contentText;
    private ?string $contentCode;
    private ?string $contentImage;
    private bool $isToBeRevised;
    private \DateTimeImmutable $createdAt;
    private ?\DateTimeImmutable $revisedAt;
    /**
     * @param int $level
     * @param string $contentText
     * @param string|null $contentCode
     * @param string|null $contentImage
     * @param bool $isToBeRevised
     * @param \DateTimeImmutable $createdAt
     * @param \DateTimeImmutable|null $updatedAt
     */
    public function __construct(

    ){}

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