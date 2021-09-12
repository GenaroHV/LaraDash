<?php

namespace App\Http\Controllers\Laradash;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UsuariosController extends Controller
{
    public function index(){
        $this->authorize('view', User::class);
        $usuarios = User::all();
        return Inertia::render('Otros/Usuarios/Usuarios', [
            'usuarios' => $usuarios
        ]);
    }

    public function miPerfil($id){
        $this->authorize('view', User::class);
        $user = User::where('id', $id)->get();
        $roles = Role::select('id','name','guard_name')->with('permissions')->orderBy('id')->get();
        $permissions = Permission::select('id','name')->get();
        return Inertia::render('Otros/Usuarios/VerUsuario', [
            'usuario' => $user,
            'roles' => $roles,
            'permissions' => $permissions
        ]);
    }

    public function actualizarPerfil(User $user, UserRequest $request){
        $this->authorize('update', $user);
        $requestUser = $request->formUsuario;
        $usuario = User::find($requestUser['id']);
        $usuario->name = $requestUser['name'];
        $usuario->email = $requestUser['email'];
        if (isset($requestUser['photo'])) {
            Storage::delete($usuario->profile_photo_path);
            $base64_image = $requestUser['photo'];
            @list($type, $file_data) = explode(';', $base64_image);
            @list(, $file_data) = explode(',', $file_data);
            $imageName = 'profile-photos/'.Str::random(40).'.'.'png';
            Storage::put($imageName, base64_decode($file_data));
            $usuario->profile_photo_path = $imageName;
        }
        $usuario->save();
        return redirect()->back()->with('success', 'Perfil actualizado');
    }

    public function eliminarFoto(Request $request){
        $requestUser = $request->formUsuario;
        $usuario = User::find($requestUser['id']);
        $this->authorize('delete', $usuario);
        Storage::delete($usuario->profile_photo_path);
        $usuario->profile_photo_path = NULL;
        $usuario->save();
        return redirect()->back()->with('success', 'Foto de perfil eliminada');
    }

    public function actualizarRoles(Request $request){
        $id = $request->usuario;
        $roles = $request->roles;
        $usuario = User::find($id);
        $usuario->roles()->detach();

        foreach ($roles as $r) {
            if($r['checked'] == true){
                $usuario->assignRole($r['id']);
            }
        }
        return redirect()->back()->with("success", "Los roles han sido actualizado");
    }

    public function actualizarPermisos(Request $request){
        $id = $request->usuario;
        $permisos = $request->permisos;
        $usuario = User::find($id);
        $usuario->permissions()->detach();

        foreach ($permisos as $p) {
            if($p['checked'] == true){
                $usuario->givePermissionTo($p['id']);
            }
        }
        return redirect()->back()->with("success", "Los permisos han sido actualizado");
    }

    public function actualizarPassword(Request $request){
        $id = $request->usuario;
        $pass = $request->formPass;
        if($pass['passwordNew'] === $pass['passwordConfirm']){
            $usuario = User::find($id);
            $usuario->password = bcrypt($pass['passwordNew']);
            $usuario->save();
            return redirect()->back()->with('success', 'La contraseña ha sido actualizada');
        }else{
            return redirect()->back()->with('error', 'Las contraseñas no son iguales');
        }
    }
}
