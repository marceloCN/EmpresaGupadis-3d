<?php

namespace App\Http\Controllers;

use App\Models\participa;
use App\Models\proyecto;
use App\Models\sucursal;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{

    public function estadistica(){
        $total = proyecto::all();
        $enEjecucion =  proyecto::where('p_est', 0)->get();
        $finalizados = proyecto::where('p_est', 1)->get();

        return view('proyectos.estadistica',compact('total','enEjecucion','finalizados'));
    }

    public function guardarModificacion($proyectoId, Request $request)
    {
        $proyecto = proyecto::findOrFail($proyectoId);
        $proyecto->p_nom = $request->name;
        $proyecto->p_des = $request->descripcion;
        $proyecto->p_est = $request->estado;
        $proyecto->p_ffin = $request->fechaFin;
        $proyecto->id_sucursal = $request->sucursal;
        
        $proyecto->save();

        return redirect()
            ->route('proyectos.listar')
            ->with('mensaje', 'El proyecto ha sido modificado');
    }

    public function editar($proyectoId)
    {
        $proyecto = proyecto::findOrFail($proyectoId);
        $sucursales = sucursal::all();
        return view('proyectos.editar', compact('proyecto','sucursales'));
    }

    public function listar()
    {
        $proyectos = proyecto::all();
        return view('proyectos.listar', compact('proyectos'));
    }

    public function crear()
    {
        $sucursales = sucursal::all();
        return view('proyectos.crear', compact('sucursales'));
    }

    public function guardar(Request $request)
    {
        $proyecto = proyecto::create([
            'p_nom' => $request->nombre,
            'p_des' => $request->descripcion,
            'p_est' => $request->estado,
            'p_fini' => $request->fechaInicio,
            'p_ffin' => $request->fechaFin,
            'id_usuario' => auth()->user()->usuario_dato->ud_id,
            'id_sucursal' => $request->sucursal !== '' ? $request->sucursal : null
        ]);

        // ni bien se crea el proyecto tambien lo guarda en participa
        $participa = participa::create([
            'id_usuario' => auth()->user()->usuario_dato->ud_id,
            'id_proyecto' => $proyecto->p_id,
            'pa_des' => "encargado"
        ]);

        return redirect()->route('proyectos.crear')
            ->with('mensaje', 'Proyecto registrado');
    }
}
