<?php

// Router::get('/favicon.ico', fn()=>response('', 204));

//公共组
Router::group( ['id' => 'public', 'prefix' => '/', 'namespace' => 'App\Controller'], function () {     
    Router::get('/', 'Index@index'); 
    Router::get('/auth', 'Access@auth'); 
    Router::get('/test')->call('Test@index');
    Router::get('/lang')->call('Lang@index');
    Router::get('/session')->call('Session@index');
    Router::get('/cookie')->call('Cookie@index');
    Router::get('/file' )->call('Test@files');
    Router::get('/twig' )->call('Test@twig');
    Router::get('/ws')->call('WebSocket@index');
    Router::get('/test/(shop:vip|user)' )->call('Test@shop' ); //only allow vip or user string
    Router::get('/test/(shop:vip|user)/(id:|\d+)' )->call('Test@shop' );
    Router::post('/test/(list:*)' )->id('test.list')->call('Test@test' );
    //注册
    Router::post('/signup' )->call('Access@register' );
    //登录 
    Router::post('/signin' )->call('Access@login' );
    //登出
    Router::get('/logout' )->call('Access@logout' );

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
    
    Router::group(['id'=>'menu'], function(){
        /**
         * 会员
         * name: 组名称
         * prefix: 当以/开头表示覆盖前缀,否则继承
         * namespace: 当以\开头表示覆盖命名空间前缀,否则继承
         */
        Router::group(['id'=>'user', 'name'=>'user', 'prefix'=>'/user', 'namespace'=>'User', 'pipeline'=>'App\Pipeline\User'], function(){
           
            /*
                Restful CRUD
                Method     |  Path                |  Action  |
                ------------------------------------------------
                GET        |  /test               |  get     |
                GET        |  /test/(:id)         |  get     |
                POST       |  /test               |  post    |
                PUT        |  /test/(:id)         |  put     |
                PATCH      |  /test/(:id)         |  patch   |
                DELETE     |  /test/(:id)         |  delete  |
            */
            Router::restful('/', 'User');
        });
        
        Router::group(['id'=>'admin', 'name'=>'管理员', 'prefix'=>'admin'], function(){
            Router::get('/list')->call('Admin@index');

            Router::group(['id'=>'admin.group', 'name'=>'管理员组', 'prefix'=>'group'], function(){
                Router::get('/group')->call('Admin@index');
            });
        });


    });
}); 
