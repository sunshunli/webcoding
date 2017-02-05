/**
 * Created by sunshunli on 2/3/17.
 */
window.onload = function() {
    var faceimg = document.getElementById('faceimg');
    var code = document.getElementById('code');
    faceimg.onclick = function() {
      window.open('face.php', 'face', 'width=400,height=400,top=0,left=0,scrollbars=1');
    };

    //实现验证码图片单击局部刷新功能
    code.onclick = function () {
        this.src='code.php?tm='+Math.random();
    }
}