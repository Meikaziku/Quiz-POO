<?php

// var_dump($_POST);
// die();

// Faire la sécurité 

if ($_SERVER['REQUEST_METHOD'] !== "POST") {
    header('Location: ../public/questions.php?error=1');
    return;
}

if (
    !isset(
        $_POST['reponse']
        
    )
) {
    header('Location: ../public/questions.php?error=2');
    return;
}



if (
    empty($_POST['reponse']) 
    

) {
    header('Location: ../public/questions.php?error=3');
    return;
}


$idReponse = htmlspecialchars(trim($_POST['reponse']));


// Fin sécurité

require_once('../utils/autoloader.php');
require_once('../utils/db-connect.php');

session_start();

$quizzManager = new QuizzManager($db);
$quizzManager->nextQuestion((int)$idReponse);
   

