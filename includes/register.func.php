<?php
/**
 * TestGuest Version1.0
 * ================================================
 * Copy 2017
 * Email: sunshunli@hotmail.com
 * ================================================
 * Author: Stanley Sun
 * Date: 2/6/17
 */
//防止恶意调用
if (!defined('IN_TG')) {
    exit('Access Defined!');
}

if (!function_exists('_alert_back')){
    exit('_alert_back()函数不存在，请检查！');
}

if (!function_exists('_mysql_string')){
    exit('_mysql_string()函数不存在，请检查！');
}

function _check_uniqid($_first_uniqid, $_end_uniqid) {

    if ((strlen($_first_uniqid) != 40) || ($_first_uniqid != $_end_uniqid)) {
        _alert_back('唯一标识符异常!');
    }


    return _mysql_string($_first_uniqid);
}

/**
 *_check_username表示检测并过滤的用户名
 * @access public
 * @param string $_string 受污染的用户名
 * @param int $_min_num 最小位数
 * @param int $_max_num 最大位数
 * @return string 过滤后的用户名
 */
function _check_username($_string, $_min_num, $_max_num) {
    //去掉两边空格
    $_string = trim($_string);

    //长度小于2位或者大于20位
    if (mb_strlen($_string, 'utf-8') < $_min_num || mb_strlen($_string, 'utf-8') > $_max_num) {
            _alert_back('用户名长度不得小于'. $_min_num .'位或大于'. $_max_num .'位');
    }

    //限制敏感字符
    $_char_pattern = '/[<>\'\"\ \   ]/';
    if (preg_match($_char_pattern, $_string)) {
        _alert_back('用户名不得包含敏感字符');
    }

    //将用户名转义输入
    return _mysql_string($_string);
}

/**
 *_check_password验证密码
 * @access public
 * @param string $_first_pass 输入的密码
 * @param int $_end_pass 输入的确认密码
 * @param int $_min_num 密码最小位数
 * @return string $_first_pass返回一个加密后的密码
 */
function _check_password($_first_pass, $_end_pass, $_min_num=6) {
    //判断密码
    if (strlen($_first_pass) < $_min_num) {
        _alert_back('密码不得小于' . $_min_num . '位!');
    }

    //密码和密码确认一致
    if ($_first_pass != $_end_pass) {
        _alert_back('密码和确认密码不一致!');
    }

    //返回密码
    return sha1($_first_pass);

}

/**
 *_check_question 返回密码提示
 * @access public
 * @param string $_string 提示信息
 * @param int $_min_num 提示密码最少字数
 * @param int $_max_num 提示密码最大字数
 * @return string $_string 返回密码提示
 */
function _check_question($_string, $_min_num, $_max_num) {
    $_string = trim($_string);
    //长度小于4位或者大于20位
    if (mb_strlen($_string, 'utf-8') < $_min_num || mb_strlen($_string, 'utf-8') > $_max_num) {
        _alert_back('密码提示不得小于'. $_min_num .'位或大于'. $_max_num .'位');
    }
    //返回密码提示
    return _mysql_string($_string);
}

function _check_answer($_ques, $_answ, $_min_num, $_max_num) {
    $_answ = trim($_answ);
    //长度小于4位或者大于20位
    if (mb_strlen($_answ, 'utf-8') < $_min_num || mb_strlen($_answ, 'utf-8') > $_max_num) {
        _alert_back('密码回答不得小于'. $_min_num .'位或大于'. $_max_num .'位');
    }

    //密码提示与回答不能一致
    if ($_ques == $_answ) {
        _alert_back('密码提示与回答不得一致!');
    }
    //加密返回
    return sha1($_answ);
}

/**
 * _check_sex 性别
 * @param string $_string
 * @return string
 */
function _check_sex($_string) {
    return _mysql_string($_string);
}

/**
 * _check_face 头像
 * @param string $_string
 * @return string
 */
function _check_face($_string) {
    return _mysql_string($_string);
}

/**
 * _check_email() 检查邮箱是否合法
 * @access public
 * @param string $_string 提交的邮箱地址
 * @return string $_string 验证后的邮箱地址
 */
function _check_email($_string, $_min_num, $_max_num) {

    if (!preg_match('/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/', $_string)) {
        _alert_back('邮件格式不正确!');
    }

    if (strlen($_string) < $_min_num || strlen($_string) > $_max_num) {
        _alert_back('邮件长度不合法!');
    }

    return _mysql_string($_string);
}

/**
 * _check_qq 检查QQ号码合法
 * @access  public
 * @param int $_string QQ号码
 * @return int $_string QQ号码
 */
function _check_qq($_string) {
    if (empty($_string)) {
        return null;
    } else {
        if (!preg_match('/^[1-9]{1}[0-9]{4,9}$/', $_string)) {
            _alert_back('QQ号码不正确！');
        }
    }

    return _mysql_string($_string);
}

/**
 * _check_url 网址验证
 * @access public
 * @param string $_string 网址
 * @return string $_string 返回过滤的网址
 */
function _check_url($_string, $_max_num) {
    if (empty($_string) || ($_string == 'http://')) {
        return null;
    } else {
        if (!preg_match('/^http(s)?:\/\/(\w+\.)?[\w\-\.]+(\.\w+)+$/', $_string)) {
            _alert_back('网址不正确!');
        }
        if (strlen($_string) > $_max_num) {
            _alert_back('网址太长啦!');
        }
    }

    return _mysql_string($_string);
}