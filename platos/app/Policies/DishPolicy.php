<?php

namespace App\Policies;

use App\Models\Dish;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class DishPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true; // Acceso público
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Dish $dish): bool
    {
        return true; // Acceso público
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true; // Acceso para todos los usuarios logueados
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Dish $dish): bool
    {
        return false; // No se permite actualizar platos
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Dish $dish)
    {
        return $user->id === $dish->user_id; // Solo puede borrar el usuario propietario
    }


    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Dish $dish): bool
    {
        return false; // No se permite restaurar platos
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Dish $dish): bool
    {
        return false; // No se permite eliminar permanentemente platos
    }
}
