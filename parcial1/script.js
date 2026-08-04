const confirmButton = document.getElementById("btn-confirmar");
const message = document.getElementById("message");

confirmButton.addEventListener("click", () => {
    console.log('clicked!')
    message.style.display = 'block'
});