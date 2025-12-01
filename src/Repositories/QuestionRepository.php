<?php

class QuestionRepository
{
    private PDO $db;
    private QuestionMapper $mapper;

    public function __construct(PDO $db)
    {
        $this->db = $db;
        $this->mapper = new QuestionMapper();
    }

    public function findAllQuestionByIdQuizz(int $idQuizz): array
    {
        $request = $this->db->prepare('SELECT * FROM `question` WHERE quizz_id = :idQuizz');
        $request->execute(['idQuizz' => $idQuizz]);
        $questionDatas = $request->fetchAll(PDO::FETCH_ASSOC);

        foreach ($questionDatas as  $key => $questionData) {
            $question = $this->mapper->mapToObject($questionData);
            $questionDatas[$key] = $question;
        }

        return $questionDatas;
    }
}