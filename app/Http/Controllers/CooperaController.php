<?php

namespace App\Http\Controllers;

use App\Models\coopera;
use App\Models\empresa;
use App\Models\material;
use App\Models\proyecto;
use App\Models\participa;
use App\Models\usuario_dato;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CooperaController extends Controller
{
    public function ver($ProyectoId){
        $coopera = coopera::where('id_proyecto',$ProyectoId)->get();
        //return $coopera;
        $proyecto = proyecto::where('p_id',$ProyectoId)->first();
        $total = 0;
        foreach ($coopera as $valor) {
            $total = $total + ($valor->c_cant*$valor->c_pre);
        }
        return view('coopera.ver', compact('coopera','proyecto','total'));
    }

    public function listar()
    {
        $datos = coopera::all();
        return view('coopera.listar', compact('datos'));
    }

    public function crear()
    {
        $empresas = empresa::all();
        $proyectos = proyecto::all();
        $materiales = material::all();
        return view('coopera.crear', compact('empresas', 'proyectos', 'materiales'));
    }

    public function guardar(Request $request)
    {

        coopera::create([
            'id_empresa' => $request->empresa,
            'id_proyecto' => $request->proyecto,
            'id_material' => $request->material,
            'c_cant' => $request->cantidad,
            'c_pre' => $request->precio,
            'c_fen' => $request->fecha,
        ]);

        return redirect()
            ->route('coopera.crear')
            ->with('mensaje', 'Material de empresa agregado al proyecto');
    }
}
