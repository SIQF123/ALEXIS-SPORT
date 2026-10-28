@extends('layouts.trompo')

@section('contenido')
  @if ($errors->any())
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  @endif

  <form action="/juguetes/nuevo" method="POST">
    @csrf

    <p>
      <label for="nombre">Nombre del juguete:</label><br>
      <input type="text" id="nombre" name="nombre">
    </p>

    <p>
      <label for="precio">Precio en Bs:</label><br>
      <input type="number" id="precio" name="precio">
    </p>

    <button type="submit">Registrar juguete</button>
  </form>
@endsection