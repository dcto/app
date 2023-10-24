<?php 

namespace App\Pipeline;

/**
 * App Authentication Pipeline
 * @package Pipeline
 */
class Auth extends \VM\Pipeline {
    
    /**
     * @param \VM\Http\Request $request
     * @param \Closure $next
     * @param array $guards
     */
    public function handle($request, \Closure $next, ...$guards)
    {
        /**
         * @var \Response $response
         */
        $response = $next($request);
        if ($authorization = $request->bearer('Authorization')){
            if($authorization == 'TestToken'){
                return $response;
            }
        }
        $response->json(['code'=>401,'message' => 'Unauthorized'], 401);
        return $response;
    }
}   