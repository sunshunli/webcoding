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
        if (fm.question.value.length < 2 || fm.question.value.length > 20) {
            alert('密码不得小于2位或大于20位!');
            fm.question.value = '';
            fm.question.focus();
            return false;
        }
        if (fm.answer.value.length < 2 || fm.answer.value.length > 20) {
            alert('密码回答不得小于2位或大于20位!');
            fm.answer.value = '';
            fm.answer.focus();
            return false;
        }

        if (fm.answer.value == fm.question.value.length) {
            alert('密码提示和回答不可一样!');
            fm.answer.value = '';
            fm.answer.focus();
            return false;
        }
        //邮箱验证
        if (!/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/.test(fm.email.value)) {
            alert('邮箱格式不正确!');
            fm.email.value = '';
            fm.email.focus();
            return false;
        }
        //QQ号码
        if (fm.qq.value != '') {
            if (!/^[1-9]{1}[0-9]{4,9}$/.test(fm.qq.value)) {
                alert('QQ号码不正确!');
                fm.qq.value = '';
                fm.qq.focus();
                return false;
            }
        }

        if (fm.url.value != '') {
            if (!/^http(s)?:\/\/(\w+\.)?[\w\-\.]+(\.\w+)+$/.test(fm.url.value)) {
                alert('网址不正确!');
                fm.url.value = '';
                fm.url.focus();
                return false;
            }
        }
        //验证码验证
        if (fm.code.value.length != 4) {
            alert('验证码必须是4位!');
            fm.code.value = '';
            fm.code.focus();
            return false;
        }
        return true;
    }

}







