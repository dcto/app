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

#### Router demo
```
//公共组
Router::group( ['id' => 'public', 'prefix' => '/', 'namespace' => 'App\Controller'], function () {    
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
    Router::restful('/user')->call( 'User@restful');
} );

//验证组
Router::group( ['id' => 'permit', 'prefix' => '/', 'namespace' => 'App\Controller', 'call' => 'App\Controller\Access@auth'], function () {

} ); 
```


#### About Deverloper

>Name : D.C (陶之11)
