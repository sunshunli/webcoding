<?php
/**
 * TestGuest Version1.0
 * ================================================
 * Copy 2017
 * Email: sunshunli@hotmail.com
 * ================================================
 * Author: Stanley Sun
 * Date: 2/1/17
 */
//防止恶意调用
if (!defined('IN_TG')) {
    exit('Access Defined!');
}

//设置字符集
header('Content-Type: text/html; charset=utf-8');

//转换硬路径常量
define('ROOT_PATH', substr(dirname(__FILE__), 0, -8));

//拒绝PHP低版本
if (PHP_VERSION < '4.1.0') {
    exit('Version is too Low!');
}

//引入核心函数库
require ROOT_PATH .'includes/global.func.php';

//执行耗时
define('START_TIME', _runtime());

//数据库连接

define('DB_USER', 'root');
define('DB_PWD', 'vmware.c0m');
define('DB_HOST', 'localhost');
define('DB_NAME', 'testguest');

//创建数据库连接
$_conn = mysqli_connect(DB_HOST, DB_USER, DB_PWD) or die('数据库连接失败!');

//选择一款数据库
mysqli_select_db($_conn, DB_NAME) or die('指定的数据库不存在!');

//选择字符集
mysqli_query($_conn, 'SET NAMES UTF8') or die('字符集错误!');











