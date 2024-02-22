<x-app-layout>

<form class="max-w-md mx-auto" method="POST" action="{{url('/busqueda')}}">
    @csrf
    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
    <div class="relative">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
        </div>
        <input type="text" name="busqueda" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Busca tu cancion,album o artista" required />
        <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
    </div>
</form>

@if ($trigger!=="")
@if (!$albums->Isempty())
<br>
        <h1 class="max-w-md mx-auto">Albums</h1>
    <div class="relative max-w-md mx-auto overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Titulo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Duracion total
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Accion
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($albums as $album )

                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$album->titulo}}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        @php
                            $duracion=0;
                            foreach ($album->canciones as $cancion) {
                                $duracion+=$cancion->duracion;
                            }
                        @endphp
                        {{number_format($duracion,2,':','.')}}
                    </th>
                    <td class="px-6 py-4">
                        <a href="{{route('albums.show',$album)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">show</a>
                    </td>

                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    @endif

    @if (!$artistas->isempty())
    <br>
    <h1 class="max-w-md mx-auto">Artistas</h1>
    <br>
    <div class="relative max-w-md mx-auto overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nombre
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Accion
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($artistas as $artista )

                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$artista->nombre}}
                    </th>
                    <td class="px-6 py-4">
                        <a href="{{route('artistas.show',$artista)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">show</a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    @endif

    @if (!$cancions->isempty())
    <br>
    <h1 class="max-w-md mx-auto">Canciones</h1>
    <br>
    <div class="relative max-w-md mx-auto overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nombre
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Accion
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cancions as $cancion )

                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$cancion->titulo}}
                    </th>
                    <td class="px-6 py-4">
                        <a href="{{route('cancions.show',$cancion)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">show</a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    @endif
@endif

</x-app-layout>
