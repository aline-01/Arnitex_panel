<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class admin_access
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $admin_access = request()->session()->get("admin_access");
        if (empty($admin_access)) {
            return redirect("/admin area/login");
        }else {
            // do nothing
        }

        return $next($request);
    }
}
