<?php
class UserMapper {
    public function mapToObject(array $data): User {
        
        return new User(
            
            $data['pseudo'],
            $data['password'],
            $data['id']   
        );
    }
}