<?php

namespace App\Http\Middleware;

use App\Enums\UserRole;
use Closure;
use Illuminate\Http\Request;
use Laravel\Jetstream\Role;

class Sorter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //Check if auth user is sorter (role = 1 or 2)
        if (auth()->user()->role == UserRole::Sorter || auth()->user()->role == UserRole::Admin) {
            return $next($request);
        }
        return redirect()->route('404');

    }
}
