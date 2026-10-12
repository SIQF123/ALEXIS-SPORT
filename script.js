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