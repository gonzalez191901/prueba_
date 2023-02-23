<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detalle de la Orden
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  <div class="" style="display:flex; justify-content:space-between;">
                    <a href="{{route('dashboard')}}"><box-icon name='left-arrow-circle'></box-icon> Volver</a>
                    <a href="{{route('reporteOrder',['id'=>$orden->id])}}" target="_blank" class="btn btn-outline-secondary">Exportar TXT</a>
                  </div>

                <br><br>
                    <table class="table">
                        <tr>
                            <td>Nº Orden</td>
                            <td><b>{{$orden->numero_orden}}</b></td>
                            <td>Fecha</td>
                            <td><b>{{$orden->created_at}}</b></td>
                            <td>Articulo</td>
                            <td><b>{{$orden->detail_order->desc_articulo->articulo_desc}}</b></td>
                        </tr>
                        <tr>
                            <td>Precio </td>
                            <td><b>${{$orden->detail_order->precio}}</b></td>
                            <td>Cantidad</td>
                            <td><b>{{$orden->detail_order->cantidad}}</b></td>
                            <td>Total</td>
                            <td><b>${{$orden->detail_order->total}}</b></td>
                        </tr>
                    </table>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
