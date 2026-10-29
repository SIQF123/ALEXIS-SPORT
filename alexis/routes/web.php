<?php

use App\Models\Diseno;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| ALEXIS SPORT - paginas publicas
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('inicio');
});

Route::get('/contacto', function () {
    return view('contacto');
});

// Tercera muralla: validacion en el servidor
Route::post('/contacto', function (Request $request) {
    $request->validate([
        'nombre'  => 'required|max:100',
        'correo'  => 'required|email',
        'mensaje' => 'required',
    ], [
        'nombre.required'  => 'Escribe tu nombre.',
        'nombre.max'       => 'El nombre es demasiado largo.',
        'correo.required'  => 'Escribe tu correo.',
        'correo.email'     => 'El correo no es válido.',
        'mensaje.required' => 'Escribe tu mensaje.',
    ]);

    return back()->with('ok', '¡Mensaje recibido!');
});

// Diseñar prenda (publico: el cliente personaliza su prenda)
Route::get('/diseno', function () {
    return view('diseno');
});

Route::post('/diseno', function (Request $request) {
    $datos = $request->validate([
        'prenda'          => 'required|in:Camiseta,Vestido,Falda,Pantalón',
        'talla'           => 'required|in:S,M,L,XL',
        'color_principal' => ['required', 'regex:/^#[0-9a-fA-F]{6}$/'],
        'color_detalles'  => ['required', 'regex:/^#[0-9a-fA-F]{6}$/'],
        'estampado'       => 'required|in:Liso,Rayas,Lunares,Cuadros',
        'texto'           => 'nullable|max:20',
        'notas'           => 'nullable|max:500',
    ], [
        'prenda.required'          => 'Elige una prenda.',
        'prenda.in'                => 'Esa prenda no existe.',
        'talla.required'           => 'Elige una talla.',
        'talla.in'                 => 'Esa talla no existe.',
        'color_principal.required' => 'Elige el color principal.',
        'color_principal.regex'    => 'El color principal no es válido.',
        'color_detalles.required'  => 'Elige el color de los detalles.',
        'color_detalles.regex'     => 'El color de los detalles no es válido.',
        'estampado.required'       => 'Elige un estampado.',
        'estampado.in'             => 'Ese estampado no existe.',
        'texto.max'                => 'El texto puede tener máximo 20 caracteres.',
        'notas.max'                => 'Las notas son demasiado largas.',
    ]);

    Diseno::create($datos);

    return redirect('/diseno')->with('ok', '¡Recibimos tu diseño! El taller lo revisará pronto.');
});



Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', function (Request $request) {
    $datos = $request->validate([
        'email'    => 'required|email',
        'password' => 'required',
    ], [
        'email.required'    => 'Escribe tu correo.',
        'email.email'       => 'El correo no es válido.',
        'password.required' => 'Escribe tu contraseña.',
    ]);

    if (Auth::attempt($datos)) {
        $request->session()->regenerate();
        return redirect('/dashboard');
    }

    return back()->withErrors(['email' => 'Correo o contraseña incorrectos.'])->onlyInput('email');
});

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
});



Route::get('/dashboard', function () {
    $materiales = Material::orderBy('nombre')->get();
    $bajos = $materiales->filter(fn ($m) => $m->cantidad < $m->minimo)->count();

    return view('panel', [
        'materiales' => $materiales,
        'total'      => $materiales->count(),
        'bajos'      => $bajos,
        'disenos'    => Diseno::latest()->get(),
    ]);
})->middleware('auth')->name('dashboard');

Route::get('/materiales/nuevo', function () {
    return view('materiales_nuevo');
})->middleware('auth');

Route::post('/materiales/nuevo', function (Request $request) {
    $datos = $request->validate([
        'nombre'    => 'required|max:100',
        'categoria' => 'required|in:Telas,Hilos,Botones,Cierres,Herramientas',
        'cantidad'  => 'required|integer|min:0',
        'minimo'    => 'required|integer|min:0',
    ], [
        'nombre.required'    => 'Escribe el nombre del material.',
        'nombre.max'         => 'El nombre es demasiado largo.',
        'categoria.required' => 'Elige una categoría.',
        'categoria.in'       => 'Esa categoría no existe.',
        'cantidad.required'  => 'Escribe la cantidad que tienes.',
        'cantidad.integer'   => 'La cantidad debe ser un número entero.',
        'cantidad.min'       => 'La cantidad no puede ser negativa.',
        'minimo.required'    => 'Escribe el stock mínimo.',
        'minimo.integer'     => 'El mínimo debe ser un número entero.',
        'minimo.min'         => 'El mínimo no puede ser negativo.',
    ]);

    Material::create($datos);

    return redirect('/dashboard')->with('ok', 'Material agregado al inventario.');
})->middleware('auth');

