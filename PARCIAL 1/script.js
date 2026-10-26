const boton = document.querySelector("#modo");

boton.addEventListener("click", function () {
  document.body.classList.toggle("oscuro");

  if (document.body.classList.contains("oscuro")) {
    boton.textContent = "Modo claro";
  } else {
    boton.textContent = "Modo oscuro";
  }
});

const btnHorarios = document.querySelector("#btn-horarios");
const horarios = document.querySelector("#horarios");

btnHorarios.addEventListener("click", function () {
  horarios.hidden = !horarios.hidden;

  if (horarios.hidden) {
    btnHorarios.textContent = "Ver horarios de atención";
  } else {
    btnHorarios.textContent = "Ocultar horarios";
  }
});

const formContacto = document.querySelector("#form-contacto");
const mensajeForm = document.querySelector("#mensaje-form");

formContacto.addEventListener("submit", function (event) {
  event.preventDefault();

  const nombre = document.querySelector("#contacto-nombre").value.trim();
  const correo = document.querySelector("#contacto-correo").value.trim();
  const mensaje = document.querySelector("#contacto-mensaje").value.trim();

  mensajeForm.classList.remove("error", "exito");

  if (nombre === "") {
    mensajeForm.textContent = "Escribe tu nombre.";
    mensajeForm.classList.add("error");
  } else if (!correo.includes("@")) {
    mensajeForm.textContent = "El correo debe contener una arroba (@).";
    mensajeForm.classList.add("error");
  } else if (mensaje === "") {
    mensajeForm.textContent = "Escribe tu mensaje.";
    mensajeForm.classList.add("error");
  } else {
    mensajeForm.textContent = "¡Gracias, " + nombre + "! Tu mensaje fue enviado.";
    mensajeForm.classList.add("exito");
    formContacto.reset();
  }
});