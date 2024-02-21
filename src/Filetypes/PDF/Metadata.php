<?php

namespace iit\Application\Filetypes\PDF;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Metadata
{
    /**
     * @var string
     */
    protected $creator;

    /**
     * @var string
     */
    protected $author;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $subject;

    /**
     * @var string[]
     */
    protected $keywords;

    /**
     * @param string $creator
     * @param string $author
     * @param string $title
     * @param string $subject
     * @param string[] $keywords
     */
    public function __construct(
        string $creator,
        string $author,
        string $title,
        string $subject,
        array $keywords
    )
    {
        $this->creator = $creator;
        $this->author = $author;
        $this->title = $title;
        $this->subject = $subject;
        $this->keywords = $keywords;
    }

    /**
     * @return string
     */
    public function getCreator(): string
    {
        return $this->creator;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getSubject(): string
    {
        return $this->subject;
    }

    /**
     * @return string[]
     */
    public function getKeywords(): array
    {
        return $this->keywords;
    }

    /**
     * @return string
     */
    public function getKeywordsString(): string
    {
        return implode(', ', $this->keywords);
    }

    /**
     * @param string $creator
     * @return Metadata
     */
    public function withCreator(string $creator): Metadata
    {
        $clone = clone $this;
        $clone->creator = $creator;
        return $clone;
    }

    /**
     * @param string $author
     * @return Metadata
     */
    public function withAuthor(string $author): Metadata
    {
        $clone = clone $this;
        $clone->author = $author;
        return $clone;
    }

    /**
     * @param string $title
     * @return Metadata
     */
    public function withTitle(string $title): Metadata
    {
        $clone = clone $this;
        $clone->title = $title;
        return $clone;
    }

    /**
     * @param string $subject
     * @return Metadata
     */
    public function withSubject(string $subject): Metadata
    {
        $clone = clone $this;
        $clone->subject = $subject;
        return $clone;
    }

    /**
     * @param string[] $keywords
     * @return Metadata
     */
    public function withKeywords(array $keywords): Metadata
    {
        $clone = clone $this;
        $clone->keywords = $keywords;
        return $clone;
    }

    /**
     * @param string $keyword
     * @return Metadata
     */
    public function withKeywordAdded(string $keyword): Metadata
    {
        $clone = clone $this;
        $clone->keywords[] = $keyword;
        return $clone;
    }
}