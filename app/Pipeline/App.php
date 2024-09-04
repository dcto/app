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
        //automatic handle response  array|string|throwable
        //automatic handle response  array|string|throwable
        try{
            
            $r = $next($request);
            if(!$r instanceof \VM\Http\Response){
                $r = is_scalar($r) ? \Response::make($r) : \Response::json($r);
            }
            return $r;

        }catch(\Throwable $e){

            error_log($e, 4);
            
            if($request->accept('application/json')) return $this->response(500, $e->getMessage(), []);

            return \Response::make(\VM\Exception\E::html($e), 500);
        }
    }

    /**
     * 全局响应
     * @param int $code
     * @param string $message
     * @param array $data
     * @return \VM\Http\Response
     */
    protected function response(int $code = 200, string $message = '', $data = [])
    {
        return response()->json(['code'=>$code, 'data'=>$data, 'message' => $message], $code);
    }
}   