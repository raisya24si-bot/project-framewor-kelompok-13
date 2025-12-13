<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// gunakan Response dari Symfony (seperti default Laravel 11/12)
use Symfony\Component\HttpFoundation\Response;

class CheckIsLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login')
                ->withErrors('Silahkan login terlebih dahulu!');
        }

        return $next($request);
    }
}
