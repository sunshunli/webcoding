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

//转换硬路径常量
define('ROOT_PATH', substr(dirname(__FILE__), 0, -8));

//拒绝PHP低版本
if (PHP_VERSION < '4.1.0') {
    exit('Version is too Low!');
}

//引入核心函数库
require ROOT_PATH .'includes/global.func.php';
