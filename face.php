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
// 定义一个常量，用来授权调用includes里面的文件
define('IN_TG', true);

//定义一个常量，用来指定本页的内容
define('SCRIPT', 'face');

//引入公共文件, 转换成硬路径，速度更快
require dirname(__FILE__) . '/includes/common.inc.php';


?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
  <title>多用户留言系统-头像选择</title>
    <?php
        require ROOT_PATH . "includes/title.inc.php";
    ?>

    <div id="face">
        <h2>选择头像</h2>
        <dl>
            <?php foreach(range(1, 9) as $num) {?>
                <dd><img src="face/m0<?php echo $num;?>.gif" alt="头像<?php echo $num;?>"></dd>
            <?php }?>
            <?php foreach(range(10, 64) as $num) {?>
                <dd><img src="face/m<?php echo $num;?>.gif" alt="头像<?php echo $num;?>"></dd>
            <?php }?>
        </dl>
    </div>




</head>
<body>


</body>
</html>