<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArtistaController;
use App\Http\Controllers\CancionController;
use App\Models\Album;
use App\Models\Artista;
use App\Models\Cancion;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function(){

    return view('welcome',['trigger' => '']);
});

Route::post('/busqueda', function(request $request){
    $cadena = $request->busqueda;
    $artistas = Artista::all();
    $albums = Album::all();
    $cancions = Cancion::all();
    $reartis = New Collection();
    $realbums = New Collection();
    $recancions = New Collection();

    foreach($artistas as $artista){
        if (str_contains($artista->nombre,$cadena)){
            $reartis->push($artista);
        }
    }
    foreach($albums as $album){
        if (str_contains($album->titulo,$cadena)){
            $realbums->push($album);
        }
    }
    foreach($cancions as $cancion){
        if (str_contains($cancion->titulo,$cadena)){
            $recancions->push($cancion);
        }
    }

    return view('welcome',['trigger'=>'e' ,'artistas'=>$reartis,'cancions'=>$recancions,'albums'=>$realbums]);
});


Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');


Route::resource('albums',AlbumController::class);

Route::resource('artistas',ArtistaController::class);

Route::resource('cancions',CancionController::class);

Route::post('ordenar', [AlbumController::class, 'ordenar'])->name('albums.ordenar');


require __DIR__.'/auth.php';
