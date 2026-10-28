@extends('layouts.trompo')

@section('contenido')
  <p>Somos la jugueteria del barrio: aca encontras trompos, muñecas, autitos y juegos de mesa para todas las edades.</p>

  <p>Hay {{ count($juguetes) }} juguetes en el estante.</p>

  <ul>
    @foreach ($juguetes as $juguete)
      <li>{{ $juguete->nombre }} - {{ $juguete->precio }} Bs</li>
    @endforeach
  </ul>

  <p>Estante atendido por SERGIO IVAN QUISBERT FLORES</p>

  <p><a href="/juguetes/nuevo">Registrar un juguete nuevo</a></p>
@endsection