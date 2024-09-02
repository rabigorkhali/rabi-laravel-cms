<?php

namespace App\Http\Middleware;

use App\Exceptions\PermissionDeniedException;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PermissionRoutes
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (hasPermission($request->url(), $request->method())) {
            return $next($request);
        } else {
            echo '<div style="display: flex; align-items: center; justify-content: center; height: 100vh; background-color: #f5f5f5;">
                    <p style="text-align: center; font-size: 18px; color: #333;">
                    Permission Denied. <a href="' . route('dashboard') . '" style="color: #007bff; text-decoration: none;">Go Back.</a>
                    </p>
                </div>';
            die();
        }
    }
}
