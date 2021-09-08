<?php

namespace App\Http\Controllers\Laradash;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    public function index(){
        $roles = Role::select('id','name','guard_name')->with('permissions')->orderBy('id')->get();
        $permissions = Permission::select('id','name')->get();
        return Inertia::render('Otros/Roles', compact('roles', 'permissions'));
    }

    public function store(Request $request){
        $rol = Role::create([
            'name' => $request->name,
            'guard_name' => 'web'
        ]);
        if($request->has('permissions')){
            $rol->givePermissionTo($request->permissions);
        }
        return redirect()->back()->with("success", "El rol ha sido grabado");
    }

    public function update(Request $request, Role $rol){
        $rol = Role::findOrFail($request->params['id']);
        $rol->update(['name' => $request->params['name']]);
        $rol->permissions()->detach();
        foreach ($request->permisos as $p) {
            if($p['checked'] == true){
                $rol->givePermissionTo($p['id']);
            }
        }
        return redirect()->back()->with("success", "El rol ha sido actualizado");
    }

    public function destroy($id){
        $rol = Role::findOrFail($id);
        $rol->delete();
        return back()->with("success", "El rol ha sido eliminado");
    }
}
