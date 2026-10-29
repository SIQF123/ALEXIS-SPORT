@extends('layouts.alexis')

@section('titulo', 'Contacto')

@section('contenido')
  <section class="tarjeta">
    <h2>Contacto</h2>
    <p>Escríbenos y te responderemos pronto.</p>

    @if (session('ok'))
      <p class="exito">{{ session('ok') }}</p>
    @endif

    <form method="POST" action="/contacto">
      @csrf

      <div class="campo">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}">
        @error('nombre') <span class="error">{{ $message }}</span> @enderror
      </div>

      <div class="campo">
        <label for="correo">Correo electrónico</label>
        <input type="email" id="correo" name="correo" value="{{ old('correo') }}">
        @error('correo') <span class="error">{{ $message }}</span> @enderror
      </div>

      <div class="campo">
        <label for="mensaje">Mensaje</label>
        <textarea id="mensaje" name="mensaje" rows="4">{{ old('mensaje') }}</textarea>
        @error('mensaje') <span class="error">{{ $message }}</span> @enderror
      </div>

      <button type="submit" class="boton">Enviar mensaje</button>
    </form>
  </section>
@endsection