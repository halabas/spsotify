<x-app-layout>

      @livewire('CancionsEdit', ['cancion'=>$cancion, 'albums' => App\Models\Album::all() , 'artistas' =>$artistas])
</x-app-layout>
