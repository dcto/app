<?php 

namespace App\Pipeline;

/**
 * @package Pipeline
 */
class Demo extends \VM\Pipeline {


    public function handle(\VM\Http\Request $request, \Closure $next, ...$guards)
    {
        /**
         * Pipeline the request
         */
        // $request->set('var', 'val');
        // $response = $next($request);
        // print_r($response);    
        return $next($request);

        /**
         * Pipeline the response
         */
        //$response = $next($request);
        //return $next(make('response')->make('demo'));
    }
    

}   