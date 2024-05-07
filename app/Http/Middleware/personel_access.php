<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class personel_access
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $personel_access = request()->session()->get("personel_access");
        if (empty($personel_access)) {
            return redirect("/personel/login");
        }else {
            // do nothing
        }
        return $next($request);
    }
}
