<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Laradash;

Route::get('permisos', [Laradash\PermisosController::class, 'index'])->name('permisos.ver');

Route::resource('roles', Laradash\RolesController::class)->names('roles')->except(['create','edit','show']);
