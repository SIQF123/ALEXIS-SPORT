@extends('layouts.alexis')

@section('titulo', 'Diseñar prenda')

@section('contenido')
  <section class="tarjeta angosta">
    <h2>Diseñar prenda</h2>
    <p>Personaliza tu prenda y el taller recibirá tu diseño para confeccionarla.</p>

    @if (session('ok'))
      <p class="exito">{{ session('ok') }}</p>
    @endif

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

    <form method="POST" action="/diseno">
      @csrf

      <div class="campo">
        <label for="prenda">Prenda</label>
        <select id="prenda" name="prenda">
          @foreach (['Camiseta', 'Vestido', 'Falda', 'Pantalón'] as $p)
            <option value="{{ $p }}" @selected(old('prenda') === $p)>{{ $p }}</option>
          @endforeach
        </select>
      </div>

      <div class="campo">
        <span class="etiqueta-grupo">Talla</span>
        <div class="opciones">
          @foreach (['S', 'M', 'L', 'XL'] as $t)
            <label class="opcion" for="talla_{{ $t }}">
              <input type="radio" id="talla_{{ $t }}" name="talla" value="{{ $t }}"
                @checked(old('talla', 'M') === $t)> {{ $t }}
            </label>
          @endforeach
        </div>
      </div>

      <div class="campo colores">
        <div>
          <label for="color_principal">Color principal</label>
          <input type="color" id="color_principal" name="color_principal"
                 value="{{ old('color_principal', '#3d5a80') }}">
        </div>
        <div>
          <label for="color_detalles">Color de detalles</label>
          <input type="color" id="color_detalles" name="color_detalles"
                 value="{{ old('color_detalles', '#b23a48') }}">
        </div>
      </div>

      <div class="campo">
        <label for="estampado">Estampado</label>
        <select id="estampado" name="estampado">
          @foreach (['Liso', 'Rayas', 'Lunares', 'Cuadros'] as $e)
            <option value="{{ $e }}" @selected(old('estampado') === $e)>{{ $e }}</option>
          @endforeach
        </select>
      </div>

      <div class="campo">
        <label for="texto">Texto en la prenda (opcional, máximo 20 caracteres)</label>
        <input type="text" id="texto" name="texto" maxlength="20" value="{{ old('texto') }}">
      </div>

      <div class="campo">
        <label for="notas">Notas para el taller (opcional)</label>
        <textarea id="notas" name="notas" rows="3">{{ old('notas') }}</textarea>
      </div>

      <button type="submit" class="boton">Enviar diseño</button>
    </form>
  </section>
@endsection