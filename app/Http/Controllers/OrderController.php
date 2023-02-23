<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrdersDetail;

class OrderController extends Controller
{
    public function view(){

        $articulos = Articulo::all();
        $ordenes = Order::where('id_user',Auth::user()->id)->get();

        return view('dashboard',['articulos'=>$articulos,'ordenes'=>$ordenes]);
    }

    public function create(Request $request){


        $orden = new Order;

        $articulo = Articulo::find($request->id_articulo);

        $cantidad = $request->cantidad * $articulo->price;

        $numero_orden = Auth::user()->id."_".count(Order::where('id_user',Auth::user()->id)->get()) + 1 . "00000";
        //echo $numero_orden;exit;
        $orden->numero_orden = $numero_orden;
        $orden->monto = $cantidad;
        $orden->estado = 1;

        $orden->id_user = Auth::user()->id;

        $orden->save();

        $detalle = new OrdersDetail();

        $detalle->id_articulo = $request->id_articulo;
        $detalle->cantidad = $request->cantidad;
        $detalle->precio = $articulo->price;
        $detalle->total = $cantidad;
        $detalle->id_order = $orden->id;

        $detalle->save();

        $orden->id_detalle = $detalle->id;
        $orden->update();

        return redirect()->route('detalle.orden',['id_orden'=>$orden->id]);

    }

    public function detalle($id_orden){

        $orden = Order::find($id_orden);

        return view('order.view',compact('orden'));

    }

    public function datos_update(){

      if (isset($_GET['id'])) {
        $orden = Order::find($_GET['id']);

        if ($orden) {
          $articulos = Articulo::all();
          return view('order.update',compact('orden','articulos'));
        }else{
          echo "Error en encontrar numero de orden.";
        }


      }else{
        echo "Error.";
      }
      $orden = Order::find($id_orden);


    }

    public function update(Request $request){

      $orden = Order::find($request->id_orden);

      $articulo = Articulo::find($request->id_articulo);
      $cantidad = $request->cantidad * $articulo->price;

      $orden->monto = $cantidad;
      $orden->update();

      $detalle = OrdersDetail::where('id_order',$request->id_orden)->first();

      $detalle->id_articulo = $request->id_articulo;
      $detalle->cantidad = $request->cantidad;
      $detalle->precio = $articulo->price;
      $detalle->total = $cantidad;

      $detalle->update();

      return redirect()->route('detalle.orden',['id_orden'=>$request->id_orden]);

    }

    public function delete(){


      if (isset($_GET['id'])) {
        $orden = Order::find($_GET['id']);
        $orden->delete();
        $detalle = OrdersDetail::where('id_order',$_GET['id'])->first();
        $detalle->delete();
      }

      return redirect()->route('dashboard');
    }

    public function reporte($id_orden){


      if(unlink('archivo.txt')){
      }
      $ar = fopen("archivo.txt","a") or die ("Error");

      $orden = Order::find($id_orden);
      $cont = view("order.reporte",compact('orden'));

      fwrite($ar,$cont);
      //header("archivo.txt");
      //readfile("archivo.txt");
      $nombre = basename("archivo.txt");
      header('Content-Type: application/octet-stream');
      header("Content-Transfer-Encoding: Binary");
      header("Content-disposition: attachment; filename=$nombre");
      readfile($nombre);

      
    }
}
