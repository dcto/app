<?php 

namespace App\Pipeline;

/**
 * App Authentication Pipeline
 * @package Pipeline
 */
class Auth {
    
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
        if ($authorization = $request->bearer('Authorization')){
            if($authorization == 'TestToken'){
                return $next($request);
            }
        }
        return response()->json(['code'=>401,'message' => 'Unauthorized'], 401);
    }
}   