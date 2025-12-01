<?php



if ($_SERVER['REQUEST_METHOD'] !== "POST") {
    header('Location: ../public/login.php?error=1');
    return;
}

if (
    !isset(
        $_POST['pseudo'],
        $_POST['password']

    )
) {
    header('Location: ../public/login.php?error=2');
    return;
}


if (
    empty($_POST['pseudo']) ||
    empty($_POST['password'])

) {
    header('Location: ../public/login.php?error=3');
    return;
}

$pseudo = htmlspecialchars(trim($_POST['pseudo']));
$passwordUser = htmlspecialchars(trim($_POST['password']));

require_once('../utils/autoloader.php');
require_once('../utils/db-connect.php');

$userRepository = new UserRepository($db);
$user = $userRepository->loginUser($pseudo, $passwordUser);
if (!$user) {
    header('Location: ../public/login.php?invalid-credentials=1');
    return;
}
session_start();
$_SESSION['user'] = $user;
header('Location: ../public/themes.php');
return;