<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\participa;
use App\Models\proyecto;
use App\Models\usuario_dato;
use App\Models\usuario_login;

class ParticipaController extends Controller
{

    public function eliminar($participaId)
    {
        $participa = participa::findOrFail($participaId);
        $participa->delete();
        return redirect()->route('participa.listar')
            ->with('mensaje', 'Participante eliminado del proyecto');
    }

    public function crear()
    {
        $usuarios = usuario_dato::all();
        $proyectos = proyecto::all();
        return view('participa.crear', compact('proyectos','usuarios'));
    }

    public function guardar(Request $request)
    {
        $user = usuario_dato::findOrFail($request['usuario']);
        if ($user->id_tipo == 1) {
            $descripcion = "encargado";
        } else if ($user->id_tipo == 2) {
            $descripcion = "empleado";
        } else {
            $descripcion = "dueño";
        }
        $participa = participa::create([
            'id_usuario' => $request['usuario'],
            'id_proyecto' =>$request['proyecto'],
            'pa_des' => $descripcion
        ]);
        return redirect()->route('participa.crear')
            ->with('mensaje', 'Se ha registrado un nuevo usuario para la participacion de un proyecto');
    }

    public function listar()
    {
        $datos = participa::all();
        return view('participa.listar', compact('datos'));
    }
}
