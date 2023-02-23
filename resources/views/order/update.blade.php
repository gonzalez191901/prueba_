<form action="{{route('updateOrder')}}" method="POST" id="form-update-order">
  <input type="hidden" name="id_orden" value="{{$orden->id}}">
                @csrf
                <label>Articulo</label>
                <select name="id_articulo" class="form-control">
                    <option value="">--Seleccione--</option>
                    @foreach($articulos as $art)
                    <option value="{{$art->id}}" @if($art->id == $orden->detail_order->desc_articulo->id) selected @endif >{{$art->articulo_desc}} - ${{$art->price}}</option>
                    @endforeach
                </select>
                <label>Cantidad</label>
                <input type="text" name="cantidad" placeholder="Cantidad" class="form-control" value="{{$orden->detail_order->cantidad}}">


     </form>
