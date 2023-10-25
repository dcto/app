<?php 

namespace App\Pipeline;

/**
 * Demo Pipeline
 * @package Pipeline
 */
class Demo {

    /**
     * @param \VM\Http\Request $request
     * @param \Closure $next
     * @param array $guards
     */
    public function handle( $request, \Closure $next, ...$guards)
    {
        /**
         * @todo handle request
         * $request->set('key', 'value');
         * return $next($request); 
         */

        /**
         * @todo handle response
         * $response = $next($request);
         * $response->header('key', 'value');
         * return $response;
         */

        /**
        * @todo handle exception
        * try{
        *    $response = $next($request);
        * }catch(\Exception $e){
        *    $response = response()->json(['error' => 'Internal Server Error'], 500);
        *    return $response;
        * }
        */

        /**
         * @todo final pipeline
         * if($request->get('token') !== 'secret') return response('Unauthorized');
         */
    }
    

}   