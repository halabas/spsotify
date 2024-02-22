<x-app-layout>
    <form method="POST" action="{{route('artistas.update',$artista)}}" class="mx-auto max-w-2xl">
        @csrf
        @method('PUT')
        <div class="relative  z-0 w-full mb-5 group">
            <input type="text" value="{{$artista->nombre}}" name="nombre" id="name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Nombre artista" required />
        </div>

        <x-primary-button>Editar artista</x-primary-button>
      </form>
</x-app-layout>
