<?php 

namespace App\Pipeline;

/**
 * The App Global Pipeline
 * @package Pipeline
 */
class App {

    /**
     * @param \VM\Http\Request $request
     * @param \Closure $next
     * @param array $guards
     */
    public function handle($request, \Closure $next, ...$guards)
    {
        $handle = $next($request);
        if(!$handle instanceof \VM\Http\Response){
            if(!$handle || is_scalar($handle)){
                $handle = response()->make($handle);
            }else{
                $handle = response()->json($handle);
            }
        }
        return $handle;
    }
}   