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

  <div class="flex flex-col gap-25">
      <header class="flex justify-center w-full">
      <img class="w-50" src="./assets/imgs/logo_site.png" alt="logo du site">
      </header>


      <form class="flex flex-col gap-7 items-center" action="../process/register.php" method="post">
        
        <h1 class="font-[Roboto] text-black text-5xl mb-8">Register</h1>

        <?php if (isset($_GET['pseudo-already-exists'])) { ?>
          <div class="bg-red-500/10 p-4 mb-4 rounded border border-red-500 w-9/10 sm:w-7/10 lg:w-4/10 xl:w-3/10 2xl:w-4/20 text-center">

            <p class="text-red-500">Ce pseudo existe déjà. </br> Veuillez en choisir un autre.</p>

          </div>
        <?php } ?>

        <div class="flex bg-white items-center p-3 px-1 w-9/10 gap-2 rounded-xl shadow sm:w-7/10 lg:w-4/10 xl:w-3/10 2xl:w-4/20">
          <label class="hidden" for="pseudo">pseudo</label>
          <img class="w-8.5 h-8.5" src="./assets/imgs/user_logo.png" alt="">
          <div class="w-px h-9.5 bg-[#5D5945]/40"></div>
          <input class="w-full font-[Roboto]" type="text" name="pseudo" id="pseudo" placeholder="User">
        </div>

        <div class="flex bg-white items-center py-3 px-1 w-9/10 gap-2 rounded-xl shadow sm:w-7/10 lg:w-4/10 xl:w-3/10 2xl:w-4/20">
          <label class="hidden" for="password">password</label>
          <img class="w-8.5 h-8.5" src="./assets/imgs/password_logo.png" alt="">
          <div class="w-px h-9.5 bg-[#5D5945]/40"></div>
          <input class="w-full font-[Roboto]" type="password" name="password" id="password" placeholder="Password">
        </div>

        <button class="bg-[#92FF99] w-6/10 shadow py-3  rounded-xl sm:w-4/10 lg:w-2/10 xl:w-3/20 mb-8" type="submit">
          <h2 class="text-[18px] font-[Roboto] font-medium">Register</h2>
        </button>

        <div class="w-9/10 h-[0.5px] bg-[#5D5945]/40 lg:w-4/10 2xl:w-3/10"></div>
        <a href="./login.php">
          <h3 class="font-[Roboto] text-[20px] font-extralight">Login</h3>
        </a>

      </form>
  </div>



</body>

</html>