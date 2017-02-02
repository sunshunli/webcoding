<?php
/**
 * TestGuest Version1.0
 * ================================================
 * Copy 2017
 * Email: sunshunli@hotmail.com
 * ================================================
 * Author: Stanley Sun
 * Date: 2/2/17
 */


/**
 *_runtime()是用来获取执行耗时
 *@access public 表示函数对外公开
 *@return float 表示返回的是一个浮点型数字
 */
function _runtime() {
    $_mtime = explode(' ', microtime());
    return $_mtime[1] + $_mtime[0];
}
