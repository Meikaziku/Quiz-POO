<?php

require_once '../utils/autoloader.php';
require_once '../utils/db-connect.php';
require_once '../utils/is-connected.php';

$quizzRepo = new QuizzRepository($db);
$quizzs = $quizzRepo->findAllQuizz();

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

<body class="bg-[#F4F1DE]">

    <header class="flex justify-center w-full">
        <img class="w-50" src="./assets/imgs/logo_site.png" alt="logo du site">
    </header>

    <main class="w-full h-full">

        <form for action="../process/init-quizz.php" method="post" class="flex flex-col w-full items-center justify-center px-8 gap-8">
            <h1 class="font-[Roboto] text-2xl">Choisi une catégorie !</h1>
            <div class="w-9/10 h-[0.5px] bg-[#5D5945]/40 "></div>

            <?php foreach ($quizzs as $index => $quizz) { ?>
                <div class="w-full flex-wrap flex">
                    <label for="<?= $quizz->getId() ?>" class=" text-center gap-5 w-full flex justify-center items-center">
                        <div class="relative flex flex-col bg-[#FFFADB] w-1/2 p-2 border-2 rounded-xl pb-14 shadow">
                            <div class="gap-3 flex flex-col">
                                <img class="h-30 rounded-xl md:h-45 object-cover" src="<?= $quizz->getImage() ?>" alt="">
                                <h2 class="font-[Roboto] text-[20px]"><?= $quizz->getNom() ?></h2>
                            </div>
                            <button type="submit" name="idQuizz" value="<?= $quizz->getId() ?>"><img class="absolute left-1/2 -bottom-8 transform -translate-x-1/2"
                                src="./assets/imgs/play_button.png"
                                alt=""></button>
                            
                        </div>

                    </label>
                </div>
            <?php } ?>
        </form>
    </main>

</body>

</html>