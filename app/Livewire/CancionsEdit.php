<?php

namespace App\Livewire;
use App\Models\Album;
use App\Models\Artista;
use App\Models\Cancion;
use Livewire\Component;

class CancionsEdit extends Component
{
    public $albums;
    public $artistas;
    public $cancion;
    public $titulo;
    public $duracion;

    public $artistasmarcados = [];


    public $albumsmarcados = [];


    public function mount(){
        $this->checked();
    }

    public function checked(){

        foreach($this->cancion->artistas as $artista){
            array_push($this->artistasmarcados,$artista->id);
        }

        foreach($this->cancion->albumes as $album){
            array_push($this->albumsmarcados,$album->id);
        }

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

    public function render()
    {
        return view('livewire.cancions-edit');
    }
}
