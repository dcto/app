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
        try{
            $r = $next($request);
            if(!$r instanceof \VM\Http\Response){
                $r = is_scalar($r) ? $this->response(200, $r) : $this->response(200, 'success', $r);
            }
            return $r;
        }catch(\Throwable $e){
            error_log($e, 4);
            return $this->response($e->getCode(), $e->getMessage(), []);
        }
    }

    /**
     * 全局响应
     * @param int $code
     * @param string $message
     * @param array $data
     * @return \VM\Http\Response
     */
    protected function response(int $code = 200, string $message = '', array $dataset = [])
    {
        return response()->json(['code'=>$code, 'message' => $message, 'dataset'=>$dataset], $code);
    }
}   