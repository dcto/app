# Varimax Application Skeleton

<li><strong>Home</strong>: <a href="http://www.varimax.cn">http://www.varimax.cn</a>
<li><strong>Source</strong>: <a href="https://github.com/dcto/app">https://github.com/dcto/app</a>
<li><strong>Issues</strong>: <a href="https://github.com/dcto/app/issues">https://github.com/dcto/app/issues</a>
<li><strong>License</strong>: MIT
<li><strong>IRC</strong>: #varimax/app on freenode

___

 <a href="https://packagist.org/packages/varimax/app"><img src="https://img.shields.io/packagist/l/varimax/app" alt="License"></a> <img src="https://img.shields.io/packagist/php-v/varimax/app" alt="PHP version"> <a href="https://packagist.org/packages/varimax/app"><img src="https://img.shields.io/github/v/release/dcto/app" alt="Latest Stable Version"></a>  <a href="https://packagist.org/packages/varimax/app"><img src="https://img.shields.io/packagist/dt/varimax/app" alt="Total Downloads"></a>

### Get started Install

```
composer create-project varimax/app
```

### Develop environment

touch the .env file into the root directory

that's content sample like it's

```
ENV=dev
DEBUG=2
```

ENV will load config directory config {ENV}.name

about DEBUG option item 1 vs 2

select 1 will be output error message without code error detail

select 2 will be output detail code exception message to the client

### Router

the varimax define some default route rule

```
':*'    =>  ':.+',
':str'  =>  ':[\w-]+',
':int'  =>  ':[1-9]\d+',
':num'  =>  ':[0-9.-]+',
':any'  =>  ':[\w!@$^&+-=|]+',
':hex'  =>  ':[a-f0-9]+',
':hash' =>  ':[a-z0-9]+',
':uuid' =>  ':[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}'
```

#### Restful APIs Style

```
Method     |  Path                |  Action   |
------------------------------------------------
GET        |  /test               |  index    |
GET        |  /test/(:id)         |  select   |
POST       |  /test/create        |  create   |
PUT/PATCH  |  /test/update/(:id)  |  update   |
DELETE     |  /test/delete/(:id)  |  delete   |
```

#### Routes

```
<?php
//公共组
Router::group( ['id' => 'public', 'prefix' => '/', 'namespace' => 'App\Controller'], function () {  
    Router::any('/', 'Index@index');
    Router::any('/test')->call('Test@index');
    Router::any('/test/(list:*)/(id:\d+)' )->call('Test@test' );
    Router::get('/test/(shop:vip|user)' )->call('Test@shop' ); //only allow vip or user string
    Router::get('/test/(shop:vip|user)/(id:|\d+)' )->call('Test@shop' );
});


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
     * prefix: 当以/开头表示覆盖前缀,否则继承
     * namespace: 当以\开头表示覆盖命名空间前缀,否则继承
     */
    Router::group(['name'=>'user', 'prefix'=>'/user', 'namespace'=>'User', 'pipeline'=>'App\Pipeline\User'], function(){
        Router::get('/list')->call('User@index');
        Router::any('/create')->call('User@create');
        Router::any('/update')->call('User@update');
        Router::any('/delete')->call('User@delete');
    });
} ); 
```

#### Varimax Command
Get vmc command destnation
> `composer vmc` 

start built server for develop [http://localhost:8620](http://localhost:8620)
> `composer dev`   

 Phpunit test review code
> `composer test`

php-cs-fixer fix to valid code
> `compsoer check` 

start web server for production
> `composer start [application = app]`  



#### App Command

Make new controller
> `composer app make:controller controllerName`

Make new model
> `composer app make:model modelName` 

Make new pipeline
> `composer app make:pipeline pipelineName`

Make new service
> `composer app make:service serviceName`
---
### Model Command

Create database table from model schema method
>`composer vmc model:schema modelName`



#### About Deverloper

> Name : D.C (陶之11)
