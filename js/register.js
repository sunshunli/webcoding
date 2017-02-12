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

    //表单验证
    var fm = document.getElementsByTagName('form')[0];
    fm.onsubmit = function () {
        if (fm.username.value.length < 2 || fm.username.value.length > 20) {
            alert('用户名不得小于2位或者大于20位');
            fm.username.value = '';
            fm.username.focus();
            return false;
        }
        if (/[<>\'\"\ ]/.test(fm.username.value)) {
            alert('用户名不得包含非法字符');
            fm.username.value = '';
            fm.username.focus();
            return false;
        }

        //密码验证
        if (fm.password.value.length < 6) {
            alert('密码不得小于6位');
            fm.password.value = '';
            fm.password.focus();
            return false;
        }

        if (fm.password.value != fm.notpassword.value) {
            alert('密码与确认密码不一致!');
            fm.notpassword.value = '';
            fm.notpassword.focus();
            return false;
        }
        //密码提示与回答
        if (fm.password.value.length < 6) {
            alert('密码不得小于6位');
            fm.password.value = '';
            fm.password.focus();
            return false;
        }
        return true;
    }

}







