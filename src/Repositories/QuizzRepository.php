<?php

class QuizzRepository
{
    private PDO $db;
    private QuizzMapper $mapper;

    public function __construct(PDO $db)
    {
        $this->db = $db;
        $this->mapper = new QuizzMapper();
    }

    public function findAllQuizz(): array
    {
        $request = $this->db->query('SELECT * FROM `quizz`');
        $quizzDatas = $request->fetchAll(PDO::FETCH_ASSOC);

        foreach ($quizzDatas as  $key => $quizzData) {
            $quizzData = $this->mapper->mapToObject($quizzData);
            $quizzDatas[$key] = $quizzData;
        }

        return $quizzDatas;
    }

    public function findQuizz(int $idQuizz): Quizz
    {
        $request = $this->db->prepare('SELECT * FROM `quizz` WHERE id=:idQuizz');
        $request->execute(['idQuizz' => $idQuizz]);
        $quizzData = $request->fetch(PDO::FETCH_ASSOC);

        
        $quizz = $this->mapper->mapToObject($quizzData);
        return $quizz;
    }

}
