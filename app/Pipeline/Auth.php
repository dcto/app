<?php 

namespace App\Pipeline;

/**
 * App Authentication Pipeline
 * @package Pipeline
 */
class Auth extends \VM\Pipeline {
    /**
     * Request Authentication Hanlder
     */
    public function handle(\VM\Http\Request $request, \Closure $next, ...$guards)
    {
        if ($authorization = $request->header('Authorization')){
            if($authorization == 'abcd123'){
                return $next($request);
            }
        }
        return $next(response()->json(['code'=>401,'message' => 'Unauthorized'], 401));
    }
}   