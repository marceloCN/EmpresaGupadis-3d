<?php

namespace App\Http\Controllers;

use App\Models\participa;
use App\Models\proyecto;
use App\Models\reporte;
use App\Models\usuario_dato;
use App\Models\vista_pagina;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReporteController extends Controller
{
    public function listar()
    {
        $datos = participa::where('id_usuario', auth()->user()->usuario_dato->ud_id)
            ->whereIn('pa_des', ['encargado', 'empleado', 'dueño'])
            ->get();
        return view('participa.listar_reporte', compact('datos'));
    }

    public function guardar($participaId, Request $request)
    {
        $participa = participa::findOrFail($participaId);
        $descripcion = $request->descripcion;
        $fecha = Carbon::now()->toDateString();

        reporte::create([
            'r_fecha' => $fecha,
            'r_des' => $descripcion,
            'id_participa' => $participaId
        ]);

        return redirect()
            ->route('reporte.listar')
            ->with('mensaje', 'Reporte creado');
    }

    // va ver conjunto de todos los proyectos por su ID
    public function ver($proyectoId)
    {
        $proyecto = proyecto::findOrFail($proyectoId);
        $reportes = reporte::join("participa", "participa.id_pa", "=", "reporte.id_participa")
            ->join("usuario_dato", 'participa.id_usuario', '=', 'usuario_dato.ud_id')
            ->select("reporte.r_id", "reporte.r_fecha", "reporte.r_des", "reporte.id_participa", "usuario_dato.ud_nom as nom", "usuario_dato.ud_app as app")
            ->where("participa.id_proyecto", "=", $proyectoId)
            ->get();

        return view('participa.ver_reportes', compact('reportes', 'proyecto'));
    }

    public function busqueda(Request $request)
    {
        if ($request->busqueda) {
            $text = trim($request->busqueda);
            $result = [];

            if (auth()->user()->usuario_dato->id_tipo == 1) {
                //si escribe: crear usuario
                $pos = strpos($text, 'usuario');
                if ($pos !== false) {
                    $result['Listar todos los usuario'] = route('usuario.listar');
                    $pos = strpos($text, 'registrar');
                    if ($pos !== false) {
                        $result['Registrar algun usuario'] = route('usuario.registrar');
                    }
                }

                //si escribe: listar
                $pos = strpos($text, 'listar');
                if ($pos !== false) {
                    $result['Listar todos los login de usuarios'] = route('login.listar');
                }

                //si escribe: crear proyecto
                $pos = strpos($text, 'proyecto');
                if ($pos !== false) {
                    $result['proyecto'] = route('proyectos.listar');
                    $pos = strpos($text, 'registrar');
                    if ($pos !== false) {
                        $result['proyecto_registrar'] = route('proyectos.crear');
                    }
                }

                //si escribe: registrar participantes
                $pos = strpos($text, 'participantes');
                if ($pos !== false) {
                    $result['Lista de todos los participantes de proyectos'] = route('participa.listar');
                    $pos = strpos($text, 'registrar');
                    if ($pos !== false) {
                        $result['añadir un usuario para participar en un proyecto'] = route('participa.crear');
                    }
                }
            }

            if (auth()->user()->usuario_dato->id_tipo == 1 || auth()->user()->usuario_dato->id_tipo == 2) {
                //si escribe: registrar hormigon
                $pos = strpos($text, 'hormigon');
                if ($pos !== false) {
                    $result['Lista de todos los hormigon'] = route('hormigon.listar');
                    $pos = strpos($text, 'registrar');
                    if ($pos !== false) {
                        $result['añadir un nuevo hormigon'] = route('hormigon.crear');
                    }
                }

                //si escribe: crear sucursal
                $pos = strpos($text, 'sucursal');
                if ($pos !== false) {
                    $result['Lista de todas las sucursales'] = route('sucursales.listar');
                    $pos = strpos($text, 'registrar');
                    if ($pos !== false) {
                        $result['añadir un nuevo sucursal para la empresa'] = route('sucursales.crear');
                    }
                }

                //si escribe: registrar equipo
                $pos = strpos($text, 'equipo');
                if ($pos !== false) {
                    $result['Lista de todos los equipos'] = route('equipos.listar');
                    $pos = strpos($text, 'registrar');
                    if ($pos !== false) {
                        $result['añadir un nuevo equipo'] = route('equipos.crear');
                    }
                }

                //si escribe: registrar almacen
                $pos = strpos($text, 'almacen');
                if ($pos !== false) {
                    $result['Lista los equipos en almacenes'] = route('almacena.listar');
                    $pos = strpos($text, 'registrar');
                    if ($pos !== false) {
                        $result['añadir un nuevo equipo en un almacen'] = route('almacena.crear');
                    }
                }
            }

            if (auth()->user()->usuario_dato->id_tipo == 2 || auth()->user()->usuario_dato->id_tipo == 3) {
                //si escribe: mis proyectos
                $pos = strpos($text, 'proyecto');
                if ($pos !== false) {
                    $result['Lista de todos los proyectos'] = route('proyectos.listar');
                    $pos = strpos($text, 'mis');
                    if ($pos !== false) {
                        $result['enlace hacia tus proyectos'] = route('reporte.listar');
                    }
                }

                //si escribe: participantes
                $pos = strpos($text, 'participantes');
                if ($pos !== false) {
                    $result['Lista de todos los participantes de proyectos'] = route('participa.listar');
                }
            }

            //si escribe: editar perfil
            $pos = strpos($text, 'perfil');
            if ($pos !== false) {
                $result['Ver informacion de perfil'] = route('usuario.verPerfil', auth()->user()->usuario_dato->ud_id);
                $pos = strpos($text, 'editar');
                if ($pos !== false) {
                    $result['Modificar perfil del usuario'] = route('usuario.editar', auth()->user()->usuario_dato->ud_id);
                }
            }

            //si escribe: contraseña
            $pos = strpos($text, 'contraseña');
            if ($pos !== false) {
                $result['cambiar contraseña'] = route('login.editarSession', auth()->user()->usuario_dato->id_login);
            }

            //si escribe: empresa
            $pos = strpos($text, 'empresa');
            if ($pos !== false) {
                $result['listar todas las empresas'] = route('empresas.listar');
            }

            //si escribe: materiales
            $pos = strpos($text, 'materiales');
            if ($pos !== false) {
                $result['listar todos los materiales que reconoce la empresa'] = route('materiales.listar');
            }

            //si escribe: estadistica
            $pos = strpos($text, 'estadistica');
            if ($pos !== false) {
                $result['estadistica de proyectos'] = route('proyectos.estadistica');
                $result['estadistica de paginas mas comunes'] = route('reporte.acceso');
            }

            //si escribe: hormigon
            if (auth()->user()->usuario_dato->id_tipo == 3) {
                $pos = strpos($text, 'hormigon');
                if ($pos !== false) {
                    $result['Lista de todos los hormigon'] = route('hormigon.listar');
                }
            }

            

            return view('busquedas', compact('result', 'text'));
        }
    }

    public function verAcceso()
    {
        $vistas = vista_pagina::orderBy('vistas', 'desc')->get();
        $total = 0;
        foreach ($vistas as $valor) {
            $total = $total + $valor->vistas;
        }
        //$vistas = vista_pagina::orderBy('vistas', 'desc')->get();
        return view('reporte_visitas', compact('vistas', 'total'));
    }
}
