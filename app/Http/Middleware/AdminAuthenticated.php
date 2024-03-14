<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthenticated
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

            $lastItem = \App\Models\Currency::latest()->first();
            if ($lastItem) {
                Session::put('dollar_kursi', round($lastItem->uzs / $lastItem->usd));
            }

            if($user->hasRole('superuser')) {
                return redirect(route('superuser.superuser_dashboard'));
            }
            if($user->hasRole('user')) {
                return redirect(route('user.user_dashboard'));
            }
            if( $user->hasRole('admin')) {

                return $next($request);
            }

        }
      abort(403);
    }
}
