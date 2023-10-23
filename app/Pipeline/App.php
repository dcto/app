<?php 

namespace App\Pipeline;

/**
 * The App Global Pipeline
 * @package Pipeline
 */
class App extends \VM\Pipeline {

    /**
     * @param \VM\Http\Request $request
     * @param \Closure $next
     * @param array $guards
     */
    public function handle($request, \Closure $next, ...$guards)
    {
        return $next($request);
    }
}   