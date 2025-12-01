<?php
class QuestionMapper {
    public function mapToObject(array $data): Question {
        return new Question(
            $data['id'],
            $data['intitule'],
            $data['quizz_id'],
            $data['chemin_img']
        );
    }
}