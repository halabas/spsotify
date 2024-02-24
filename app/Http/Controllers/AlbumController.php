<?php

namespace App\Http\Controllers;

use App\AlbumDuracion;
use App\Models\Album;
use App\Models\Artista;
use App\Models\Cancion;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;


class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index(Request $request)
     {
         $albums = Album::with('canciones')->get();

         $albums_duracion = [];

         foreach ($albums as $album) {
             $duracionTotal = 0;

             foreach ($album->canciones as $cancion) {
                 $duracionTotal += $cancion->duracion;
             }

             $albums_duracion[] = new AlbumDuracion($album, $duracionTotal);
         }

         return view('albums.index', ['orden_tit' => 0,'orden_dur'=> 0,'flecha' => '',
             'albums_duracion' => $albums_duracion
         ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('albums.create', ['artistas' => Artista::all(), 'cancions' => Cancion::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $image = $request->file('file_input');
        $name = hash('sha256', time() . $image->getClientOriginalName()) . ".png";
        $image->storeAs('uploads/albums', $name, 'public');

        $image = $request->file('file_input');
        $name = hash('sha256', time() . $image->getClientOriginalName()) . ".png";
        $image->storeAs('uploads/albums', $name, 'public');

        $manager = new ImageManager(new Driver());
        $imageR = $manager->read(Storage::disk('public')->get('uploads/albums/' . $name));
        $imageR->scaleDown(300);
        $rute = Storage::path('public/uploads/albums/' . $name);
        $imageR->save($rute);

        $Album = new Album();
        $Album->titulo = $request->titulo;
        $Album->foto = $name;

        $Album->save();

        $Album->artistas()->attach($request->artistas);
        $Album->canciones()->attach($request->cancions);

        return redirect()->route('albums.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Album $album)
    {

        return view('albums.show', ['album' => $album]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Album $album)
    {
        return view('albums.edit', ["album" => $album, "artistas" => Artista::all(),'cancions' => Cancion::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Album $album)
    {
        if($request->file('file_input')!=null){
            $image = $request->file('file_input');
            $name = hash('sha256', time() . $image->getClientOriginalName()) . ".png";
            $image->storeAs('uploads/albums', $name, 'public');

            $image = $request->file('file_input');
            $name = hash('sha256', time() . $image->getClientOriginalName()) . ".png";
            $image->storeAs('uploads/albums', $name, 'public');

            $manager = new ImageManager(new Driver());
            $imageR = $manager->read(Storage::disk('public')->get('uploads/albums/' . $name));
            $imageR->scaleDown(100);
            $rute = Storage::path('public/uploads/albums/' . $name);
            $imageR->save($rute);
            $album->foto = $name;

        }


        $album->titulo = $request->titulo;

        $album->save();

        $album->artistas()->detach($album->artistas);

        $album->canciones()->detach($album->canciones);

        $album->artistas()->attach($request->artistas);

        $album->canciones()->attach($request->cancions);

        return redirect()->route('albums.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Album $album)
    {
        if (!$album->artistas->isEmpty() || !$album->canciones->isEmpty()) {
            echo ("no se puede borrar");
        } else {
            $album->delete();
        }
        return redirect()->route('albums.index');
    }

    public function orden_titulo(Request $request){
            $valor = $request->orden_tit;
            $albums_duracion = collect($request->session()->get('albums_duracion'));
            if ($valor % 2 == 0) {
                $valor++;
                $albums_duracion = $albums_duracion->sortBy('album.titulo');
                return view('albums.index', ['albums_duracion' => $albums_duracion, 'orden_tit' => $valor,'orden_dur'=> 0, 'flecha' => '↑']);
            } else {
                $valor++;
                $albums_duracion = $albums_duracion->sortByDesc('album.titulo');
                return view('albums.index', ['albums_duracion' => $albums_duracion, 'orden_tit' => $valor,'orden_dur'=> 0, 'flecha' => '↓']);
            }
        }

    public function orden_duracion(Request $request){
        $valor = $request->orden_dur;
        $albums_duracion = collect($request->session()->get('albums_duracion'));
        if($valor%2==0){
            $valor++;
            return view('albums.index',['albums_duracion' =>$albums_duracion->sortBy('duracion'),'orden_tit' => 0,'orden_dur'=> $valor,'flechita'=>'↑']);
        }

        else{
            $valor++;
            return view('albums.index',['albums_duracion' =>$albums_duracion->sortByDesc('duracion'),'orden_tit' => 0,'orden_dur'=> $valor,'flechita'=>'↓']);
        }

    }
    };
