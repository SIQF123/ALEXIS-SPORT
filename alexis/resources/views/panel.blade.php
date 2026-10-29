@extends('layouts.alexis')

@section('titulo', 'Panel')

@section('contenido')
  <section class="tarjeta">
    <h2>Panel de inventario</h2>
    <p>Hola, {{ Auth::user()->name }}. Aquí controlas los materiales del taller.</p>

    @if (session('ok'))
      <p class="exito">{{ session('ok') }}</p>
    @endif

    <div class="resumen">
      <div class="dato">
        <span class="numero">{{ $total }}</span>
        materiales registrados
      </div>
      <div class="dato {{ $bajos > 0 ? 'alerta' : '' }}">
        <span class="numero">{{ $bajos }}</span>
        con stock bajo
      </div>
    </div>

    <p><a class="boton" href="/materiales/nuevo">+ Agregar material</a></p>

    <div class="tabla-scroll">
      <table>
        <thead>
          <tr>
            <th>Material</th>
            <th>Categoría</th>
            <th>Cantidad</th>
            <th>Mínimo</th>
            <th>Estado</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($materiales as $m)
            <tr>
              <td>{{ $m->nombre }}</td>
              <td>{{ $m->categoria }}</td>
              <td>{{ $m->cantidad }}</td>
              <td>{{ $m->minimo }}</td>
              <td>
                @if ($m->cantidad < $m->minimo)
                  <span class="etiqueta bajo">Stock bajo</span>
                @else
                  <span class="etiqueta ok">Stock suficiente</span>
                @endif
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="5">Aún no hay materiales. Agrega el primero.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </section>
  <section class="tarjeta">
    <h2>Diseños solicitados</h2>
    <p>Prendas personalizadas que enviaron los clientes desde la página pública.</p>

    <div class="tabla-scroll">
      <table>
        <thead>
          <tr>
            <th>Fecha</th>
            <th>Prenda</th>
            <th>Talla</th>
            <th>Colores</th>
            <th>Estampado</th>
            <th>Texto</th>
            <th>Notas</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($disenos as $d)
            <tr>
              <td>{{ $d->created_at->format('d/m/Y') }}</td>
              <td>{{ $d->prenda }}</td>
              <td>{{ $d->talla }}</td>
              <td>
                <span class="muestra" style="background: {{ $d->color_principal }}"></span>
                <span class="muestra" style="background: {{ $d->color_detalles }}"></span>
              </td>
              <td>{{ $d->estampado }}</td>
              <td>{{ $d->texto ?: '-' }}</td>
              <td>{{ $d->notas ?: '-' }}</td>
            </tr>
          @empty
            <tr>
              <td colspan="7">Todavía no hay diseños. Comparte el enlace /diseno con tus clientes.</td>
            </tr>
              <section class="tarjeta">
    <h2>Diseños solicitados</h2>
    <p>Prendas personalizadas que enviaron los clientes desde la página pública.</p>

    <div class="tabla-scroll">
      <table>
        <thead>
          <tr>
            <th>Fecha</th>
            <th>Prenda</th>
            <th>Talla</th>
            <th>Colores</th>
            <th>Estampado</th>
            <th>Texto</th>
            <th>Notas</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($disenos as $d)
            <tr>
              <td>{{ $d->created_at->format('d/m/Y') }}</td>
              <td>{{ $d->prenda }}</td>
              <td>{{ $d->talla }}</td>
              <td>
                <span class="muestra" style="background: {{ $d->color_principal }}"></span>
                <span class="muestra" style="background: {{ $d->color_detalles }}"></span>
              </td>
              <td>{{ $d->estampado }}</td>
              <td>{{ $d->texto ?: '-' }}</td>
              <td>{{ $d->notas ?: '-' }}</td>
            </tr>
          @empty
            <tr>
              <td colspan="7">Todavía no hay diseños. Comparte el enlace /diseno con tus clientes.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </section>
          @endforelse
        </tbody>
      </table>
    </div>
  </section>
@endsection