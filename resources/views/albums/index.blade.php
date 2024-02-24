<x-app-layout>

<h1>Ordena pulsando en titulo o duracion</h1><br>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        @php
                            session()->put('albums_duracion', $albums_duracion);
                        @endphp
                        <form method="POST" action="{{route('albums.orden_titulo')}}">
                            @csrf
                            <input type="hidden" name="orden_tit" value="{{$orden_tit}}">
                            <input type="submit" value="Titulo {{isset($flecha) ? $flecha:''}}">
                        </form>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <form method="POST" action="{{route('albums.orden_duracion')}}">
                            @csrf
                            <input type="hidden" name="orden_dur" value="{{$orden_dur}}">
                            <input type="submit" value="Duracion Total {{isset($flechita) ? $flechita:''}}">
                        </form>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        foto
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Accion
                    </th>

                </tr>
            </thead>
            <tbody>
                @foreach ($albums_duracion as $albumDuracion)
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $albumDuracion->album->titulo }}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ number_format($albumDuracion->duracion, 2, ':', '.') }}
                    </th>
                    <td>
                    <img src="{{ asset('storage/uploads/albums/' . $albumDuracion->album->foto) }}" class="" alt="">
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{ route('albums.edit', $albumDuracion->album) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{ route('albums.show', $albumDuracion->album) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">show</a>
                    </td>
                    <td class="px-6 py-4">
                        <form method="POST" action="{{ route('albums.destroy', $albumDuracion->album) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Borrar</button>
                        </form>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
        <x-primary-button><a href="{{route('albums.create')}}">Insertar nuevo album</a></x-primary-button>
    </div>

    </x-app-layout>
