<?php
/**
 * TestGuest Version1.0
 * ================================================
 * Copy 2017
 * Email: sunshunli@hotmail.com
 * ================================================
 * Author: Stanley Sun
 * Date: ${date}
 */
// 定义一个常量，用来授权调用includes里面的文件
define('IN_TG', true);

//引入公共文件, 转换成硬路径，速度更快
require dirname(__FILE__) . '/includes/common.inc.php';
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>多用户留言系统首页</title>
    <link rel="shortcuticon" href="favicon.ico" />
    <link rel="stylesheet" type="text/css" href="styles/style1/basic.css">
    <link rel="stylesheet" type="text/css" href="styles/style1/index.css">

</head>
<body>

    <?php
        require ROOT_PATH . 'includes/header.inc.php';
    ?>

    <div id="list">
        <h2>帖子列表</h2>
    </div>

    <div id="user">
        <h2>新进会员</h2>
    </div>

    <div id="pics">
        <h2>最新图片</h2>
    </div>

    <?php
        require ROOT_PATH . 'includes/footer.inc.php';
    ?>

</body>
</html>