/**
 * Created by Administrator on 2017/8/21 0021.
 */
define(function(require,exports,module){
     var mask_html=require('/KMS/APP/template/mask_layer.html');
     var MaskLayer={
          show:function(){
              $('body').append(mask_html);
          },
          hide:function(){
              $('#maskLayer').remove();
          }
     }
    module.exports=MaskLayer;
});