Nº Orden:  {{$orden->numero_orden}}

Fecha: {{$orden->created_at}}

Articulo: {{$orden->detail_order->desc_articulo->articulo_desc}}   

Precio : ${{$orden->detail_order->precio}}

Cantidad: {{$orden->detail_order->cantidad}}

Total: ${{$orden->detail_order->total}}
