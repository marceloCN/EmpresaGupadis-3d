<?php

namespace App\Http\Controllers;

use App\Models\usuario_dato;
use App\Models\usuario_login;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function listar()
    {
        $usuarios = usuario_dato::all();
        return view('usuarios.listar', compact('usuarios'));
    }

    public function verPerfil($usuarioId)
    {
        $usuario = usuario_dato::findOrFail($usuarioId);
        //return $usuario;
        return view('usuarios.verPerfil', compact('usuario'));
    }


    public function guardarModificacion($usuarioId, Request $request)
    {
        $usuario = usuario_dato::findOrFail($usuarioId);
        $usuario->ud_nom = $request->name;
        $usuario->ud_app = $request->apellido;
        $usuario->ud_dir = $request->direccion;
        $usuario->ud_email = $request->correo;
        $usuario->ud_sex = $request->sexo;
        $usuario->ud_ci = $request->carnet;
        $usuario->ud_telf = $request->celular;
        if ($request->tipo){
            $usuario->id_tipo=$request->tipo;
        }
        $usuario->save();

        return redirect()
            ->route('usuario.verPerfil', $usuario->ud_id)
            ->with('mensaje', 'Los datos han sido modificados');
    }

    public function editar($usuarioId)
    {
        $usuario = usuario_dato::findOrFail($usuarioId);
        //return $login;
        return view('usuarios.editar', compact('usuario'));
    }

    public function create()
    {
        return view('usuarios.reguser');
    }

    public function registrar(Request $request)
    {
        /*required|max:10 tiene 2 reglas de validacion */
        /* $request->validate([
            'name' => 'required|max:50',
            'apellido' => 'required|max:50',
            'direccion' => 'required|max:50',
            'correo' => 'max:50',
            'sexo' => 'required|max:1',
            'carnet' => 'required|max:9',
            'celular' => 'required|max:12',
            'correoCorporativo' => 'required|max:40',
            'password' => 'required|max:30',
            'tipo' => 'required'
        ]);*/
        $login = usuario_login::create([
            'ul_acc' => $request->correoCorporativo,
            'ul_pass' => $request->password
        ]);
        $usuario = usuario_dato::create([
            'ud_nom' => $request->name,
            'ud_app' => $request->apellido,
            'ud_dir' => $request->direccion,
            'ud_email' => $request->correo,
            'ud_sex' => $request->sexo,
            'ud_ci' => $request->carnet,
            'ud_telf' => $request->celular,
            'id_tipo' => $request->tipo,
            'id_login' => $login->ul_id
        ]);

        return redirect()
            ->route('usuario.registrar')
            ->with('mensaje', 'Usuario registrado');
    }
}
