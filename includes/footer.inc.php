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

?>
<div id="footer">
    <p>本程序执行耗时为：<?php echo round((_runtime() - START_TIME), 4);?>秒</p>
    <p>版权所有 翻版必究</p>
    <p>本程序由<span>瓢城Web俱乐部</span>提供 源代码可以任意修改或发布 (c) yc60.com</p>
</div>
