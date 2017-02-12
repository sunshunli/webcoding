<?php
/**
 * TestGuest Version1.0
 * ================================================
 * Copy 2017
 * Email: sunshunli@hotmail.com
 * ================================================
 * Author: Stanley Sun
 * Date: 2/11/17
 */

//防止恶意调用
if (!defined('IN_TG')) {
    exit('Access Defined!');
}


/**
 * _connect 连接MySQL数据库
 * @access public
 * @return resource
 */
function _connect() {
    //global 表示全局变量的意思，意图是将此变量在函数外部也能访问
    global $_conn;
    if (!$_conn = mysqli_connect(DB_HOST, DB_USER, DB_PWD)) {
        exit('数据库连接失败!');
    }

    return $_conn;
}

/**
 * _select_db 选择数据库
 * @param $_conn 数据库连接句柄
 * @return void
 */
function _select_db($_conn) {
    if (!mysqli_select_db($_conn, DB_NAME)) {
        exit('指定的数据库不存在!');
    }
}

/**
 * _set_names 设置字符集
 */
function _set_names($_conn) {
    if (!mysqli_query($_conn, 'SET NAMES UTF8')) {
        exit('字符集错误');
    }
}

/**
 * _query 执行sql语句函数
 * @param $_conn 数据库连接句柄
 * @param $_sql sql语句
 * @return bool|mysqli_result
 */
function _query($_conn, $_sql) {
    if (!$_result = mysqli_query($_conn, $_sql)) {
        exit('SQL执行失败!');
    }
    return $_result;
}

/**
 * @param $_conn
 * @param $_sql
 * @return array|null
 */
function _fetch_array($_conn, $_sql) {
    return mysqli_fetch_array(_query($_conn, $_sql));
}


/**
 * _affected_rows 表示影响到的记录数
 * @param $_conn
 * @return int
 */
function _affected_rows($_conn) {
    return mysqli_affected_rows($_conn);
}
/**
 * @param $_sql
 * @param $_info
 */
function _is_repeat($_conn, $_sql, $_info) {
    if (_fetch_array($_conn, $_sql)) {
        _alert_back($_info);
    }
}

/**
 * @param $_conn
 */
function _close($_conn) {
    mysqli_close($_conn);
}






