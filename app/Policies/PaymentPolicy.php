<?php

namespace App\Policies;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PaymentPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->hasAccess('platform.app.payments');
    }

    public function view(User $user, Payment $payment): bool
    {
        return $user->hasAccess('platform.app.payments');
    }

    public function create(User $user): bool
    {
        return $user->hasAccess('platform.app.payments');
    }

    public function update(User $user, Payment $payment): bool
    {
        return false;
    }

    public function delete(User $user, Payment $payment): bool
    {
        return $user->hasAccess('platform.app.payments');
    }

    public function restore(User $user, Payment $payment): bool
    {
        return $user->hasAccess('platform.app.payments');
    }

    public function forceDelete(User $user, Payment $payment): bool
    {
        return $user->hasAccess('platform.app.payments');
    }
}
