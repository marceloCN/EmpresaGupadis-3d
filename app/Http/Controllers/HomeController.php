<?php

namespace App\Http\Controllers;

use App\Models\hormigon;
use App\Models\proyecto;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(){
        return view('home'); 
    }

    public function nosotros(){
        return view('nosotros');
    }

    public function hormigon(){
        $hormigon = hormigon::all();
        return view('hormigon.index',compact('hormigon'));
    }

    public function proyectos(){
        $proyectos = proyecto::all();
        return view('proyectos.index',compact('proyectos'));
    }

    public function contacto(){
        return view('contacto');
    }

}
