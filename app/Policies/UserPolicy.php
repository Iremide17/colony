<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    const SUPERADMIN = 'superAdmin';
    const ADMIN = 'admin';
    const AGENT = 'agent';
    const FREELANCER = 'freelancer';
    const USER = 'user';


    public function superAdmin(User $user): bool
    {
        return $user->isSuperAdmin();
    }

    public function admin(User $user): bool
    {
        return $user->isAdmin() || $user->isSuperAdmin();
    }

    public function agent(User $user): bool
    {
        return $user->isAgent() || $user->isAdmin() || $user->isSuperAdmin();
    }

    public function freelancer(User $user): bool
    {
        return $user->isFreelancer() || $user->isAdmin() || $user->isSuperAdmin();
    }

    public function user(User $user): bool
    {
        return $user->isUser() || $user->isAdmin() || $user->isSuperAdmin();
    }
}
