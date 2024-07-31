<?php return [

'app'=>[
    //APP标识
    'key' => '{$KEY}',
    //日志等级 (0=关闭, 1=普通日志, 2=数据日志)
    'log' => 2,
    //系统编码
    'charset'  => 'utf-8',
    //默认语言
    'language' => 'zh_CN',
    //系统时区
    'timezone' => 'PRC',
    //版本信息
    'version' => '{$REVISION}'
],

##########################################
#服务器配置
##########################################
'server'=>[
    'type' => env('SERVER_TYPE', 2), //1=http, 2=websocket, 3=base
    'host' => env('SERVER_HOST', '127.0.0.1'),
    'port' => env('SERVER_PORT', 8620),
    'setting' => [
        'worker_num' => env('WORKER_NUM', 1),
        'pid_file'=>_RUNTIME_.'/varimax.pid',
        // 'open_http_protocol'=>true, //开启HTTP协议
        // 'open_websocket_protocol'=>true, //开启WebSocket协议
    ],
    'callback' => [
        // 'start'=>null,

        # HTTP Request Event
        // 'request'=>null,

        # WebSocket Event
        // 'open'=>null,
        // 'message'=>null,
        // 'handshake'=>null,

        # TCP/UDP Event
        // 'connect'=>null,
        // 'message'=>null,
        // 'receive'=>null,
        // 'packet'=>null,
        // 'close'=>null
    ]
],

##########################################
#数据库连接, default代表默认连接库
##########################################
'database'=>[
    'default'=>'mysql',
    'connections'=>[
        //MYSQL类型
        'mysql'=>[
            #数据库类型( MySQL = mysql | SQL Server = sqlsrv | SQLite = sqlite | pgSql = pgsql)
            'driver'  =>  env('DB_DRIVER','mysql'),
            #读写分离
            #write.host  =   192.168.1.100
            #read.host[]   =   192.168.1.101
            #read.host[]   =   192.168.1.102  
            'host'      =>   env('DB_HOST', '127.0.0.1'),   //连接地址
            'port'      =>   env('DB_PORT', 3306),        //连接端口
            'database'  =>   env('DB_DATABASE', 'test'),    //数据库名称
            'username'  =>   env('DB_USERNAME', 'root'),        //连接帐号
            'password'  =>   env('DB_PASSWORD', 'root'),        //连接密码
            'prefix'    =>   env('DB_PREFIX', 'vm_'),         //所有表前缀
            'charset'   =>   env('DB_CHARSET', 'utf8mb4'),     //字符集
            'collation' =>   env('DB_COLLATION', 'utf8mb4_unicode_ci'), //排序规则
        ],

        'sqlite'=>[
            'driver'    => 'sqlite',
            'prefix'    => env('SQLITE_PREFIX', 'vm_'),
            'passowrd'  => env('SQLITE_PASSWORD', null),
            'database'  => env('SQLITE_DATABASE', _RUNTIME_.'/varimax.db'),
        ],

    ]
],

##########################################
#缓存配置
##########################################
'cache'=>[
    'default' => 'files', //缓存引擎 可选null,apc,files,redis
    'driver'=>[
            //APC缓存
            'apc'   =>  [
                'prefix'=>'vm:',
            ],
            //文件缓存
            'files' =>  [
                'dir' => _RUNTIME_.'/cache',
                'prefix'=>'vm_',
                'append'=>'.bin'
            ],
            //Redis缓存
            'redis' =>  [
                'default'   =>  [
                    'host'=> env('REDIS_HOST', 'localhost'),
                    'port'=> env('REDIS_PORT', 6379),
                    'auth'=> env('REDIS_AUTH', null),
                    'timeout'=>3,
                    'database'=>0,
                    'persistent'=>false,
                    'options'=>[
                        2=>'vm:',
                    ]
                ]
            ],

    ],
],

##########################################
#session设置
##########################################
/**
 * session config
 * @see http://php.net/session.configuration
 */
'session'=>[
    'name'=>'VMID',              //SESSION NAME 
    'auto_start'=>true,          //自动开始
    'save_handler'=>'files',     //存储引擎files,redis
    'save_path'=> _RUNTIME_.'/session', //存储路径
    // 'save_path'=> 'tcp://127.0.0.1:6379', //?prefix=&persistent=5&timeout=5&database=0&auth=
    'gc_maxlifetime' => 86400,  //持续时间秒
    'cookie_domain' => '',      //cookie 域
    'use_cookies' => 1,         //使用cookie存储sess_id
    'use_only_cookies' => 0,    //仅使用cookie存储sess_id
    'use_trans_sid'=> 1,        //使用URL传递sess_id
    'gc_probability'=>1,
    'gc_divisor'=>1,
],

##########################################
#Cookie设置
##########################################
'cookie'=>[
    'path'=>'/',        //路径
    'prefix'=>'vm_',    //前缀
    'domain'=>null,      //作用域
    'expire'=>86400,    //过期时间
    'secure'=>true,     //SSL协议
    'raw' => false,     //cookie编码
    'encrypt'=>false,   //cookie加密
    'httpOnly'=>true,   //如果 Cookie 具有 HttpOnly 特性且不能通过客户端脚本访问，则为 true；否则为 false。默认值为 false。
    'sameSite'=>null,   //站点跨域none|lax|strict 保证secure=true时有效
],


'crontab'=>[
    // \App\Job\Job::class
],

##########################################
#管道中间件
##########################################
'pipeline'=>[
    App\Pipeline\App::class // App Global Pipeline
],

##########################################
#服务提供者
##########################################
'service' => [
]
];