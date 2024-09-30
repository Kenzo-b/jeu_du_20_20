<?php

namespace kenzo\Jeu20\Entity;

class Answer extends baseEntity
{
    private readonly ?int $id;
    private string $contentText;
    private ?string $contentCode = null;
    private ?string $contentImage = null;
    private ?bool $isTrue = false;
    private \DateTimeImmutable $createdAt;
    private ?\DateTimeImmutable $revisedAt = null;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return $this
     */
    public function setId(?int $id): Answer
    {
        $this->id = $id;
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
     * @return \DateTimeImmutable
     */
    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTimeImmutable $createdAt
     * @return $this
     */
    public function setCreatedAt(\DateTimeImmutable $createdAt): Answer
    {
        $this->createdAt = $createdAt;
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
     * @param \DateTimeImmutable|null $revisedAt
     * @return $this
     */
    public function setRevisedAt(?\DateTimeImmutable $revisedAt): Answer
    {
        $this->revisedAt = $revisedAt;
        return $this;
    }

    public function __toString(): string
    {
        $output = "ID: " . ($this->id ?? 'null') . "\n";
        $output .= "Content Text: {$this->contentText}\n";
        $output .= "Content Code: " . ($this->contentCode ?? "null") . "\n";
        $output .= "Content Image: " . ($this->contentImage ?? "null") . "\n";
        $output .= "isToBeRevised: " . ($this->isTrue ? "true" : "false") . "\n";
        $output .= "Created At: {$this->createdAt->format('Y-m-d H:i:s')}\n";
        $output .= "Updated At: " . ($this->revisedAt ?? 'null') . "\n";
        return nl2br($output);
    }
}