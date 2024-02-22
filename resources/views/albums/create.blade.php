<x-app-layout>
    <form method="POST" action="{{route('albums.store')}}" class=" mx-auto max-w-2xl">
        @csrf
        <div class="relative  z-0 w-full mb-5 group">
            <input type="text" name="titulo" id="name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Titulo Album " required />
        </div>
        <div class="relative  z-0 w-full mb-5 group">
            <input type="text" name="foto" id="name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Foto Album " required />
        </div>
        <label for="artistas[]">Artistas</label><br>
        @foreach ($artistas as $artista)
        <input type="checkbox" name="artistas[]" value="{{$artista->id}}"> <span>{{$artista->nombre}}</span> <br>
        @endforeach
        <label for="artistas[]">Canciones</label><br>
        @foreach ($cancions as $cancion)
        <input type="checkbox" name="cancions[]" value="{{$cancion->id}}"> <span>{{$cancion->titulo}}</span> <br>
        @endforeach
        <x-primary-button>Crear album</x-primary-button>
      </form>
</x-app-layout>
