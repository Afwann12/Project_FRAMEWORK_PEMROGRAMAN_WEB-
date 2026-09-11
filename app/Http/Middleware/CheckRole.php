<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Ubah logika pengecekan di dalam method handle() ini
        if (! $request->user() || ! in_array($request->user()->role, $roles)) {
            return response()->view('errors.custom_403', [], 403);
        }

        return $next($request);
    }
}