<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Lista de Usuarios
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Nombre</td>
                                <td>Apellido</td>
                                <td>Correo</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $i => $data)
                                <tr>
                                    <td>{{$i + 1}}</td>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->last_name}}</td>
                                    <td>{{$data->email}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>