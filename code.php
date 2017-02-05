<?php
/**
 * TestGuest Version1.0
 * ================================================
 * Copy 2017
 * Email: sunshunli@hotmail.com
 * ================================================
 * Author: Stanley Sun
 * Date: 2/4/17
 */

//开启回话
session_start();

// 定义一个常量，用来授权调用includes里面的文件
define('IN_TG', true);

//引入公共文件, 转换成硬路径，速度更快
require dirname(__FILE__) . '/includes/common.inc.php';

//运行验证码函数
//默认验证码大小为：75*25，默认位数是4位，如果要6位，长度推荐125，如果要8位，推荐175，以此类推
//第四个参数是，是否要边框，要的话true,不要的话false，默认是false
//可以通过数据库的方法，来设置验证码的各种属性
_code();





