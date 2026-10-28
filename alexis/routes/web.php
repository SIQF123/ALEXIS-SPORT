<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\Juguete;

Route::get('/', function () {
    return view('inicio');
});

Route::get('/contacto', function () {
    return view('contacto');
});


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
    return view('panel');
})->middleware('auth');

Route::get('/juguetes', function () {
    $juguetes = Juguete::all();
    return view('lista_juguetes', ['juguetes' => $juguetes]);
});
 
Route::get('/juguetes/nuevo', function () {
    return view('nuevo_juguete');
});
 
Route::post('/juguetes/nuevo', function () {
    request()->validate([
        'nombre' => 'required',
        'precio' => 'required|integer',
    ], [
        'nombre.required' => 'Pone el nombre del juguete.',
        'precio.required' => 'Pone el precio del juguete.',
        'precio.integer'  => 'Aca el precio va entero, sin decimales ni letras.',
    ]);
 
    Juguete::create([
        'nombre' => request()->input('nombre'),
        'precio' => request()->input('precio'),
    ]);
 
    return redirect('/juguetes');
});