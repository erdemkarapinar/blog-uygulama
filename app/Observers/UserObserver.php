<?php

namespace App\Observers;

use App\Models\User;

class UserObserver
{
    /**
     * Handle the User "created" event.
     */
    public function creating(User $user): void
    {
        // Slug'ı username'den üret
        if (empty($user->username)) {
            $user->username = Str::slug($user->name . '-' . Str::random(4));
        }
    }

    /**
     * Handle the User "updating" event.
     */
    public function updating(User $user): void
    {
        // Kullanıcı adını güncelliyorsa slug'ı da güncelle
        if (empty($user->username)) {
            $user->username = Str::slug($user->name . '-' . Str::random(4));
        }
    }
}
