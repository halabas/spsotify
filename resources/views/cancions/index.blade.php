<x-app-layout>


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
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
                        <a href="{{route('cancions.edit',$cancion)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{route('cancions.show',$cancion)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">show</a>
                    </td>
                    <td class="px-6 py-4">
                        <form method="POST" action="{{route('cancions.destroy',$cancion)}}">
                            @csrf
                            @method('DELETE')
                        <button type="submit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Borrar</a>
                    </form>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
        <x-primary-button><a href="{{route('cancions.create')}}">Insertar nuevo artista</a></x-primary-button>
    </div>

    </x-app-layout>
