<?php
/**
 * 全局响应
 * @param string|array $response 响应内容 
 * @param int $code 错误码
 * @return \VM\Http\Response
 */
function response($response = null, $code = 0, $message = null, $callback = null)
{
    if(is_null($response)) return make('response');
    
    $dataset = [];
    is_string($response) ?  $message = $response : $dataset = $response;
    unset($response);
    return Response::json(
        array(
            'code' => $code,  
            'dataset' => $dataset,
            'message' => $message,
            'callback' => $callback
        )
    );
}

/**
 * 视图响应
 * @param string $layout
 * @param array $data
 * @param int $status
 * @param array $headers
 * @return \VM\Http\Response
 */
if(!function_exists('template')) {
    function template($layout, $data = [], $status = 200, array $headers = [])
    {
        return make('response')->html(make('view')->render($layout, $data), $status, $headers);
    }
}