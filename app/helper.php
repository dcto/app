<?php
/**
 * 全局响应
 * @param string|array $response 响应内容 
 * @param int $code 错误码
 * @return \VM\Http\Response\Base|\VM\Http\Response\Json
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