<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function view(User $user){
        return $user->hasPermissionTo('ver:usuario');
    }

    public function create(User $user){
        return $user->hasPermissionTo('crear:usuario');
    }

    public function update(User $user){
        return $user->hasPermissionTo('editar:usuario');
    }

    public function delete(User $user){
        return $user->hasPermissionTo('eliminar:usuario');
    }
}
