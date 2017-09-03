/**
 * Created by Administrator on 2017/8/21 0021.
 */
define(function(require,exports,module){
    var panel=require('/KMS/APP/template/panel.html');
    var Panel={
        show:function(){
            $('body').append(panel).delay(100).show(200);
        },
        hide:function(){
            $('#panel').hide(200).remove();
        }
    }
    module.exports=Panel;
});