/**
 created by Kasol at 2017/8/15
 **/
define(function(require,exports,module){
    var WaterFall=function(){
        this.Module=null;
    }
    var  _basePath=window.IMG_PATH;
    WaterFall.prototype={
        init:function(){
            var that=this;
            this.Module=anita.define("waterController",function(scope){
                scope.items=[
                    {"src":_basePath+"0.jpg"},
                    {"src":_basePath+"1.jpg"},
                    {"src":_basePath+"2.jpg"},
                    {"src":_basePath+"3.jpg"},
                    {"src":_basePath+"4.jpg"},
                    {"src":_basePath+"5.jpg"},
                    {"src":_basePath+"6.jpg"},
                    {"src":_basePath+"7.jpg"},
                    {"src":_basePath+"8.jpg"},
                    {"src":_basePath+"9.jpg"},
                    {"src":_basePath+"10.jpg"},
                    {"src":_basePath+"11.jpg"},
                    {"src":_basePath+"12.jpg"},
                    {"src":_basePath+"13.jpg"},
                    {"src":_basePath+"14.jpg"},
                    {"src":_basePath+"15.jpg"},
                    {"src":_basePath+"0.jpg"},
                    {"src":_basePath+"1.jpg"},
                    {"src":_basePath+"2.jpg"},
                    {"src":_basePath+"3.jpg"},
                    {"src":_basePath+"4.jpg"},
                    {"src":_basePath+"5.jpg"},
                    {"src":_basePath+"6.jpg"},
                    {"src":_basePath+"7.jpg"},
                    {"src":_basePath+"8.jpg"},
                    {"src":_basePath+"9.jpg"},
                    {"src":_basePath+"10.jpg"},
                    {"src":_basePath+"11.jpg"},
                    {"src":_basePath+"12.jpg"},
                    {"src":_basePath+"13.jpg"},
                    {"src":_basePath+"14.jpg"},
                    {"src":_basePath+"15.jpg"}
                ];

            });
            anita.find();
        },
        sort:function(targetBoxId,itemClassName){
            var container=$("#"+targetBoxId+"");
            var boxArr= $("#"+targetBoxId+" ."+itemClassName+"");
            var singleW=$(boxArr[0]).outerWidth();
            var containerW=container.outerWidth();
            var cols=Math.floor(containerW/singleW);
            var dataArr=[];
            for(var i=0;i<boxArr.length;i++){
                //console.log($(boxArr[i]).outerHeight());
                if(i<cols){
                    dataArr.push($(boxArr[i]).outerHeight());
                    $(boxArr[i]).css('position','absolute');
                    $(boxArr[i]).css('top',0);
                    $(boxArr[i]).css('left',i*singleW);
                }else{
                    var minNum= Math.min.apply(null,dataArr);
                    var index=dataArr.indexOf(minNum);
                    $(boxArr[i]).css('position','absolute');
                    $(boxArr[i]).css('top',minNum);
                    $(boxArr[i]).css('left',index*singleW);
                    dataArr[index]+=$(boxArr[i]).outerHeight();
                }

            }
            container.css("height",Math.max.apply(null,dataArr));
        }


    };
    module.exports=WaterFall;
});
