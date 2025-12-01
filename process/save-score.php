<?php

require_once '../utils/autoloader.php';
require_once '../utils/db-connect.php';
require_once '../utils/is-connected.php';


if (!isset($_SESSION['bonneReponses']) || !isset($_SESSION['numero_question'])) {
    header('Location: ../public/themes.php');
    exit();
}

if ($_SESSION['bonneReponses'] > $_SESSION['numero_question']) {
    header('Location: ../public/themes.php');
    session_destroy();
    exit();
} 
// var_dump($_SESSION);
// die();
$scoreRepository = new ScoreRepository($db);
$scoreRepository->addScore($_SESSION['user']->getId(), $_SESSION['quizz']->getId(), $_SESSION['bonneReponses']);



header('Location: ../public/scores.php');