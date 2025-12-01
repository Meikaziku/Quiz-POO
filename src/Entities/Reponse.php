<?php 

class Reponse {
    private int $id;
    private string $description;
    private int $question_id;
    private bool $isCorrect;

    public function __construct(int $id, string $description, int $question_id, bool $isCorrect = false)
    {
        $this->id = $id;
        $this->description = $description;
        $this->question_id = $question_id;
        $this->isCorrect = $isCorrect;
    }
    /**
     * Get the value of id
     */ 
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Get the value of question_id
     */ 
    public function getQuestion_id(): int
    {
        return $this->question_id;
    }

    /**
     * Get the value of isCorrect
     */ 
    public function getIsCorrect(): bool
    {
        return $this->isCorrect;
    }
}