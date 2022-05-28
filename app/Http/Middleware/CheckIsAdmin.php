<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // редирект если пользователь не админ
       $user = Auth::user();
        if (!$user->isAdmin()) {
            return redirect()->route('raspisanie.index');
        }

       /* if ($user->isAdmin()) {
            return redirect()->route('auth.users.index');
        }*/
        return $next($request);
    }
}
