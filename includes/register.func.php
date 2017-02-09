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
            _alert_back('长度小于'. $_min_num .'位或大于'. $_max_num .'位');
    }

    //限制敏感字符
    $_char_pattern = '/[<>\'\"\ \   ]/';
    if (preg_match($_char_pattern, $_string)) {
        _alert_back('用户名不得包含敏感字符');
    }

    //将用户名转义输入
    return mysqli_real_escape_string($_string);
}