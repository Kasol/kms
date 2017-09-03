<?php
return array(
	//'配置项'=>'配置值'
    'pageNum' => 12,//分页的时候每页显示的条数
    'FILE_UPLOAD_CONFIG' => array(
        'maxSize'    =>    314572811111,
        'rootPath'   =>    './Uploads/',
        'savePath'   =>    '',
        'saveName'   =>    array('uniqid',''),
        'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),
        'autoSub'    =>    true,
        'subName'    =>    array('date','Ymd'),
    ),
    'VIEW_PATH'=>'./App/template/',
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  'localhost', // 服务器地址
    'DB_NAME'               =>  'kms',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  'root',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  '',    // 数据库表前缀
    'DB_PARAMS'          	=>  array(), // 数据库连接参数
    'DB_DEBUG'  			=>  TRUE, // 数据库调试模式 开启后可以记录SQL日志
    'DB_FIELDS_CACHE'       =>  true,        // 启用字段缓存
    'DB_CHARSET'            =>  'utf8',      // 数据库编码默认采用utf8
    'DB_DEPLOY_TYPE'        =>  0, // 数据库部署方式:0 集中式(单一服务器),1 分布式(主从服务器)
    'DB_RW_SEPARATE'        =>  false,       // 数据库读写是否分离 主从式有效
    'DB_MASTER_NUM'         =>  1, // 读写分离后 主服务器数量
    'DB_SLAVE_NO'           =>  '' ,// 指定从服务器序号,
    'TMPL_PARSE_STRING'  =>array(
    '__CSS__'     => '/KMS/Pub', // 增加新的css类库路径替换规则
    '__JS__'     => '/KMS/Pub/', // 增加新的JS类库路径替换规则
    '__UPLOAD__' => '/KMS/Uploads/', // 增加新的上传路径替换规则
    )
);