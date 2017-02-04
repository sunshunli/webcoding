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

// 定义一个常量，用来授权调用includes里面的文件
define('IN_TG', true);

//定义一个常量，用来指定本页的内容
define('SCRIPT', 'register');

//引入公共文件, 转换成硬路径，速度更快
require dirname(__FILE__) . '/includes/common.inc.php';

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>多用户留言系统-注册</title>
    <?php
        require ROOT_PATH . "includes/title.inc.php";
    ?>
</head>
<body>

    <?php
    require ROOT_PATH . 'includes/header.inc.php';
    ?>

    <div id="register">
        <h2>会员注册</h2>
        <form method="post" action="post.php">
            <dl>
                <dt>请认真填写以下内容</dt>
                <dd>用 户 名： <input type="text" name="username" class="text" /> (*必填，至少两位)</dd>
                <dd>密      码： <input type="password" name="password" class="text" /> (*必填，至少六位)</dd>
                <dd>确认密码：<input type="password" name="notpassword" class="text" /> (*必填，至少六位)</dd>
                <dd>密码提示：<input type="text" name="passt" class="text" /> (*必填，至少两位)</dd>
                <dd>密码回答：<input type="text" name="passd" class="text" /> (*必填，至少两位)</dd>
                <dd>性       别：<input type="radio" name="sex" value="男" checked="checked" /> 男 <input type="radio" name="sex" value="女" /> 女</dd>
                <dd class="face"><input type="hidden" name="face" value="face/m01.gif" id="face"><img src="face/m01.gif" alt="头像选择" id="faceimg" )"></dd>
                <dd>电子邮件：<input type="text" name="email" class="text" /></dd>
                <dd>    Q Q   ： <input type="text" name="qq" class="text" /></dd>
                <dd> 主页地址：<input type="text" name="url" class="text" value="http://" /></dd>
                <dd> 验 证 码：<input type="text" name="yzm" class="text yzm" /><img src="code.php" alt=""></dd>
                <dd><input type="submit" class="submit" value="注册" /></dd>


            </dl>
        </form>
    </div>

    <?php
        require ROOT_PATH . 'includes/footer.inc.php';
    ?>

    <script type="text/javascript" src="js/face.js"></script>
</body>
</html>








