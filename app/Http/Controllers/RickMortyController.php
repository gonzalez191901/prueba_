<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RickMortyController extends Controller
{
    public function index(){
        
        if (isset($_GET['pg'])) {
            $pg = $_GET['pg'];
        }else{
            $pg = "https://rickandmortyapi.com/api/character";
        }

        
        return view('ram.index',compact('pg'));
    }
}
