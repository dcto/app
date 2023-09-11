<?php 

namespace App\Pipeline;

class Cors extends \VM\Pipeline {

    /**
     * Cors domain request
     */
    public function handle(\VM\Http\Request $request, \Closure $next, ...$guards)
    {
        if ($request->method('OPTIONS')) {
            return $next(make('response')->make()->withHeaders([
                'Access-Control-Allow-Origin'=>$request->header('origin'),
                'Access-Control-Allow-Methods'=>'GET, POST, PUT, DELETE, OPTIONS',
                'Access-Control-Allow-Headers'=>'Accept, Application, Authorization, Content-Type, Origin, X-Requested-With',
                'Access-Control-Allow-Credentials'=>'true'
            ]));
        }
        return $next($request);
    }
    

}   