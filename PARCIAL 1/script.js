function confirmarPedido() {
  var mensaje = document.querySelector("#mensaje");
  mensaje.textContent = "Pedido confirmado - te atiende Sergio Ivan Quisbert Flores";
  mensaje.classList.remove("oculto");
}

var boton = document.querySelector("#btn-confirmar");
boton.addEventListener("click", confirmarPedido);