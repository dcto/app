<?php
/**
 * 视图响应
 * @param string $template
 * @param array|object $dataset
 * @
 * @return VM\Http\Response
 */
function view($template, ...$dataset)
{
    if(!app()->has('view')){
        throw new App\Exception\ErrorException('Please using `composer install varimax/view` @link https://packagist.org/packages/varimax/view ');
    }
    return make('response')->html(app('view')->engine(function($twig){
        if(getenv('DEBUG')){
            $twig->enableDebug();
            $twig->enableAutoReload();
            $twig->enableStrictVariables();
        }
    })->render($template.'.twig', ...$dataset));
}
