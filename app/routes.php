<?php
//公共组
Router::group( ['id' => 'public', 'prefix' => '/', 'namespace' => 'App\Controller'], function () {  
    // Router::any( '/', fn() =>"<pre>".print_r($_ENV, true)."</pre>");

    Router::any( '/test' )->call( 'Test@index' );
    Router::any( '/file' )->call( 'Test@files' );
    Router::any( '/test/(list:*)/(id:\d+)' )->call( 'Test@test' );
    Router::get( '/test/(shop:vip|user)' )->call( 'Test@shop' ); //only allow vip or user string
    Router::get( '/test/(shop:vip|user)/(id:|\d+)' )->call( 'Test@shop' );
    //注册
    Router::post( '/signup' )->call( 'User@register' );
    //登录
    Router::post( '/signin' )->call( 'User@login' );
    //登出
    Router::get( '/logout' )->call( 'User@logout' );

    //Restful CRUD
    //Router::restful('/user')->call( 'User@restful');
} );

//验证组
Router::group( ['id' => 'permit', 'prefix' => '/', 'namespace' => 'App\Controller', 'call' => 'App\Controller\Access@auth'], function () {

} ); 