<x-app-layout>


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg max-w-3xl mx-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Titulo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        foto
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$album->titulo}}
                    </th>
                    <td>
                        <img src="{{ asset('storage/uploads/albums/' . $album->foto) }}" class="" alt="">
                        </td>
                    </form>

                </tr>

            </tbody>
        </table> <br>
        <h1>Artistas</h1>

        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nombre
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($album->artistas as $artista )

                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$artista->nombre}}
                    </th>

                </tr>
                @endforeach
            </tbody>
        </table><br>
        <h1>Canciones</h1>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nombre
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Duracion
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($canciones as $cancion )

                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{App\Models\Cancion::find($cancion->cancion_id)->titulo}}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ number_format(App\Models\Cancion::find($cancion->cancion_id)->duracion, 2, ':', '.') }}

                    </th>

                </tr>
                @endforeach
            </tbody>
        </table>

        {{$canciones->links()}}
    </div>

    </x-app-layout>
