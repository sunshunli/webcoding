/**
 * Created by sunshunli on 2/3/17.
 */
window.onload = function() {
    var facing = document.getElementById('facing');
    facing.onclick = function() {
      window.open('face.php', 'face', 'width=400,height=400,top=0,left=0,scrollbars=1');
    };
}