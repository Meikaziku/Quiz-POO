<?php
class ReponseMapper {
    public function mapToObject(array $data): Reponse {
        return new Reponse(
            $data['id'],
            $data['description'],
            $data['question_id'],
            $data['is_correcte']
        );
    }
}