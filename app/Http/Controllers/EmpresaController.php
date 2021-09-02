<?php

namespace App\Http\Controllers;

use App\Models\empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function listar()
    {
        $empresas = empresa::all();
        return view('empresa.listar', compact('empresas'));
    }

    public function crear()
    {
        return view('empresa.crear');
    }

    public function guardar(Request $request)
    {
        empresa::create([
            'em_ubic' => $request->ubicacion,
            'em_des' => $request->descripcion,
            'em_nom' => $request->nombre,
            'em_email' => $request->email,
            'em_enc' => $request->encargado,
            'em_telef' => $request->telefono
        ]);

        return redirect()
            ->route('empresas.crear')
            ->with('mensaje', 'Empresa creada');
    }
}
