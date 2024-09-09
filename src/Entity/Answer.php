<?php

namespace kenzo\Entity;

class Answer
{
    private ?int $id = null;

    public function __construct(
        private string $contentText,
        private ?string $contentCode,
        private ?string $contentImage,
        private ?bool $isTrue
    ){}

    /**
     * @return string
     */
    public function getContentText(): string
    {
        return $this->contentText;
    }

    /**
     * @param string $contentText
     * @return Answer
     */
    public function setContentText(string $contentText): Answer
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
     * @return Answer
     */
    public function setContentCode(?string $contentCode): Answer
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
     * @return Answer
     */
    public function setContentImage(?string $contentImage): Answer
    {
        $this->contentImage = $contentImage;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsTrue(): ?bool
    {
        return $this->isTrue;
    }

    /**
     * @param bool|null $isTrue
     * @return Answer
     */
    public function setIsTrue(?bool $isTrue): Answer
    {
        $this->isTrue = $isTrue;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }
}