<?php
require_once('../utils/autoloader.php');
require_once '../utils/db-connect.php';
require_once '../utils/is-connected.php';

if (!isset($_SESSION['quizz']) || !isset($_SESSION['numero_question'])) {
    header('Location: ../public/themes.php?error=1');
    return;
}

$scoreUser = round($_SESSION['bonneReponses']/$_SESSION['numero_question'] * 100, 2);

$scoreRepository = new ScoreRepository($db);
$globalScore = $scoreRepository->globalScore($_SESSION['quizz']->getId());

$scoreMoyen = $globalScore['sommeScore'] / $globalScore['nombreJoueur'];
$scoreMoyenPourcent = round($scoreMoyen / $_SESSION['numero_question'] * 100, 2);




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/styles/output.css">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Manrope:wght@200..800&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&family=Rokkitt:ital,wght@0,100..900;1,100..900&family=Varela+Round&display=swap");
    </style>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Sriracha&family=Style+Script&display=swap');
    </style>
</head>

<body class="bg-[#F4F1DE] h-screen flex flex-col justify-center">

    <main class="flex flex-col items-center text-center gap-12">
        <h2 class="font-[Roboto] text-3xl font-bold">Scores</h2>
        <div class="w-9/10 h-[0.5px] bg-[#5D5945]/40 "></div>
        <div class="flex py-6 px-6 flex-col bg-[#FFFADB] w-9/10 lg:w-7/10 border-2 rounded-xl shadow ">
            <div class=" flex flex-col gap-9">
                <img class="h-35 rounded-xl md:h-45 object-cover border-2" src="./assets/imgs/manga.jpg" alt="">
                <h2 class="font-[Roboto] text-3xl">Mangas</h2>
            </div>
        </div>
        <div class="w-9/10 h-[0.5px] bg-[#5D5945]/40 "></div>


        <div class="flex flex-col">
            <section class="flex justify-between pb-15 sm:justify-center gap-15">
                <div class="bg-[#FFFADB] w-40 h-40 rounded-full shadow border-2 flex items-center justify-center text-center lg:w-60 lg:h-60">
                    <p class="font-[Roboto] text-3xl">Ton score :
                        <?= $scoreUser ?>% </p>
                </div>

                <div class="bg-[#FFFADB] w-40 h-40 rounded-full shadow border-2 flex items-center justify-center text-center lg:w-60 lg:h-60">
                    <p class="font-[Roboto] text-3xl">Global :
                        <?= $scoreMoyenPourcent ?>%</p>
                </div>
            </section>

            <div class="flex justify-between gap-15">
                <form action="../process/fin-quizz.php" method="post" class="bg-[#377AFF] w-1/2 flex items-center justify-center rounded-xl shadow px-7 py-2 lg:px-15">
                    <button type="submit" class="font-[Roboto] text-white ">Choix des thèmes</button>
                </form>
                <form action="../process/init-quizz.php" method="post" class="bg-[#12D18E] w-1/2 flex items-center justify-center rounded-xl shadow px-7 py-2 ">
                    <button type="submit" class="font-[Roboto] text-white " value="<?= $_SESSION['quizz']->getId() ?>" name="idQuizz">Rejouer le quizz</button>
                </form>
            </div>
        </div>

    </main>



</body>

</html>