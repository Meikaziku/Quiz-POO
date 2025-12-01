<?php
class QuizzMapper {
    public function mapToObject(array $data): Quizz {
        return new Quizz(
            $data['id'],
            $data['nom'],
            $data['chemin_img']
        );
    }
}

