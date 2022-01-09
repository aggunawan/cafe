<?php

namespace App\Policies;

use App\Models\Dish;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DishPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->hasAccess('platform.app.dishes');
    }

    public function view(User $user, Dish $dish): bool
    {
        return $user->hasAccess('platform.app.dishes');
    }

    public function create(User $user): bool
    {
        return $user->hasAccess('platform.app.dishes');
    }

    public function update(User $user, Dish $dish): bool
    {
        return $user->hasAccess('platform.app.dishes');
    }

    public function delete(User $user, Dish $dish): bool
    {
        return $user->hasAccess('platform.app.dishes');
    }

    public function restore(User $user, Dish $dish): bool
    {
        return $user->hasAccess('platform.app.dishes');
    }

    public function forceDelete(User $user, Dish $dish): bool
    {
        return $user->hasAccess('platform.app.dishes');
    }
}
