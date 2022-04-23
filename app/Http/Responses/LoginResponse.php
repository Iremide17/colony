<?php

namespace App\Http\Responses;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginResponse as ContractsLoginResponse;

class LoginResponse implements ContractsLoginResponse
{
    public function toResponse($request)
    {
        $user = Auth::user();

        if ($user->isAdmin() || $user->isSuperAdmin()) {
            return redirect()->route('admin.dashboard');
        }
        elseif ($user->isAgent()) {

            return redirect()->route('agent.dashboard');
        }
        elseif ($user->isFreelancer()) {

            return redirect()->route('freelancer.dashboard');
        }
        return redirect()->intended(config('fortify.home'));
    }
}
