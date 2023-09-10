<?php 

namespace App\Pipeline;

class AuthPipeline extends \VM\Pipeline {


    public function handle($request, \Closure $next, ...$guards)
    {
        // print_r($next);
        // print_r($request->query());
        // return $next($request);
    //    return $next(response('haha'));

        // $response = $next($request);
        
        // return  $next($request);
        // echo __DIR__ .'/test.txt';die;


        // $request->set('aaa', 'bbbb');
        return $next($request);

        // return $next(make('response')->raw('111'));
        // return $next(make('response')->download(__DIR__ .'/test.txt','ok.txt'));


        // return $next(response($response));
        // return  \Response::make(['pipeline'=>'handle']);
        // die('end');e
        // return $next(response('ok'));
        // return response('ddd');
        // return $next(['ddd'=>'ddd']);
        
        // return $response;
    }
    

}