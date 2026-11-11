<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Home_teste(Request $request){
        $usuario = $request->usuario;
        return view('Home')->with('usuario', $usuario);
    }

    public function Mostrar_Home(Request $request){
        $usuario = $request->usuario;
        return view('Home')->with('usuario', $usuario);
    }

    public function Home(Request $request){
        return view('Home');
    }
}
   