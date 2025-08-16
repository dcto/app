<?php 

namespace App\Pipeline;

/**
 * Domain Cross-Origin Resource Sharing Pipeline
 * @package Pipeline
 */
class Cors {

    /**
     * @param \VM\Http\Request $request
     * @param \Closure $next
     * @param array $guards
     */
    public function handle($request, \Closure $next, ...$guards)
    {
        return $next($request)->header('Access-Control-Max-Age', '600')
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, PATCH, DELETE, OPTIONS')
            ->header('Access-Control-Allow-Headers', 'Authorization, Content-Type, Origin, X-Requested-With');
    }
}   