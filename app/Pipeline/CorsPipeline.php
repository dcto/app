<?php 

namespace App\Pipeline;

class CorsPipeline extends \VM\Pipeline {


    public function handle(\VM\Http\Request $request, \Closure $next, ...$guards)
    {
        if ($request->method('OPTIONS')) {
            
        }

        return $next($request);
    }
    

}   