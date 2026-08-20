<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->role === 'admin') {
            return $next($request);
        }

        // Mau dilempar balik ke dashboard user atau tampil 403
        return redirect()->route('user.dashboard')->with('error', 'Akses ditolak. Khusus Admin.');
        // ATAU jika mau 403: abort(403, 'Akses ditolak. Halaman ini khusus untuk Admin.');
    }
}
