<div class="mx-auto max-w-2xl mt-10">
    <div class=" mx-auto max-w-2xl">
        <div class="relative z-0 w-full mb-5 group">
            <input wire:model.lazy="titulo" wire:keyup.debounce.1000ms="modificar_titulo($event.target.value)" type="text" name="titulo" id="name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Titulo Album " required />
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input wire:model.lazy="duracion" wire:keyup.debounce.1000ms="modificar_duracion($event.target.value)" type="text" name="foto" id="name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Foto Album " required />
        </div>
        @if ($cancion->titulo != null && $cancion->duracion!=null )
        <label for="">Artistas</label><br>
        @foreach ($artistas as $artista)
        <input type="checkbox" wire:click="des_agregar_artistas({{$artista->id}})" value="{{$artista->id}}" > <span>{{$artista->nombre}}</span> <br>
        @endforeach
        <br>
        <label for="">Albums</label><br>
        @foreach ($albums as $album)
        <input type="checkbox" wire:click="des_agregar_albums({{$album->id}})" value="{{$album->id}}" > <span>{{$album->titulo}}</span> <br>
        @endforeach<br>
        @endif
        <x-primary-button><a href="{{route('cancions.index')}}">Volver a todas las canciones </a></x-primary-button>

    </div>
</div>
