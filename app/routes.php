<?php
//公共组
Router::group( ['id' => 'public', 'prefix' => '/', 'namespace' => 'App\Controller'], function () {  
    Router::any('/', 'Index@index');
    Router::any('/test')->call('Test@index');
    Router::any('/lang')->call('Lang@index');
    Router::any('/session')->call('Session@index');
    Router::any('/cookie')->call('Cookie@index');
    Router::any('/file' )->call('Test@files');
    Router::any('/twig' )->call('Test@twig');
    Router::any('/test/(list:*)/(id:\d+)' )->call('Test@test' );
    Router::get('/test/(shop:vip|user)' )->call('Test@shop' ); //only allow vip or user string
    Router::get('/test/(shop:vip|user)/(id:|\d+)' )->call('Test@shop' );
    //注册
    Router::post('/signup' )->call('User@register' );
    //登录
    Router::post('/signin' )->call('User@login' );
    //登出
    Router::get('/logout' )->call('User@logout' );

    //Restful CRUD
    //Router::restful('/user')->call( 'User@restful');
} );


/**
 * 验证组
 * @param id 组id
 * @param prefix 组前缀
 * @param namespace 组命名空间
 * @param pipeline 组中间件
 */
Router::group( ['id' => 'permit', 'prefix' => '/', 'namespace' => 'App\Controller', 'pipeline' => [\App\Pipeline\Auth::class,\App\Pipeline\Cors::class]], function () {    
   
    //首页
    Router::get('/home')->call('Home@index');
    
    /**
     * 会员中心
     * name: 组名称
     * prefix: 当以/开头表示重写前缀否则继承
     * namespace: 当以\开头表示重写命名空间前缀否则继承
     */
    Router::group(['name'=>'user', 'prefix'=>'/user', 'namespace'=>'User', 'pipeline'=>'App\Pipeline\User'], function(){
        Router::get('/list')->call('User@index');
        Router::any('/create')->call('User@create');
        Router::any('/update')->call('User@update');
        Router::any('/delete')->call('User@delete');
    });
} ); 