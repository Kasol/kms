/**
 * Created by kasol on 2017/8/17 0017.
 */
define(function(require,exports,module){
    //var Http=require("./ajax.js");
    //var http=new Http();
    var UserQuery=function(){
        this.Module=null;
    }
    UserQuery.prototype={
        init:function(){
            var that=this;
            this.Module=anita.define("UserQuery",function(scope){
                scope.show=false;
                scope.x=0;
                scope.y=0;
                scope.user_list=[
                    {"emailAddr":"123","nickNameCn":"kasol","depDesc":"zzm"},
                    {"emailAddr":"123","nickNameCn":"kasol","depDesc":"zzm"},
                    {"emailAddr":"123","nickNameCn":"kasol","depDesc":"zzm"},
                    {"emailAddr":"123","nickNameCn":"kasol","depDesc":"zzm"},
                    {"emailAddr":"123","nickNameCn":"kasol","depDesc":"zzm"},
                    {"emailAddr":"123","nickNameCn":"kasol","depDesc":"zzm"},
                    {"emailAddr":"123","nickNameCn":"kasol","depDesc":"zzm"},
                    {"emailAddr":"123","nickNameCn":"kasol","depDesc":"zzm"},
                    {"emailAddr":"123","nickNameCn":"kasol","depDesc":"zzm"},
                    {"emailAddr":"123","nickNameCn":"kasol","depDesc":"zzm"},
                    {"emailAddr":"123","nickNameCn":"kasol","depDesc":"zzm"},
                    {"emailAddr":"123","nickNameCn":"kasol","depDesc":"zzm"},
                    {"emailAddr":"123","nickNameCn":"kasol","depDesc":"zzm"},
                    {"emailAddr":"123","nickNameCn":"kasol","depDesc":"zzm"},
                    {"emailAddr":"123","nickNameCn":"kasol","depDesc":"zzm"},
                    {"emailAddr":"123","nickNameCn":"kasol","depDesc":"zzm"},
                    {"emailAddr":"123","nickNameCn":"kasol","depDesc":"zzm"},
                    {"emailAddr":"123","nickNameCn":"kasol","depDesc":"zzm"}
                ];
                scope.add_user=that.add_user.bind(that);
            });
            anita.find();
        },
        query:function(keyword){
            var that=this;
            $.get("http://localhost:8081/wechat/Admin/News/read?id="+keyword,function(response,status){
                console.log(status);
                if(!Array.isArray(response)){
                    throw ("not a array");
                }
              /*  if(response.length===0){
                    that.Module.user_list=[{"comment_info":"没有相应的结果"}];
                    that.Module.show=true;
                    return ;
                }*/
                that.Module.user_list=response.length>0 ? response : [{"comment_info":"没有相应的结果"}];
                that.Module.show=true;

            });
        },
        add_user:function(ev){
            //console.log(ev.target);
            var node=ev.target;
            console.log($(node).parent().text());
            $("#searchInput").val($(node).parent().text().replace(/\s/g,"").trim());
            this.Module.show=false;

        },
        render:function(searchId){
            var that=this;
            var tpl=require("/KMS/App/template/user_query.html");
            $('#'+searchId+'').on("input",function(){
                that.query($(this).val());
            }).parent().append(tpl);
            that.init();
            //setTimeout(that.init,1000);
            $(document).on("click",function(ev){
                var target=ev.target;
                //console.log($(".user-query").has(target));
                if(!$(".user-query")[0].contains(target)){
                    that.Module.show=false;
                }
            })
        }
    }
    module.exports=UserQuery;

});