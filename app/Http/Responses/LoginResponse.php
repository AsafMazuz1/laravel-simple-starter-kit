<?php

namespace App\Http\Responses;
use App\Enums\UserRole;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    /**
     * @param  $request
     * @return mixed
     */
    public function toResponse($request)
    {
        switch (auth()->user()->role) {
            case UserRole::Admin:
                $home = redirect()->intended('/admin/dashboard');
            case UserRole::Sorter:
                $home = redirect()->route('sorter.dashboard');
            default:
                $home = redirect()->intended('/dashboard');
        }
        return $home;
    }
}

