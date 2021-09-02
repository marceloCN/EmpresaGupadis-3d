<?php

namespace App\Http\Controllers;

use App\Models\empresa;
use App\Models\material;
use Illuminate\Http\Request;


class MaterialController extends Controller
{
    public function listar()
    {
        $materiales = material::all();

        return view('material.listar', compact('materiales'));
    }

    public function crear()
    {
        return view('material.crear');
    }

    public function editar($materialId)
    {
        $material = material::findOrFail($materialId);

        return view('material.editar', compact('material'));
    }

    public function guardarEdicion($materialId, Request $request)
    {
        $material = material::findOrFail($materialId);

        $material->m_nom =  $request->nombre;
        $material->m_des = $request->descripcion;
        $material->save();

        return redirect()
            ->route('sucursales.listar')
            ->with('mensaje', 'La Sucursal ha sido midificado');
    }

    public function guardar(Request $request)
    {
        material::create([
            'm_des' => $request->descripcion,
            'm_nom' => $request->nombre,
        ]);

        return redirect()
            ->route('materiales.crear')
            ->with('mensaje', 'Material guardado');
    }

    public function eliminar($materialId)
    {
        $material = material::findOrFail($materialId);
        $material->delete();

        return redirect()->route('materiales.listar')
            ->with('mensaje', 'Material eliminado');
    }
}
