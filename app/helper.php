<?php

/**
 * 视图响应
 * @param string $layout
 * @param array|object $dataset
 * @return \VM\Http\Response
 */
function view($layout, ...$dataset)
{
    return make('response')->html(app('view')->make('php')->render($layout, ...$dataset));
}

/**
 * www path
 * @param string ...$paths
 * @return string
 */
function www(...$paths)
{
    $file =  str_replace('//', '/', '/'. (count($paths) == 1 ? trim($paths[0], '/') : join('/', $paths)));
    return is_file(_WWW_.$file) ? $file : '/images/404.gif';
}