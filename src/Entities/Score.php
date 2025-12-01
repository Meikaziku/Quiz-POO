<?php 

class Score {
    private int $id;
    private int $nombre;
    private int $user_id;
    private int $quizz_id;

    public function __construct(int $id, int $nombre = 0, int $user_id, int $quizz_id)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->user_id = $user_id;
        $this->quizz_id = $quizz_id;
    }

    /**
     * Get the value of id
     */ 
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre(): int
    {
        return $this->nombre;
    }

    /**
     * Get the value of user_id
     */ 
    public function getUser_id(): int
    {
        return $this->user_id;
    }

    /**
     * Get the value of quizz_id
     */ 
    public function getQuizz_id(): int
    {
        return $this->quizz_id;
    }
}