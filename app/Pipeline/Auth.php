<?php 

namespace App\Pipeline;

/**
 * @package Pipeline
 */
class Auth extends \VM\Pipeline {


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