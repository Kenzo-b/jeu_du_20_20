<?php

namespace kenzo\Entity;

class Question {

    private ?int $id = null;

    /**
     * @param int $level
     * @param string $contentText
     * @param string|null $contentCode
     * @param string|null $contentImage
     * @param bool $isToBeRevised
     */
    public function __construct(
        private int $level,
        private string $contentText,
        private ?string $contentCode,
        private ?string $contentImage,
        private bool $isToBeRevised
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
}