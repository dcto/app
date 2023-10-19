<?php return [
'app'=>[
    //APP标识
    'key' => '{$KEY}',
    //日志等级 (0=关闭, 1=普通日志, 2=数据日志)
    'log' => getenv('DEBUG'),
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
#目录配置
##########################################
'dir'=>[
    'app'     => _DIR_, //应用目录
    'www'     => _WWW_, //发布目录
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
            'driver'  =>  'mysql',
            #读写分离
            #write.host  =   192.168.1.100
            #read.host[]   =   192.168.1.101
            #read.host[]   =   192.168.1.102  
            'host'      =>   'localhost',   //连接地址
            'port'      =>   '3306',        //连接端口
            'database'  =>   'test',        //数据库名称
            'username'  =>   'root',        //连接帐号
            'password'  =>   'root',        //连接密码
            'prefix'    =>   'vm_',         //所有表前缀
            'charset'   =>   'utf8mb4',     //字符集
            'collation' =>   'utf8mb4_unicode_ci',
        ],

        'sqlite'=>[
            'driver'    => 'sqlite',
            'prefix'    => 'vm_',
            'passowrd'  => '',
            'database'  => null
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
                'dir' => runtime('cache'),
                'prefix'=>'vm_',
                'append'=>'.bin'
            ],
            //Redis缓存
            'redis' =>  [
                'default'   =>  [
                    'host'=> 'redis',
                    'port'=>'6379',
                    'prefix'=>'vm:',
                    'timeout'=>'5',
                    'database'=>'0',
                    'password' => '',
                    'persistent'=>'0',
                    'options'=>[]

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
    'save_path'=>runtime('session'), //存储路径
    // 'save_path'=> 'tcp://127.0.0.1:6379?persistent=5&timeout=5&database=1&auth=',
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
    'domain'=>'.',      //作用域
    'expire'=>86400,    //过期时间
    'secure'=>true,     //SSL协议
    'raw' => false,     //cookie编码
    'encrypt'=>false,   //cookie加密
    'httpOnly'=>true,   //如果 Cookie 具有 HttpOnly 特性且不能通过客户端脚本访问，则为 true；否则为 false。默认值为 false。
    'sameSite'=>null,   //站点跨域none|lax|strict 保证secure=true时有效
],

##########################################
#管道中间件
##########################################
'pipeline'=>[
    \App\Pipeline\Cors::class
],

##########################################
#服务提供者
##########################################
'service' => [

    ]
];