<x-app-layout>
   @if (session()->has('numeric'))
   <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
    <span class="font-medium">Alerta</span> {{session()->get('numeric')}}
  </div>
   @endif

      @livewire('CancionsEdit', ['cancion'=>$cancion, 'albums' => App\Models\Album::all() , 'artistas' =>$artistas])
</x-app-layout>
