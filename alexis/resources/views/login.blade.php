@extends('layouts.alexis')

@section('titulo', 'Iniciar sesión')

@section('contenido')
  <section class="tarjeta angosta">
    <h2>Iniciar sesión</h2>
    <p>El panel es privado: solo el personal del taller puede entrar.</p>

    <form method="POST" action="/login">
      @csrf

      <div class="campo">
        <label for="email">Correo electrónico</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}">
        @error('email') <span class="error">{{ $message }}</span> @enderror
      </div>

      <div class="campo">
        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password">
        @error('password') <span class="error">{{ $message }}</span> @enderror
      </div>

      <button type="submit" class="boton">Entrar</button>
    </form>
  </section>
@endsection