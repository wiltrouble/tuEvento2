const formulario = document.querySelector("#form-helados");
const aviso = document.querySelector("#aviso");

function validarFormulario(event) {

    const nombre = document.querySelector("#nombre").value;
    const correo = document.querySelector("#correo").value;
    const sabores = document.querySelector("#sabores").value;

    if (nombre === "" || correo === "") {

        event.preventDefault();

        aviso.textContent = "Falta tu nombre o tu correo - sin eso no podemos anotar el pedido.";
        aviso.classList.add("error");
        aviso.classList.remove("exito");

    } else if (!correo.includes("@")) {

        event.preventDefault();

        aviso.textContent = "Ese correo no tiene arroba - revísalo por favor.";
        aviso.classList.add("error");
        aviso.classList.remove("exito");

    } else {

        aviso.textContent = "Pedido anotado - te atiende Wilson Lopez";
        aviso.classList.add("exito");
        aviso.classList.remove("error");

    }
}

formulario.addEventListener("submit", validarFormulario);