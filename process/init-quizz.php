<?php


// Faire la sécurité 

if ($_SERVER['REQUEST_METHOD'] !== "POST") {
    header('Location: ../public/themes.php?error=1');
    return;
}

if (
    !isset(
        $_POST['idQuizz']

    )
) {
    header('Location: ../public/themes.php?error=2');
    return;
}



if (
    empty($_POST['idQuizz'])

) {
    header('Location: ../public/themes.php?error=3');
    return;
}


$idQuizz = htmlspecialchars(trim($_POST['idQuizz']));

// Fin sécurité

session_start();

require_once('../utils/autoloader.php');
require_once('../utils/db-connect.php');

$quizzManager = new QuizzManager($db);
$quizzManager->quizzCreation($idQuizz);


header('location: ../public/questions.php');


