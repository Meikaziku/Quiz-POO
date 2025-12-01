<?php
class ScoreMapper {
    public function mapToObject(array $data): Score {
        return new Score(
            $data['id'],
            $data['nombre'],
            $data['quizz_id'],
            $data['user_id']
        );
    }
}