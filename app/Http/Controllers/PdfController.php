<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PdfController extends Controller
{
    public function index(){

      $archivo = [];
      return view("pdf.index");
    }

    public function save(Request $request){

      $archivos = [];

      $files= $request->file("urlpdf");

      foreach ($files as $qdoc => $file) {

        $ruta = '/public/';
        
        $arch = str_replace(" ","", $file->getClientOriginalName()); 
        Storage::putFileAs($ruta,$file,$arch);

        $archivos[] = ["archivo"=>$arch];


      }


      return view("pdf.view",compact("archivos"));

    }


}
