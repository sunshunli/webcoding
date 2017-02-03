<?php
/**
 * TestGuest Version1.0
 * ================================================
 * Copy 2017
 * Email: sunshunli@hotmail.com
 * ================================================
 * Author: Stanley Sun
 * Date: 2/3/17
 */

//防止恶意调用
if (!defined('IN_TG')) {
    exit('Access Defined!');
}

//防止非HTML页面调用
if (!defined('SCRIPT')) {
    exit('Script Error!');
}

?>
<link rel="shortcuticon" href="favicon.ico" />
<link rel="stylesheet" type="text/css" href="styles/style1/basic.css">
<link rel="stylesheet" type="text/css" href="styles/style1/<?php echo SCRIPT;?>.css">
