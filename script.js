const usuario = "Admin";
const contrasenya = "Admin123";

const vistaLogin = document.getElementById("vista-login");
const vistaWeb = document.getElementById("vista-web");
const mensajeError = document.getElementById("mensaje-error");
const bienvenidaTxt = document.getElementById("bienvenida-txt");

function verificarSesion() {
    const logueado = localStorage.getItem("logueado");
    const usuarioGuardado = localStorage.getItem("usuario");

    if (logueado === "true") {
        vistaLogin.classList.add("oculto");
        vistaWeb.style.display = "block";
        bienvenidaTxt.innerHTML = `Bienvenido, ${usuarioGuardado}`;
    } else {
        vistaLogin.classList.remove("oculto");
        vistaWeb.style.display = "none";
    }
}

verificarSesion();

function intentarLogin(event) {
    event.preventDefault();
    const userIn = document.getElementById("username").value.trim();
    const passIn = document.getElementById("password").value.trim();

    if (userIn === usuario && passIn === contrasenya ) {
        localStorage.setItem("logueado", "true");
        localStorage.setItem("usuario", userIn);
        mensajeError.style.display = "none";
        verificarSesion();
    } else {
        mensajeError.innerText = "Credenciales incorrectas.";
        mensajeError.style.display = "block";
    }
}

function logout() {
    localStorage.removeItem("logueado");
    localStorage.removeItem("usuario");
    window.location.reload();
}
