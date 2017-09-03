/**
 * Created by Administrator on 2017/8/16 0016.
 */
define(function(require,exports,module){
    var isToBottom={
        isToBottom:function(targetBoxId){
            var obj=$('#'+targetBoxId+'');
            var st=$(document).scrollTop();
            var clientHeight=$(window).height()-50;//减去50是由于放置图片的容器位置距离视口顶端还有50px
            var objHeight=$(obj).outerHeight();
            if(clientHeight+st>=objHeight){
                console.log("到底啦");
            }
            /*var st=document.documentElement.scrollTop||document.body.scrollTop;
            var clientH=document.documentElement.clientHeight||document.body.clientHeight;*/
            /* if(obj.offsetHeight-clientH===st){
             alert("到底了");
             }*/
            //return obj.offsetHeight-clientH===st;
        }
    }
    module.exports=isToBottom;
});