@extends('layouts.alexis')

@section('titulo', 'Inicio')

@section('contenido')
  <section class="tarjeta portada">
    <h2>Bienvenido a ALEXIS SPORT</h2>
    <p>Somos un taller de ropa deportiva. Diseñamos y confeccionamos prendas a tu medida.</p>
  </section>

  <section class="tarjeta">
    <h2>El problema que resolvemos</h2>
    <p>
      Antes, el taller anotaba sus telas, hilos, botones y cierres en un cuaderno.
      El cuaderno se perdía, las cantidades no estaban al día y a veces nos quedábamos
      sin material a mitad de un pedido.
    </p>
    <p>
      Ahora el inventario vive en un panel privado: cada material tiene su cantidad
      y su stock mínimo, y el sistema avisa cuando algo se está acabando.
    </p>
    <p><a class="boton" href="/login">Entrar al panel</a></p>
  </section>
@endsection