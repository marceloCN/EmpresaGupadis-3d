<?php

namespace App\Http\Controllers;

use App\Models\sucursal;
use Illuminate\Http\Request;

class SucursalController extends Controller
{
    public function listar()
    {
        $sucursales = sucursal::all();

        return view('sucursal.listar', compact('sucursales'));
    }

    public function crear()
    {
        return view('sucursal.crear');
    }

    public function guardar(Request $request)
    {
        sucursal::create([
            's_ubic' => $request->ubicacion,
            's_des' => $request->descripcion,
            's_nom' => $request->nombre,
        ]);

        return redirect()
            ->route('sucursales.crear')
            ->with('mensaje', 'Sucursal creada');
    }

    public function editar($sucursalId)
    {
        $sucursal = sucursal::findOrFail($sucursalId);
        //return $sucursal;
        return view('sucursal.editar', compact('sucursal'));
    }

    public function guardarEdicion($sucursalId, Request $request)
    {
        $sucursal = sucursal::findOrFail($sucursalId);

        $sucursal->s_nom =  $request->nombre;
        $sucursal->s_ubic =  $request->ubicacion;
        $sucursal->s_des = $request->descripcion;
        $sucursal->save();

        return redirect()
            ->route('sucursales.listar')
            ->with('mensaje', 'La sucursal ha sido modificada');
    }

}
