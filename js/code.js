/**
 * Created by sunshunli on 2/13/17.
 */
function code() {
    var code = document.getElementById('code');
    //实现验证码图片单击局部刷新功能
    code.onclick = function () {
        this.src='code.php?tm='+Math.random();
    }
}