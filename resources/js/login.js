const sign_in_btn = document.querySelector("#sign_in_btn");
const sign_up_btn = document.querySelector("#sign_up_btn");
const container = document.querySelector(".contener");

sign_up_btn.addEventListener("click", function () {
    container.classList.add("sign_up_mode");
});
sign_in_btn.addEventListener("click", function () {
    container.classList.remove("sign_up_mode");
});