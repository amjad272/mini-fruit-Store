<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPassword
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($request->api_password != env('API_PASSWORD','DArOMWUnDXyqVhiaslx') || $request->api_password == null) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        return $next($request);
    }
}
