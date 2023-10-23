<?php 

namespace App\Pipeline;

/**
 * Domain Cross-Origin Resource Sharing Pipeline
 * @package Pipeline
 */
class Cors extends \VM\Pipeline {

    /**
     * @param \VM\Http\Request $request
     * @param \Closure $next
     * @param array $guards
     */
    public function handle($request, \Closure $next, ...$guards)
    {
        if ($request->method('OPTIONS')) {
            return $next(response('success', 200, [
                        'Access-Control-Max-Age'=>'600',
                        'Access-Control-Allow-Origin'=>'*',
                        'Access-Control-Allow-Methods'=>'GET, POST, PUT, DELETE, OPTIONS',
                        'Access-Control-Allow-Headers'=>'Accept, Application, Authorization, Content-Type, Origin, X-Requested-With',
                        'Access-Control-Allow-Credentials'=>'true'
                        ])
                    );
        }
        return $next($request);
    }
}   