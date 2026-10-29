@extends('layouts.alexis')

@section('titulo', 'Agregar material')

@section('contenido')
  <section class="tarjeta angosta">
    <h2>Agregar material</h2>
    <p>Registra un material nuevo en el inventario del taller.</p>

    @if ($errors->any())
      <div class="caja-error">
        <strong>Revisa estos datos:</strong>
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form method="POST" action="/materiales/nuevo">
      @csrf

      <div class="campo">
        <label for="nombre">Nombre del material</label>
        <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}">
      </div>

      <div class="campo">
        <label for="categoria">Categoría</label>
        <select id="categoria" name="categoria">
          @foreach (['Telas', 'Hilos', 'Botones', 'Cierres', 'Herramientas'] as $cat)
            <option value="{{ $cat }}" @selected(old('categoria') === $cat)>{{ $cat }}</option>
          @endforeach
        </select>
      </div>

      <div class="campo">
        <label for="cantidad">Cantidad disponible</label>
        <input type="number" id="cantidad" name="cantidad" min="0" value="{{ old('cantidad') }}">
      </div>

      <div class="campo">
        <label for="minimo">Stock mínimo (avisa cuando baje de aquí)</label>
        <input type="number" id="minimo" name="minimo" min="0" value="{{ old('minimo') }}">
      </div>

      <button type="submit" class="boton">Guardar material</button>
      <a href="/dashboard" class="cancelar">Cancelar</a>
    </form>
  </section>
@endsection