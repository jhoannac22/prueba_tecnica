<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;
use App\Livewire\Clientes;

//Route::get('/', function () {
//    return view('welcome');
//})->name('home');

Route::redirect('/', '/dashboard');

Route::get('/clientes', \App\Livewire\Clientes\Index::class)->name('clientes.index');
Route::get('/clientes/create', \App\Livewire\Clientes\Create::class)->name('clientes.create');
Route::get('/clientes/show/{cliente}', \App\Livewire\Clientes\Show::class)->name('clientes.show');
Route::get('/clientes/update/{cliente}', \App\Livewire\Clientes\Edit::class)->name('clientes.edit');

Route::get('/tecnicos', \App\Livewire\Tecnicos\Index::class)->name('tecnicos.index');
Route::get('/tecnicos/create', \App\Livewire\Tecnicos\Create::class)->name('tecnicos.create');
Route::get('/tecnicos/show/{tecnico}', \App\Livewire\Tecnicos\Show::class)->name('tecnicos.show');
Route::get('/tecnicos/update/{tecnico}', \App\Livewire\Tecnicos\Edit::class)->name('tecnicos.edit');

Route::get('/tipo-equipos', \App\Livewire\TipoEquipos\Index::class)->name('tipo-equipos.index');
Route::get('/tipo-equipos/create', \App\Livewire\TipoEquipos\Create::class)->name('tipo-equipos.create');
Route::get('/tipo-equipos/show/{tipoEquipo}', \App\Livewire\TipoEquipos\Show::class)->name('tipo-equipos.show');
Route::get('/tipo-equipos/update/{tipoEquipo}', \App\Livewire\TipoEquipos\Edit::class)->name('tipo-equipos.edit');

Route::get('/marcas', \App\Livewire\Marcas\Index::class)->name('marcas.index');
Route::get('/marcas/create', \App\Livewire\Marcas\Create::class)->name('marcas.create');
Route::get('/marcas/show/{marca}', \App\Livewire\Marcas\Show::class)->name('marcas.show');
Route::get('/marcas/update/{marca}', \App\Livewire\Marcas\Edit::class)->name('marcas.edit');

Route::get('/equipos', \App\Livewire\Equipos\Index::class)->name('equipos.index');
Route::get('/equipos/create', \App\Livewire\Equipos\Create::class)->name('equipos.create');
Route::get('/equipos/show/{equipo}', \App\Livewire\Equipos\Show::class)->name('equipos.show');
Route::get('/equipos/update/{equipo}', \App\Livewire\Equipos\Edit::class)->name('equipos.edit');

Route::get('/estado-servicios', \App\Livewire\EstadoServicios\Index::class)->name('estado-servicios.index');
Route::get('/estado-servicios/create', \App\Livewire\EstadoServicios\Create::class)->name('estado-servicios.create');
Route::get('/estado-servicios/show/{estadoServicio}', \App\Livewire\EstadoServicios\Show::class)->name('estado-servicios.show');
Route::get('/estado-servicios/update/{estadoServicio}', \App\Livewire\EstadoServicios\Edit::class)->name('estado-servicios.edit');

Route::get('/servicios', \App\Livewire\Servicios\Index::class)->name('servicios.index');
Route::get('/servicios/create', \App\Livewire\Servicios\Create::class)->name('servicios.create');
Route::get('/servicios/show/{servicio}', \App\Livewire\Servicios\Show::class)->name('servicios.show');
Route::get('/servicios/update/{servicio}', \App\Livewire\Servicios\Edit::class)->name('servicios.edit');


Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');

    Volt::route('settings/two-factor', 'settings.two-factor')
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});

require __DIR__.'/auth.php';
