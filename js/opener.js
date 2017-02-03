/**
 * Created by sunshunli on 2/3/17.
 */
window.onload = function () {
    var  img = document.getElementsByTagName('img');
    for (i=0; i<img.length; i++) {
        img[i].onclick = function () {
            _opener(this.alt);
        };
    }
};

//将选中弹出框中的图片地址赋值给父页面的img元素
function _opener(src) {
    //获取父窗口img元素
    var faceimg = opener.document.getElementById('faceimg');
    faceimg.src = src;
    opener.document.getElementById('face').value = src;
}
