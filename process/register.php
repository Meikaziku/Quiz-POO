<?php



if ($_SERVER['REQUEST_METHOD'] !== "POST") {
    header('Location: ../public/register.php?error=1');
    return;
}

if (
    !isset(
        $_POST['pseudo'],
        $_POST['password']

    )
) {
    header('Location: ../public/register.php?error=2');
    return;
}


if (
    empty($_POST['pseudo']) ||
    empty($_POST['password'])

) {
    header('Location: ../public/register.php?error=3');
    return;
}


$pseudo = htmlspecialchars(trim($_POST['pseudo']));
$passwordUser = htmlspecialchars(trim($_POST['password']));

require_once('../utils/autoloader.php');
require_once('../utils/db-connect.php');

$userMapper = new UserMapper();

$user = $userMapper->mapToObject([
    'id' => 1,
    'pseudo' => $pseudo,
    'password' => $passwordUser
]);

$userRepository = new UserRepository($db);
$success = $userRepository->InsertUserInformations($user);

if(!$success) {
    header('Location: ../public/register.php?pseudo-already-exists=1');
    return;
}

header('Location: ../public/login.php?registration-success=1');
return; 
