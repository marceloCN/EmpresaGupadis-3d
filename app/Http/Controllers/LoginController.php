<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usuario_dato;
use App\Models\usuario_login;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function listar()
    {
        $logins = usuario_login::all();
        return view('login.listar', compact('logins'));
    }

    public function login()
    {
        return view('login.login');
    }

    public function ingresar(Request $request)
    {
        $user = usuario_login::where('ul_acc', $request['email'])->first();
        if (!$user) { //si el usuario existe
            return back()->withErrors([
                'Direccion de correo incorrecto.',
            ]);
        }
        if ($user->ul_pass != $request['password']) { //si la contraseña es correcta
            return back()->withErrors([
                'Contraseña incorrecta.',
            ]);
        }
        $usuarioDato = usuario_dato::where('id_login', $user->ul_id)->first();
        //Por que comentaste esta? Xdxdxd, es la que loguea el sistema
        Auth::login($user, true);
        if ($usuarioDato->id_tipo == 1) { //administrador
            return view('login.administrador',['admin' => $usuarioDato]);
        } else if ($usuarioDato->id_tipo == 2) { //empleado
            //return $usuarioDato;
            return view('login.empleado', ['empleado' => $usuarioDato]);
        } else { //cliente
            return view('login.cliente', ['cliente' => $usuarioDato]);
        }
    }

    public function editar($loginId)
    {
        $login = usuario_login::findOrFail($loginId);
        //return $login;
        return view('login.editar', compact('login'));
    }

    public function guardarSession($loginId, Request $request)
    {
        $login = usuario_login::findOrFail($loginId);
        $login->ul_acc = $request->correoCorporativo;
        $login->ul_pass = $request->password;
        $login->save();

        return redirect()
            ->route('usuario.login')
            ->with('mensaje', 'Cuenta de seccion cambiada');
    }

    // public function user($user){
    //     if ($user=='administrador'){
    //         return view('login.administrador',compact('user'));
    //     }else if ($user=='empleado'){
    //         return view('login.empleado',compact('user'));
    //     }else{
    //         return view('login.cliente',compact('user'));
    //     }

    // }

    public function logout()
    {
        Auth::logout();

        return redirect()
            ->route('usuario.login');
    }
}
