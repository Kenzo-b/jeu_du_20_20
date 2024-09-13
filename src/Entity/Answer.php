<?php

namespace kenzo\Jeu20\Entity;

class Answer
{
    private ?int $id = null;


    /**
     * @param string $contentText
     * @param string|null $contentCode
     * @param string|null $contentImage
     * @param bool|null $isTrue
     * @param \DateTimeImmutable $createdAt
     * @param \DateTimeImmutable|null $revisedAt
     */
    public function __construct(
        private string              $contentText,
        private ?string             $contentCode,
        private ?string             $contentImage,
        private ?bool               $isTrue,
        private \DateTimeImmutable  $createdAt,
        private ?\DateTimeImmutable $revisedAt,
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

    /**
     * @return \DateTimeImmutable
     */
    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
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
        $output .= "Content Text: {$this->contentText}<br>";
        $output .= "Content Code: " . ($this->contentCode ?? "null") . "<br>";
        $output .= "Content Image: " . ($this->contentImage ?? "null") . "<br>";
        $output .= "isToBeRevised: " . ($this->isTrue ? "true" : "false") . "<br>";
        $output .= "Created At: {$this->createdAt->format('Y-m-d H:i:s')}<br>";
        $output .= "Updated At: " . ($this->revisedAt ?? 'null') . "<br>";
        return $output;
    }
}