<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artista;
use App\Models\Cancion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        return view('albums.index',['albums' =>Album::all(),'valor'=>0,'flecha'=>'']);


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('albums.create',['artistas' => Artista::all(),'cancions' => Cancion::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $Album = new Album();
        $Album->titulo = $request->titulo;
        $Album->foto = $request->foto;

        $Album->save();

        $Album->artistas()->attach($request->artistas);
        $Album->canciones()->attach($request->cancions);


        return redirect()-> route('albums.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Album $album)
    {

        return view('albums.show',['album'=>$album]);


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Album $album)
    {
        return view('albums.edit',["album"=>$album,"artistas"=>Artista::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Album $album)
    {
        $album->titulo = $request->titulo;
        $album->foto = $request->foto;

        $album->save();

        $album->artistas()->detach($album->artistas);

        $album->canciones()->detach($album->canciones);

        $album->artistas()->attach($request->artistas);

        $album->canciones()->attach($request->cancions);

        return redirect()-> route('albums.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Album $album)
    {
        if(!$album->artistas->isEmpty() || !$album->canciones->isEmpty() ){
            echo("no se puede borrar");
        }
        else{
            $album->delete();

        }
        return redirect()-> route('albums.index');
    }

}
