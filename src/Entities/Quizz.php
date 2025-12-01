<?php 

class Quizz {
    private int $id;
    private string $nom;
    private string $image;
    private array $questions;

    public function __construct(int $id, string $nom, string $image)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->image = $image;
        $this->questions = [];
    }
    /**
     * Get the value of id
     */ 
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get the value of nom
     */ 
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * Get the value of image
     */ 
    public function getImage() : string
    {
        return $this->image;
    }

    /**
     * Get the value of questions
     */ 
    public function getQuestions(): array
    {
        return $this->questions;
    }

    /**
     * Set the value of questions
     *
     * @return  self
     */ 
    public function setQuestions(array $questions): self
    {
        $this->questions = $questions;

        return $this;
    }
}