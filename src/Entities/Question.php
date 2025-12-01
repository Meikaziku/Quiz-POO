<?php 

class Question {
    private int $id;
    private string $intitule;
    private int $quizz_id;
    private ?string $image;
    private array $reponses;
    
    public function __construct(int $id, string $intitule, int $quizz_id, ?string $image)
    {
        $this->id = $id;
        $this->intitule = $intitule;
        $this->quizz_id = $quizz_id;
        $this->image = $image;
        $this->reponses = [];
    }
    
    /**
     * Get the value of id
     */ 
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get the value of intitule
     */ 
    public function getIntitule(): string
    {
        return $this->intitule;
    }

    /**
     * Get the value of quizz_id
     */ 
    public function getQuizz_id(): int
    {
        return $this->quizz_id;
    }

    /**
     * Get the value of image
     */ 
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * Get the value of reponses
     */ 
    public function getReponses(): array
    {
        return $this->reponses;
    }

    /**
     * Set the value of reponses
     *
     * @return  self
     */ 
    public function setReponses(array $reponses): self
    {
        $this->reponses = $reponses;

        return $this;
    }

    /**
     * Set the value of intitule
     *
     * @return  self
     */ 
    public function setIntitule(string $intitule): self
    {
        $this->intitule = $intitule;

        return $this;
    }
}