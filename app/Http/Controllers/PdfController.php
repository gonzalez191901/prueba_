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
        Storage::putFileAs($ruta,$file,$file->getClientOriginalName());

        $archivos[] = ["archivo"=>$file->getClientOriginalName()];


      }


      return view("pdf.view",compact("archivos"));

    }


}
