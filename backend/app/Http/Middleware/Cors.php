<?php

namespace App\Http\Middleware;

use Closure;

class Cors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) 
    {
        $paths = explode('/', \Request::getPathInfo());
        // pathに[api]があればCORS対応
        if ($paths[1] === 'api') {
            return $next($request)
                ->header('Access-Control-Allow-Origin', 'http://localhost:8080')
                ->header('Access-Control-Allow-Methods', 'GET, POST, OPTIONS')
                ->header('Access-Control-Allow-Headers', 'X-XSRF-TOKEN, Content-Type')
                ->header('Access-Control-Allow-Credentials', true);
        }
        return $next($request);
    }
}
