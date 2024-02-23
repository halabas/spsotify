<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;
use App\Models\Artista;
use App\Models\Cancion;

class CancionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('cancions.index',['cancions'=>Cancion::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cancions.create',['artistas' => Artista::all(),'albums' => Album::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

         /**livewire */
    }

    /**
     * Display the specified resource.
     */
    public function show(Cancion $cancion)
    {

        return view('cancions.show',['cancion'=>$cancion]);


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cancion $cancion)
    {
        return view('cancions.edit',["cancion"=>$cancion,"artistas"=>Artista::all()]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cancion $cancion)
    {
        /**livewire */

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cancion $cancion)
    {
        if(!$cancion->artistas->IsEmpty() || !$cancion->albumes->IsEmpty()){
            echo("no se puede borrar");
        }
        else{
            $cancion->delete();

        }
        return redirect()-> route('cancions.index');
    }

}
