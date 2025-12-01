<?php 

class User {
    private int $id;
    private string $pseudo;
    private string $password;

    public function __construct(string $pseudo,  string $password, int $id = 1)
    {
        $this->id = $id;
        $this->pseudo = $pseudo;
        $this->password = $password;
    }

    /**
     * Get the value of id
     */ 
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get the value of username
     */ 
    public function getPseudo(): string
    {
        return $this->pseudo;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword(): string
    {
        return $this->password;
    }
}

