<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlmacenaController;
use App\Http\Controllers\CooperaController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HormigonController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ParticipaController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\SucursalController;
use Illuminate\Auth\Events\Login;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/', HomeController::class)->name('inicio');

Route::get('/nosotros', [HomeController::class, 'nosotros'])->name('nosotros');

Route::get('/contacto', [HomeController::class, 'contacto'])->name('contacto');

Route::get('/hormigon-premesclado', [HomeController::class, 'hormigon'])->name('hormigon');

Route::get('/principales-proyectos', [HomeController::class, 'proyectos'])->name('proyectos');

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/login', [LoginController::class, 'login'])->name('usuario.login');

Route::post('/login', [LoginController::class, 'ingresar'])->name('usuario.ingresar');

Route::get('/login/{loginId}', [LoginController::class, 'editar'])->name('login.editarSession');

Route::put('/login/{loginId}', [LoginController::class, 'guardarSession'])->name('login.editar.guardar');

Route::get('/logins', [LoginController::class, 'listar'])->name('login.listar');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/registrar-usuario', [UserController::class, 'create'])->name('usuario.registrar');

Route::post('/registrar-usuario', [UserController::class, 'registrar'])->name('usuarios.CrearReg');

Route::get('/modificar-usuario/{usuarioId}', [UserController::class, 'editar'])->name('usuario.editar');

Route::put('/modificar-usuario/{usuarioId}', [UserController::class, 'guardarModificacion'])->name('usuario.editar.guardar');

Route::get('/verPerfil/{usuarioId}', [UserController::class, 'verPerfil'])->name('usuario.verPerfil');

Route::get('/usuario-listar', [UserController::class, 'listar'])->name('usuario.listar');

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/proyectos', [ProyectoController::class, 'listar'])->name('proyectos.listar');

Route::get('/proyectos-crear', [ProyectoController::class, 'crear'])->name('proyectos.crear');

Route::post('/proyectos-crear', [ProyectoController::class, 'guardar'])->name('proyectos.guardar');

Route::get('/modificar-proyecto/{proyectoId}', [ProyectoController::class, 'editar'])->name('proyectos.editar');

Route::put('/modificar-proyecto/{proyectoId}', [ProyectoController::class, 'guardarModificacion'])->name('proyectos.editar.guardar');

Route::get('/proyectos-estadistica', [ProyectoController::class, 'estadistica'])->name('proyectos.estadistica');
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/participa-crear', [ParticipaController::class, 'crear'])->name('participa.crear');

Route::post('/participa-crear', [ParticipaController::class, 'guardar'])->name('participa.guardar');

Route::get('/participa', [ParticipaController::class, 'listar'])->name('participa.listar');

Route::delete('/participa/{participaId}', [ParticipaController::class, 'eliminar'])->name('participa.eliminar');
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/reporte-listar', [ReporteController::class, 'listar'])->name('reporte.listar');

Route::post('/reporte/{participaId}', [ReporteController::class, 'guardar'])->name('reporte.guardar');

Route::get('/ver-reportes/acceso', [ReporteController::class, 'verAcceso'])->name('reporte.acceso');

Route::get('/ver-reportes/{proyectoId}', [ReporteController::class, 'ver'])->name('reporte.ver');

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/hormigon-crear', [HormigonController::class, 'crear'])->name('hormigon.crear');

Route::post('/hormigon-crear', [HormigonController::class, 'guardar'])->name('hormigon.guardar');

Route::get('/hormigon', [HormigonController::class, 'listar'])->name('hormigon.listar');

Route::delete('/hormigon/{hormigonId}', [HormigonController::class, 'eliminar'])->name('hormigon.eliminar');

Route::get('/modificar-hormigon/{hormigonId}', [HormigonController::class, 'editar'])->name('hormigon.editar');

Route::put('/modificar-hormigon/{hormigonId}', [HormigonController::class, 'guardarEdicion'])->name('hormigon.editar.guardar');

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/sucursales', [SucursalController::class, 'listar'])->name('sucursales.listar');

Route::get('/modificar-sucursales/{sucursalId}', [SucursalController::class, 'editar'])->name('sucursales.editar');

Route::put('/modificar-sucursales/{sucursalId}', [SucursalController::class, 'guardarEdicion'])->name('sucursales.editar.guardar');

Route::post('/sucursales', [SucursalController::class, 'guardar'])->name('sucursales.guardar');

Route::get('/sucursales-crear', [SucursalController::class, 'crear'])->name('sucursales.crear');
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/equipos', [EquipoController::class, 'listar'])->name('equipos.listar');

Route::post('/equipos', [EquipoController::class, 'guardar'])->name('equipos.guardar');

Route::get('/equipos-crear', [EquipoController::class, 'crear'])->name('equipos.crear');
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/almacena-equipos', [AlmacenaController::class, 'listar'])->name('almacena.listar');

Route::get('/almacena-equipos/{almacenaId}', [AlmacenaController::class, 'editar'])->name('almacena.editar');

Route::put('/almacena-equipos/{almacenaId}', [AlmacenaController::class, 'guardarEdicion'])->name('almacena.editar.guardar');

Route::post('/almacena-equipos', [AlmacenaController::class, 'guardar'])->name('almacena.guardar');

Route::get('/almacena-equipos-crear', [AlmacenaController::class, 'crear'])->name('almacena.crear');
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/empresas', [EmpresaController::class, 'listar'])->name('empresas.listar');

Route::post('/empresas', [EmpresaController::class, 'guardar'])->name('empresas.guardar');

Route::get('/empresas-crear', [EmpresaController::class, 'crear'])->name('empresas.crear');
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/materiales', [MaterialController::class, 'listar'])->name('materiales.listar');

Route::get('/materiales/{materialId}', [MaterialController::class, 'editar'])->name('materiales.editar');

Route::put('/materiales/{materialId}', [MaterialController::class, 'guardarEdicion'])->name('materiales.editar.guardar');

Route::delete('/materiales/{materialId}', [MaterialController::class, 'eliminar'])->name('materiales.eliminar');

Route::post('/materiales', [MaterialController::class, 'guardar'])->name('materiales.guardar');

Route::get('/materiales-crear', [MaterialController::class, 'crear'])->name('materiales.crear');
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/coopera', [CooperaController::class, 'listar'])->name('coopera.listar');

Route::post('/coopera', [CooperaController::class, 'guardar'])->name('coopera.guardar');

Route::get('/coopera-crear', [CooperaController::class, 'crear'])->name('coopera.crear');

Route::get('/coopera-ver/{ProyectoId}', [CooperaController::class, 'ver'])->name('coopera.verMateriales');
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/busqueda', [ReporteController::class, 'busqueda'])->name('buscar');
