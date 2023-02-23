<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Archivos Subidos
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  <a href="{{route('carga.index')}}"><box-icon name='left-arrow-circle'></box-icon> Volver</a>
                  <br>
                  <h3>Archivos Subidos</h3>
                  <br>
                  <ul>
                    @forelse($archivos as $ar)
                      <li>
                        <a href="../storage/<?= $ar['archivo']; ?>" target="_blank"><?= $ar['archivo']; ?></a>
                      </li>
                    @empty
                      <h5>Error al subir los archivos.</h5>
                    @endforelse
                  </ul>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
