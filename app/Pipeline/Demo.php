<?php 

namespace App\Pipeline;

/**
 * Demo Pipeline
 * @package Pipeline
 */
class Demo extends \VM\Pipeline {

    /**
     * @param \VM\Http\Request $request
     * @param \Closure $next
     * @param array $guards
     */
    public function handle( $request, \Closure $next, ...$guards)
    {
        return $next($request);
        /**
         * Pipeline the request
         */
        // $request->set('var', 'val');
        // $response = $next($request);
        // print_r($response);    

        /**
         * Pipeline the response
         */
        //$response = $next($request);
        //return $next(make('response')->make('demo'));
    }
    

}   