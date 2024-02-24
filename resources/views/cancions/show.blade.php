<x-app-layout>

    <h1 class="max-w-md mx-auto">Cancion</h1>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg max-w-md mx-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nombre
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$cancion->titulo}}
                    </th>
                </tr>

            </tbody>
        </table>
    </div>
    @if (!$cancion->albumes->Isempty())
    <br>
            <h1 class="max-w-md mx-auto">Albums a los que pertenece</h1>
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
                    @foreach ($cancion->albumes as $album )

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

        @if (!$cancion->artistas->isempty())
        <br>
        <h1 class="max-w-md mx-auto">Artistas a los que pertenece</h1>
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
                    @foreach ($cancion->artistas as $artista )
                    @dump($cancion->artistas)
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

    </x-app-layout>
