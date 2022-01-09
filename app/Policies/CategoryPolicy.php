<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->hasAccess('platform.app.categories');
    }

    public function view(User $user, Category $category): bool
    {
        return $user->hasAccess('platform.app.categories');
    }

    public function create(User $user): bool
    {
        return $user->hasAccess('platform.app.categories');
    }

    public function update(User $user, Category $category): bool
    {
        return $user->hasAccess('platform.app.categories');
    }

    public function delete(User $user, Category $category): bool
    {
        return $user->hasAccess('platform.app.categories');
    }

    public function restore(User $user, Category $category): bool
    {
        return $user->hasAccess('platform.app.categories');
    }

    public function forceDelete(User $user, Category $category): bool
    {
        return $user->hasAccess('platform.app.categories');
    }
}
