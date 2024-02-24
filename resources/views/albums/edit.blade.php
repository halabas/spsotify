<x-app-layout>
    <form method="POST" action="{{route('albums.update',$album)}}" class=" mx-auto max-w-2xl" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="relative  z-0 w-full mb-5 group">
            <input value="{{$album->titulo}}" type="text" name="titulo" id="name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Titulo Album " required />
        </div>
        <input
        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
        aria-describedby="file_input_help" name="file_input" id="file_input" type="file">
    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG, JPG o JPEG </p>
        <label for="artistas[]">Artistas</label><br>
        @foreach ($artistas as $artista)
        <input type="checkbox" name="artistas[]" value="{{$artista->id}}" {{$album->artistas->contains($artista) ? "checked" : ""}} {{$album->artistas}}> <span>{{$artista->nombre}}</span> <br>
        @endforeach
        <label for="artistas[]">Canciones</label><br>
        @foreach ($cancions as $cancion)
        <input type="checkbox" name="cancions[]" value="{{$cancion->id}}"> <span>{{$cancion->titulo}}</span> <br>
        @endforeach
        <x-primary-button>Crear album</x-primary-button>
      </form>
</x-app-layout>
