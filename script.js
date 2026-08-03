// =============================
// Dark Mode
// =============================

const darkButton = document.getElementById("darkModeBtn");

darkButton.addEventListener("click", () => {

    document.body.classList.toggle("dark-mode");

});

// =============================
// Hamburger Menu
// =============================

const menuButton = document.getElementById("menuBtn");

const menu = document.getElementById("menu");

menuButton.addEventListener("click", () => {

    menu.classList.toggle("show");

});

// =============================
// Language Switch
// =============================

const languageButton = document.getElementById("languageBtn");

let english = false;

languageButton.addEventListener("click", () => {

    english = !english;

    if(english){

        document.documentElement.lang = "en";

        title.textContent = "Your Event";

        home.textContent = "Home";
        servicesLink.textContent = "Services";
        contactLink.textContent = "Contact";

        servicesTitle.textContent = "Services";

        service1Title.textContent = "Dish Rental";
        service1Description.textContent =
            "We offer tableware for small and large events.";

        service2Title.textContent = "Waiter Service";
        service2Description.textContent =
            "Professional staff for all kinds of events.";

        contactTitle.textContent = "Contact";

        labelName.textContent = "Name";
        labelEmail.textContent = "Email";
        labelPhone.textContent = "Phone";
        labelMessage.textContent = "Message";

        sendButton.textContent = "Send";

        languageButton.textContent = "Español";

    }else{

        document.documentElement.lang = "es";

        title.textContent = "Tu Evento";

        home.textContent = "Inicio";
        servicesLink.textContent = "Servicios";
        contactLink.textContent = "Contacto";

        servicesTitle.textContent = "Servicios";

        service1Title.textContent = "Alquiler de Vajillas";
        service1Description.textContent =
            "Contamos con vajillas para eventos pequeños y grandes.";

        service2Title.textContent = "Servicio de Garzones";
        service2Description.textContent =
            "Personal capacitado para atender cualquier tipo de evento.";

        contactTitle.textContent = "Contacto";

        labelName.textContent = "Nombre";
        labelEmail.textContent = "Correo";
        labelPhone.textContent = "Teléfono";
        labelMessage.textContent = "Mensaje";

        sendButton.textContent = "Enviar";

        languageButton.textContent = "English";

    }

});