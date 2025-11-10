<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        // Jika tidak diberikan role parameter, izinkan semua yang login
        if (empty($roles)) {
            return $next($request);
        }

        // Cek apakah role user sesuai parameter
        if (in_array($user->role, $roles)) {
            return $next($request);
        }

        // Kalau tidak sesuai, arahkan ke halaman home
        return redirect()->route('home')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
    }
}
