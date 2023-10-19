<?php 

namespace App\Pipeline;

/**
 * The App Global Pipeline
 * @package Pipeline
 */
class App extends \VM\Pipeline {

    public function handle(\VM\Http\Request $request, \Closure $next, ...$guards)
    {
        return $next($request);
    }
}   