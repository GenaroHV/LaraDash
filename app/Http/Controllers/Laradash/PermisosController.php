<?php

namespace App\Http\Controllers\Laradash;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Spatie\Permission\Models\Permission;

class PermisosController extends Controller
{
    public function index(){
        $permisos = Permission::all();
        return Inertia::render('Otros/Permisos', compact('permisos'));
    }
}
