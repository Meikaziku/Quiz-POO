<?php

class ReponseRepository
{
    private PDO $db;
    private ReponseMapper $mapper;

    public function __construct(PDO $db)
    {
        $this->db = $db;
        $this->mapper = new ReponseMapper();
    }

    public function findAllReponseByIdQuestion(int $idQuestion): array
    {
        $request = $this->db->prepare('SELECT * FROM `reponse` WHERE question_id = :idQuestion');
        $request->execute(['idQuestion' => $idQuestion]);
        $reponseDatas = $request->fetchAll(PDO::FETCH_ASSOC);

        foreach ($reponseDatas as  $key => $questionData) {
            $reponse = $this->mapper->mapToObject($questionData);
            $reponseDatas[$key] = $reponse;
            
        }

        return $reponseDatas;
    }


    function isCorrecteReponse(int $idReponse): bool
    {
         try {

            $request = $this->db->prepare('SELECT is_correcte FROM reponse WHERE reponse.id = :idReponse');
            $request->execute([
                ':idReponse' => $idReponse
            ]);

            return boolval($request->fetch(PDO::FETCH_COLUMN));
        } catch (Exception $error) {
            return false;
        }
    }
   
}