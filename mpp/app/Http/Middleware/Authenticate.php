<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class Authenticate
{
    public function handle($request, Closure $next, $role){
        if($role == 'user' && Auth::guard('user')->check())
            return $next($request);

        if($role == 'admin' && Auth::guard('admin')->check())
            return $next($request);

        if($role == 'user')
            return redirect('connexion');

        if($role == 'admin')
            return redirect('admin/connexion');
    }
}
