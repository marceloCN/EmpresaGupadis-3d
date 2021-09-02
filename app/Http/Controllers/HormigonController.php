<?php

namespace App\Http\Controllers;
use App\Models\usuario_dato;
use App\Models\hormigon;
use Illuminate\Http\Request;

class HormigonController extends Controller
{
    public function crear()
    {
        return view('hormigon.crear');
    }

    public function guardar(Request $request)
    {
        $hormigon = hormigon::create([
            'h_tip' => $request->tipo,
            'h_nom' => $request->nombre,
            'h_des' => $request->descripcion,
            'h_pre' => $request->precio,
            'id_usuario' => auth()->user()->usuario_dato->ud_id
        ]);

        return redirect()->route('hormigon.crear')
            ->with('mensaje', 'hormigon registrado');
    }

    public function listar()
    {
        $hormigon = hormigon::all();
        return view('hormigon.listar', compact('hormigon'));
    }

    public function eliminar($hormigonId)
    {
        $hormigon = hormigon::findOrFail($hormigonId);
        $hormigon->delete();
        return redirect()->route('hormigon.listar')
            ->with('mensaje', 'hormigon eliminado de la empresa');
    }

    public function editar($hormigonId)
    {
        $hormigon = hormigon::findOrFail($hormigonId);
        return view('hormigon.editar', compact('hormigon'));
    }

    public function guardarEdicion($hormigonId, Request $request)
    {
        $hormigon = hormigon::findOrFail($hormigonId);

        $hormigon->h_nom =  $request->nombre;
        $hormigon->h_tip =  $request->tipo;
        $hormigon->h_des = $request->descripcion;
        $hormigon->h_pre =  $request->precio;
        $hormigon->save();

        return redirect()
            ->route('hormigon.listar')
            ->with('mensaje', 'hormigon editado');
    }
}
