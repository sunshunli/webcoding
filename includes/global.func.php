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

/**
 *_code()是验证码函数
 * @access public
 * @param  int $_width 表示验证码的长度
 * @param  int $_height 表示验证码的高度
 * @param  int $_rnd_num 表示验证码位数
 * @param  bool $_flag 表示验证码是否需要边框
 * @return  void 这个函数执行后产生一个验证码
 */
function _code($_width = 75, $_height = 25, $_rnd_num = 4, $_flag = false) {

    //创建随机码
        for ($i=0; $i<$_rnd_num; $i++) {
            $_nmsg .= dechex(mt_rand(0, 15));
        }

    //保存在session
        $_SESSION['code'] = $_nmsg;

    //创建一张图片
        $_img = imagecreatetruecolor($_width, $_height);

    //白色
        $_white = imagecolorallocate($_img, 255, 255, 255);

    //填充
        imagefill($_img, 0, 0, $_white);

        if ($_flag) {
            //黑色,边框
            $_black = imagecolorallocate($_img, 0, 0, 0);
            imagerectangle($_img, 0, 0, $_width - 1, $_height - 1, $_black);
        }

    //随机画出6条线
        for ($i=0; $i<6; $i++) {
            //创建随机颜色
            $_rnd_color = imagecolorallocate($_img, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
            imageline($_img, mt_rand(0, $_width ), mt_rand(0, $_height ), mt_rand(0, $_width ), mt_rand(0, $_height ), $_rnd_color);
        }

    //随机雪花
        for ($i=0; $i<100; $i++) {
            //随机色，要求颜色浅一些
            $_rnd_color = imagecolorallocate($_img, mt_rand(200, 255), mt_rand(200, 255), mt_rand(200, 255));
            imagestring($_img, 1, mt_rand(1, $_width), mt_rand(1, $_height), '*', $_rnd_color);
        }

    //输出验证码
        for ($i=0; $i<strlen($_SESSION['code']); $i++) {
            $_rnd_color = imagecolorallocate($_img, mt_rand(0, 100), mt_rand(0, 150), mt_rand(0, 200));
            imagestring($_img, 5, $i*$_width/$_rnd_num+mt_rand(1, 10), mt_rand(1, $_height/2), $_SESSION['code'][$i],  $_rnd_color);
        }


    //输出图像
        header('Content-type: image/png');
        imagepng($_img);

    //销毁图像
        imagedestroy($_img);
}