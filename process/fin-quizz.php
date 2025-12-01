<?php

if ($_SERVER['REQUEST_METHOD'] !== "POST") {
    header('Location: ../public/scores.php?error=1');
    return;
}

require_once '../utils/autoloader.php';
session_start();

unset($_SESSION['quizz']);
unset($_SESSION['numero_question']);
unset($_SESSION['bonneReponses']);

header('Location: ../public/themes.php');
