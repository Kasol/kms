/**
 * Created by Administrator on 2017/8/18 0018.
 */
define(function(require,exports,module){
    var maskLayer=require('../common/maskLayer.js');
    var panel=require('../common/panel.js');
    var FileUpLoad=function(){
         this.Module=null;
    }
    FileUpLoad.prototype={
        init:function(){
              var that=this;
              this.Module=anita.define("fileController",function(scope){
                  scope.pics=[];
                  scope.items=[];
                  scope.currentFiles=[];
                  scope.show=false;
                  scope.selected_callback=that.selected_callback.bind(that);
                  scope.delete_files=that.delete_files.bind(that)();
                  scope.upload_files=that.upload.bind(that);
                  scope.refresh_files=that.refresh_files.bind(that);

              });
            anita.find();
            that.refresh_files();
        },

        selected_callback:function(event){
             var that=this;
             this.Module.show=true;
             var files=event.target.files;//此次选择的文件们的操作句柄
            //console.log(files);
             var num=files.length;//当前操作选中的文件个数
             var flag=that.Module.items.length;//内存中已经存放的文件个数
             var processed=0;//当前选中的文件中，已经处理的文件个数
            //这里想用fileData来接收filelist，结果报错了，filelist不允许更改,用新数组来接受
            //var curFiles=[];
          /* for(var i=0;i<files.length;i++){
               console.log(files[i].name);
           }*/
            Array.prototype.push.apply(that.Module.currentFiles, $('#fileInput')[0].files);
            console.log(that.Module.currentFiles);
            if(num)//如果当前有选中文件
            {
                for(var i=0;i<num;i++){//"fileData":files.item(i),
                    var tmp= {"type":files[i].type,"max":Math.ceil(files[i].size/1000),"name":files[i].name,"progress":0,"percent":0};
                    that.Module.items.push(tmp);
                }
                var reader = new FileReader();
                reader.onprogress= function (event) {//加载时触发
                    var index=flag;
                    var alreadyLoaded=event.loaded;
                    var allSize=that.Module.items[index].max*1000;
                    that.Module.items[index].progress=alreadyLoaded;
                    that.Module.items[index].percent=Math.round((alreadyLoaded / allSize)*100);
                    //          file_info.text(Math.round((event.loaded/progressbar.attr('max'))*100).toString()+"%");
                }
                reader.onload = function(event)//加载成功时触发
                {
                    that.Module.items[flag].percent=100;
                    flag++;
                    processed++;
                    try{
                        reader.readAsText(files[processed]);

                    }catch(error){
                        console.log(flag+'个文件以及加载完毕了');
                    }
                    //console.warn(reader.readyState);
                    //          progressbar.attr('value',progressbar.attr('max'));
                    //        file_info.text('100%');
                    //          file_info.html("文件名是"+file.name+"<br/>文件大小是"+Math.ceil(file.size/1000)+"KB<br/>文件类型是"+file.type);
                }
                reader.readAsText(files[0]);//从第一个文件开始分析


                /*     reader.onloadstart=function(event){//加载开始时触发

                     }
                     reader.onloadend=function(event){//加载结束时触发

                     }
                     reader.onabort= function (event) {//加载打断时触发
                         alert("加载被取消");

                     }
                     reader.onerror= function (event) {//加载错误时触发

                     }*/



              /*  document.getElementsByClassName("cancelBtn")[0].addEventListener("click", function (event) {
                    reader.abort();
                });*/



            }
        },
        upload:function(){
            $('#myModal').modal('hide');
            maskLayer.show();
            var that=this;
            var fd = new FormData(); // 使用某个表单作为初始项
            for(var i=0;i<that.Module.currentFiles.length;i++){
                fd.append("Files[]", that.Module.currentFiles[i]);
            }
            $.ajax({
                url: "/KMS/File/FileUpload/saveFiles",
                type: "POST",
                data: fd,
                processData: false, // 告诉jQuery不要去处理发送的数据
                contentType: false, // 告诉jQuery不要去设置Content-Type请求头
                success:function(response){
                    if(response.info){
                        panel.show();
                       $('#panel .close-btn').on("click",panel.hide);
                        $('.panel-footer').text(response.info);
                        /*    maskLayer.hide();
                        return ;*/
                    }
                    $("#fileClear").click();
                    that.Module.items=[];
                    that.Module.currentFiles=[];
                    maskLayer.hide();
                    that.refresh_files();

                },
                error:function(error){
                    panel.show();
                    $('#panel .close-btn').on("click",panel.hide);
                    $('.panel-footer').text(error);
                    maskLayer.hide();
                }
            });
        },
        delete_files:function(){
        },
        refresh_files:function(pageId,pageNum){
             var that=this;
             var upload_url=window.UPLOAD_BASE_URl;
             var tmp=[];
             var params={'pageId':pageId||1,'pageNum':pageNum||12};
            maskLayer.show();
             $.ajax({
                url:'/KMS/File/FileUpload/queryFiles',
                dataType:'json',
                data:params,
                method:"get",
                success:function(response){
                      for(var i=0;i<response['data'].length;i++){
                              tmp.push({'src':upload_url+response['data'][i]['file_path'],
                                  'name':response['data'][i]['file_name'],
                                  'type':response['data'][i]['file_type']
                              });
                      }
                    that.Module.pics=tmp;
                    maskLayer.hide();
                },
                error:function(error){

                }
            });
         
        },
        next:function(){
            var hash=location.hash;
            var current_num=+hash.substr(1);
        },
        previous: function () {
            
        }

    }
    module.exports=FileUpLoad;
});