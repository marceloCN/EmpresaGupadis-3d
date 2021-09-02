<?php

namespace App\Http\Controllers;

use App\Models\almacena;
use App\Models\equipo;
use App\Models\sucursal;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AlmacenaController extends Controller
{

    public function editar($almacenaId)
    {
        $almacena = almacena::findOrFail($almacenaId);
        //return $almacena;
        $sucursales = sucursal::all();
        $equipos = equipo::all();
        return view('almacena.editar', compact('almacena','sucursales','equipos'));
    }

    public function guardarEdicion($almacenaId, Request $request)
    {
        $almacena = almacena::findOrFail($almacenaId);
        $fecha = Carbon::now()->toDateString();

        $almacena->id_sucursal = $request->sucursal;
        $almacena->id_equipo =  $request->equipo;
        $almacena->a_cant = $request->cantidad;
        $almacena->a_fecha = $fecha;
        $almacena->a_des = $request->descripcion;
        $almacena->save();

        return redirect()
            ->route('almacena.listar')
            ->with('mensaje', 'el Equipo en su almacen ha sido modificado');
    }

    public function listar()
    {
        $datos = almacena::all();
        return view('almacena.listar', compact('datos'));
    }

    public function crear()
    {
        $sucursales = sucursal::all();
        $equipos = equipo::all();
        return view('almacena.crear', compact('sucursales', 'equipos'));
    }

    //************************************************************* */
    public function guardar(Request $request)
    {
        $fecha = Carbon::now()->toDateString();
        $datos = almacena::all();
        
            almacena::create([
                'id_sucursal' => $request->sucursal,
                'id_equipo' => $request->equipo,
                'a_cant' => $request->cantidad,
                'a_fecha' => $fecha,
                'a_des' => $request->descripcion
            ]);
        
            return redirect()
            ->route('almacena.crear')
            ->with('mensaje', 'Equipo guardado');
    }
    //************************************************************* */

}
