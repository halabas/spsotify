<?php
namespace App;

class AlbumDuracion
{
    public $album;
    public $duracion;

    public function __construct($album, $duracion)
    {
        $this->album = $album;
        $this->duracion = $duracion;
    }
}
