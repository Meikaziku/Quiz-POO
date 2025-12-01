<?php

class ScoreRepository
{
    private PDO $db;
    private ScoreMapper $mapper;

    public function __construct(PDO $db)
    {
        $this->db = $db;
        $this->mapper = new ScoreMapper();
    }


    public function addScore(int $userId, int $quizzId, int $nombre): bool
    {
        $stmt = $this->db->prepare('INSERT INTO `score` (nombre, quizz_id, user_id) VALUES (:nombre, :quizz_id, :user_id)');
        return $stmt->execute([

            'nombre'  => $nombre,
            'quizz_id' => $quizzId,
            'user_id'  => $userId
        ]);
    }


    public function findScoresByQuizz(int $quizzId): array
    {
        $stmt = $this->db->prepare('SELECT * FROM `score` WHERE quizz_id = :quizz_id');
        $stmt->execute(['quizz_id' => $quizzId]);
        $scoreDatas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $scores = [];

        foreach ($scoreDatas as $key => $scoreData) {
            $scores = $this->mapper->mapToObject($scoreData);
            $scoreDatas[$key] = $scores;
        }



        return $scores;
    }

    public function globalScore(int $quizzId): array
    {

        $request = $this->db->prepare('SELECT SUM(score.nombre) AS sommeScore, COUNT(*) AS nombreJoueur FROM score WHERE score.quizz_id = :quizzId');
        $request->execute(['quizzId' => $quizzId]);
        
        return $request->fetch(PDO::FETCH_ASSOC);
    }
}
