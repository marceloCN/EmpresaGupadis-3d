<?php

namespace App\Http\Controllers;

use App\Models\equipo;
use Illuminate\Http\Request;

class EquipoController extends Controller
{
    public function listar()
    {
        $equipos = equipo::all();

        return view('equipo.listar', compact('equipos'));
    }

    public function crear()
    {
        return view('equipo.crear');
    }

    public function guardar(Request $request)
    {
        equipo::create([
            'e_pre' => $request->precio,
            'e_des' => $request->descripcion,
            'e_nom' => $request->nombre,
        ]);

        return redirect()
            ->route('equipos.crear')
            ->with('mensaje', 'Equipo creado');
    }
}
