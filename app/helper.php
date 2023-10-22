<?php

/**
 * 视图响应
 * @param string $template
 * @param array|object $dataset
 * @
 * @return \VM\Http\Response
 */
function view($template, ...$dataset)
{
    if(!app()->has('view')){
        throw new \App\Exception\ErrorException('Please using `composer install varimax/view` @link https://packagist.org/packages/varimax/view ');
    }
    return make('response')->html(app('view')->render($template, ...$dataset));
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