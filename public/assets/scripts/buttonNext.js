const buttons = document.querySelectorAll(".peer");
const buttonNext = document.querySelector("#buttonNext");

buttons.forEach((button) => {
  button.addEventListener("click", function () {
    buttonNext.classList.remove("hidden");
    buttonNext.classList.add("flex");
  });
});
