/**
 * Created by Administrator on 2017/8/15 0015.
 */
define(function(require,exports,module){
    var Time={
        get_now_time:function(){
            var date=new Date();
            return date.toLocaleString();
        },
        get_which_day:function(){
            var date=new Date();
            var num=date.getDay();
            var which_day="星期";
            switch (num){
                case 0:
                which_day+="日";
                break;
                case 1:
                    which_day+="一";
                    break;
                case 2:
                    which_day+="二";
                    break;
                case 3:
                    which_day+="三";
                    break;
                case 4:
                    which_day+="四";
                    break;
                case 5:
                    which_day+="五";
                    break;
                case 6:
                    which_day+="六";
                    break;
            }
            return which_day;
        }
    }
    module.exports=Time;
})