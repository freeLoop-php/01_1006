<?php
return array(
	//'配置项'=>'配置值'
    /* 数据库设置 */
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  'localhost', // 服务器地址
    'DB_NAME'               =>  'db_oa',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  'root',          // 密码
    'DB_PORT'               =>  '3306',        // 端口，默认是3306，mysql的话可以不用设置
    'DB_PREFIX'             =>  'sp_',    // 数据库表前缀
    /*开启跟踪信息*/
    'SHOW_PAGE_TRACE'       =>  true,
    'LOAD_EXT_FILE'         =>  'info',
    /*RBAC权限自定义信息*/
    /*1.角色数组*/
    'RBAC_ROLES'            => array(
                                1 => "高层管理",
                                2 => "中层领导",
                                3 => "普通职员",
                            ),
    /*1.权限数组(关联角色数组,一一对应关系)*/
    'RBAC_ROLE_AUTHS'            => array(
                                1 => "*/*",//拥有全部的权限
                                2 => array("email/*","doc/*","knowledge/*","index/*"),
                                3 => array("email/*","knowledge/*","index/*"),
                            ),

);

