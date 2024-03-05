<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SuperuserAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check())
        {
            $user = Auth::user();

            if($user->hasRole('admin')) {
                return redirect(route('admin.admin_dashboard'));
            }
            if($user->hasRole('user')) {
                return redirect(route('user.user_dashboard'));
            }
            if( $user->hasRole('superuser')) {
                return $next($request);
            }

        }
        abort(403);
    }
}
