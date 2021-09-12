<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Laradash;

Route::get('permisos', [Laradash\PermisosController::class, 'index'])->name('permisos.ver');

Route::resource('roles', Laradash\RolesController::class)->names('roles')->except(['create','edit','show']);

Route::resource('usuarios', Laradash\UsuariosController::class)->names('usuarios')->only(['index','store','destroy']);

Route::get('usuario/perfil/{id}', [Laradash\UsuariosController::class, 'miPerfil'])->name('usuario.perfil');
Route::post('usuario/perfil', [Laradash\UsuariosController::class, 'actualizarPerfil'])->name('usuario.perfil.actualizar');
Route::post('usuario/perfil/foto', [Laradash\UsuariosController::class, 'eliminarFoto'])->name('usuario.perfil.eliminarFoto');
Route::post('usuario/perfil/roles', [Laradash\UsuariosController::class, 'actualizarRoles'])->name('usuario.perfil.roles');
Route::post('usuario/perfil/permisos', [Laradash\UsuariosController::class, 'actualizarPermisos'])->name('usuario.perfil.permisos');
Route::post('usuario/perfil/password', [Laradash\UsuariosController::class, 'actualizarPassword'])->name('usuario.perfil.password');
