<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Creaciòn de Orden
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <!-- Modal -->
                    <form action="{{route('saveOrder')}}" method="POST">
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Crear Orden</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">

                                    @csrf
                                    <label>Articulo</label>
                                    <select name="id_articulo" class="form-control">
                                        <option value="">--Seleccione--</option>
                                        @foreach($articulos as $art)
                                        <option value="{{$art->id}}">{{$art->articulo_desc}} - ${{$art->price}}</option>
                                        @endforeach
                                    </select>
                                    <label>Cantidad</label>
                                    <input type="text" name="cantidad" placeholder="Cantidad" class="form-control" value="1">

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Ordenar</button>
                              </div>
                            </div>
                          </div>
                        </div>
                         </form>

                    <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                          Crear Orden
                        </button>
                        <br><br>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <td>Nº Orden</td>
                                    <td>Total</td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($ordenes as $v)
                                <tr>
                                    <td>{{$v->numero_orden}}</td>
                                    <td>${{$v->detail_order->total}}</td>
                                    <td style="display: flex; justify-content: flex-end;">
                                        <a href="{{route('detalle.orden',['id_orden'=>$v->id])}}" title="Ver" style="color:#3498db;"><box-icon name='search-alt'></box-icon></a>
                                        <a href="" title="Editar" style="color:#2ecc71;" data-bs-toggle="modal" data-bs-target="#formUpdateModal" onclick="updateOrder({{$v->id}})"><box-icon type='solid' name='edit'></box-icon></a>
                                        <a href="" title="Eliminar" style="color:#c0392b;" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="deleteOrder({{$v->id}})"><box-icon type='solid' name='trash'></box-icon></a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="2">Sin registros.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <!-- Modal -->
                        <div class="modal fade" id="formUpdateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body" id="result_update">

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-primary" onclick="$('#form-update-order').submit()">Actualizar</button>
                              </div>
                            </div>
                          </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmar</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                ¿Desea eliminar esta Orden?
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <a href="" id="delete_order" class="btn btn-primary" >Confirmar</a>
                              </div>
                            </div>
                          </div>
                        </div>



                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>

  function updateOrder(id){
      console.log(id);
      $.ajax({
    url: "{{route('detalle.datos_update')}}",
    data: {id: id,
    },
    //data: data,
    dataType:'html',
    type:'GET',
    success: function(resp){

      $("#result_update").html(resp);
    },  error: function (xhr, ajaxOptions, thrownError) {
      //$("#loading").hide();
      alert(ajaxOptions);

    }
  });
  }

  function deleteOrder(id){

    var url = "{{route('deleteOrder')}}?id="+id;
    $('#delete_order').attr('href', url);
  }
</script>
