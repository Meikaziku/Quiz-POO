<?php

class UserRepository

{
    private PDO $db;
    private UserMapper $mapper;

    public function __construct(PDO $db)
    {
        $this->db = $db;
        $this->mapper = new UserMapper();
    }

    public function InsertUserInformations(User $user): bool
    {
        $userExist = $this->findUserByPseudo($user->getPseudo());
        if ($userExist) {
            return false;
        } 

        $request = $this->db->prepare('INSERT INTO `user` (pseudo, `password`) VALUES (:pseudo, :passwordUser)');
        return $request->execute([
            'pseudo' => $user->getPseudo(),
            'passwordUser' => password_hash($user->getPassword(), PASSWORD_DEFAULT)
        ]);
    }

    public function findUserByPseudo(string $pseudo): ?User
    {
        $request = $this->db->prepare('SELECT * FROM `user` WHERE pseudo = :pseudo');
        $request->execute(['pseudo' => $pseudo]);
        $userData = $request->fetch(PDO::FETCH_ASSOC);

        if (!$userData) {
            return null;
        }

        return $this->mapper->mapToObject($userData);
    }

    public function loginUser(string $pseudo, string $password): ?User
    {
        $user = $this->findUserByPseudo($pseudo);

        if (!$user) {
            return null;
        }

        if (!password_verify($password, $user->getPassword())) {
            return null;
        }

        return $user;
    }
}
