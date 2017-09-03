/**
 * 
 */
define(function(require,exports,module){
    var time=require("./time.js");
    var Date_Time_Picker=require("./dateTimePicker");
    var Header=function(){
        this.Module=null;
        new Date_Time_Picker($('.date-time-picker'), {
            language:  'zh-CN',
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            forceParse: 0
        });
    }
    Header.prototype={
        init:function(){
             var that=this;
             this.Module=anita.define("headerCtrl",function(scope){
                scope.user_name='kasol';
                scope.time='';
                scope.loop_time=function loop(){
                    scope.time=that.show_time();
                    setTimeout(loop,500);
                }
             });
            anita.find();
        },
        show_time:function(){
            return  time.get_now_time();
        }
    };
    module.exports=Header;
});
