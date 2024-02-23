<x-app-layout>


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        <form method="POST" action="{{url('orden_titulo')}}">
                            @csrf
                            <input type="hidden" name="valor" value="{{$valor}}">
                            <input type="submit" value="Titulo {{$flecha}}">
                        </form>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <a href="{{route('albums.index')}}">Duracion total</a>
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
                        <a href="{{route('albums.edit',$album)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{route('albums.show',$album)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">show</a>
                    </td>
                    <td class="px-6 py-4">
                        <form method="POST" action="{{route('albums.destroy',$album)}}">
                            @csrf
                            @method('DELETE')
                        <button type="submit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Borrar</a>
                    </form>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
        <x-primary-button><a href="{{route('albums.create')}}">Insertar nuevo album</a></x-primary-button>
    </div>

    </x-app-layout>
