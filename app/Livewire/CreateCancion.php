<?php

namespace App\Livewire;
use App\Models\Album;
use App\Models\Artista;
use App\Models\Cancion;
use Livewire\Component;

class CreateCancion extends Component
{
    public $albums;
    public $artistas;
    public $cancion;

    public $titulo;

    public $artistasmarcados = [];


    public $albumsmarcados = [];

    public function mount(){
        $this->cancion = new Cancion();
    }


    public function des_agregar_artistas($id){
        if (in_array($id, $this->artistasmarcados)){
            $this->cancion->artistas()->detach(Artista::find($id));
            unset($this->artistasmarcados[array_search($id,$this->artistasmarcados)]);
        }
        else{
            $this->cancion->artistas()->attach(Artista::find($id));
            array_push($this->artistasmarcados,$id);
        }
    }

    public function des_agregar_albums($id){
        if (in_array($id, $this->albumsmarcados)){
            $this->cancion->albumes()->detach(Album::find($id));
            unset($this->albumsmarcados[array_search($id,$this->albumsmarcados)]);
        }
        else{
            $this->cancion->albumes()->attach(Album::find($id));
            array_push($this->albumsmarcados,$id);
        }
    }

    public function modificar_titulo($titulo){

        if($titulo === ""){
            session()->flash('numeric', 'El titulo no puede estar vacio');
            return redirect()->route('cancions.create');
    }
        else{

            $this->titulo = $titulo;

        }





    }

    public function modificar_duracion($duracion){
        if(is_numeric($duracion)){
            $this->cancion->titulo = $this->titulo;
            $this->cancion->duracion = $duracion;
            $this->cancion->save();

        }

        else{
            session()->flash('numeric', 'La duracion solo puede ser un campo numerico');
            return redirect()->route('cancions.create');
        }

    }



    public function render()
    {
        return view('livewire.create-cancion');
    }
}
