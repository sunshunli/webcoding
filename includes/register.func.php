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
    exit('函数不存在，请检查！');
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
    return mysqli_real_escape_string($_string);
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
    //长度小于4位或者大于20位
    if (mb_strlen($_string, 'utf-8') < $_min_num || mb_strlen($_string, 'utf-8') > $_max_num) {
        _alert_back('密码提示不得小于'. $_min_num .'位或大于'. $_max_num .'位');
    }
    //返回密码提示
    return mysql_real_escape_string($_string);
}

function _check_answer($_ques, $_answ, $_min_num, $_max_num) {
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