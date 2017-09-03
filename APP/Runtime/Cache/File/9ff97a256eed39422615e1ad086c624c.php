<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>文件中心</title>

   <link rel="stylesheet" type="text/css" href="/KMS/Pub/static/lib/bootstrap/dist/css/bootstrap.min.css" >
   <link rel="stylesheet" type="text/css" href="/KMS/Pub/static/css/base.css" >
   <link rel="stylesheet" type="text/css" href="/KMS/Pub/static/css/fonts/iconfont.css" >


    <script src="/KMS/Pub//static/lib/seajs/dist/sea.js"></script>
    <script src="/KMS/Pub//static/lib/seajs-text/dist/seajs-text.js"></script>
    <script src="/KMS/Pub//static/lib/jquery/dist/jquery.min.js"></script>
    <script src="/KMS/Pub//static/lib/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/KMS/Pub//static/lib/anita/klass-seed.js"></script>
    <script src="/KMS/Pub//static/lib/anita/anita.min.js"></script>
    <script src="/KMS/Pub//static/js/common/common.js"></script>
    <script>
    if (typeof Klass != 'undefined') {
        Klass.retire();
    }

    anita.config({
        'interpolate': ['[[', ']]']
    });

    window.SPM={
           "a":1,"b":107,"c":0,"d":0
    };
    </script>
    <script>
        seajs.config({
        	alias:{
        		"jquery.js":"/KMS/Pub/static/lib/jquery/dist/jquery.min.js",
        		"bootstrap.js":"/KMS/Pub/static/lib/bootstrap/dist/js/bootstrap.min.js",
        		"klass-seed.js":"/KMS/Pub/static/lib/anita/klass-seed.js",
        		"anita.js":"/KMS/Pub/static/lib/anita/anita.min.js",
        		"common.js":"/KMS/Pub/static/js/common/common.js",
        		"header.js":"/KMS/Pub/static/js/common/header.js",
        		"user-query.js":"/KMS/Pub/static/js/common/userQuery.js"
        	}
        });

        seajs.use(["header.js","user-query.js"],function(Header,UserQuery){
           var header=new Header();
           var user_query=new UserQuery();
            header.init();
            header.Module.loop_time();
//            user_query.init();
            user_query.render('searchInput');
        });
    </script>



</head>

<body>

<div class="header"  ai-controller="headerCtrl">
    <nav class="navbar navbar-inverse head-bar navbar-fixed-top" role="navigation">
	<div class="container-fluid">
    <div class="navbar-header">
        <a class="navbar-brand system-title" href="#">KMS</a>
    </div>
    <div>
        <ul class="nav navbar-nav">
          <!--   <li ><a href="#">您好</a></li> -->
           <!--  <li><a href="#">SVN</a></li> -->
            <li class="dropdown" style="display:none">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    Java <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="#">jmeter</a></li>
                    <li><a href="#">EJB</a></li>
                    <li><a href="#">Jasper Report</a></li>
                    <li class="divider"></li>
                    <li><a href="#">分离的链接</a></li>
                    <li class="divider"></li>
                    <li><a href="#">另一个分离的链接</a></li>
                </ul>
            </li>
        </ul>
    </div>
     <div>
        <form class="navbar-form navbar-right" role="search">
            <div class="form-group search-block">
                <input id="searchInput" type="text" class="form-control" placeholder="Search">
                <span class="iconfont icon-search3 icon"></span>>
            </div>
        </form>
        <div class="navbar-right navbar-user-info" >
             <select class="lang-select" >
             <option>1</option>
             <option selected="selected">2</option>
             <option>3</option>
             </select>
              <span>[[user_name]]</span>
        </div>
         <div class="navbar-right navbar-time-info" >
             <span>[[time]]</span>
         </div>
    </div>
	</div>
</nav>
</div>
<div class="my-container" >
    <div class="nav nav-sidebar">
        <ul class="sidebar-ul">
            <!--<li></li>-->
            <li <?php if(($current_side) == "portal"): ?>class="active"<?php endif; ?>  ><a href="/KMS">首页</a></li>
            <li <?php if(($current_side) == "hobby"): ?>class="active"<?php endif; ?>  ><a href="#">兴趣</a></li>
            <li <?php if(($current_side) == "greeting"): ?>class="active"<?php endif; ?>><a href="#">问候</a></li>
            <li <?php if(($current_side) == "person"): ?>class="active"<?php endif; ?>><a href="#">个人</a></li>
            <li <?php if(($current_side) == "file"): ?>class="active"<?php endif; ?>><a href="/KMS/File/FileList/showList">文件</a></li>
        </ul>
    </div>
    <div class="content"  >
        
    <div class="file-wrapper" ai-controller="fileController" >
        <!--<h1 class="file-title">这里是文件中心<?php echo ($file_info); ?></h1>-->
        <div class="file-menu">

        </div>
        <div class="file-operation">
                <div class="up-area">
                   <ul class="file-items">
                       <li><label data-toggle="modal" data-target="#myModal"  class="btn btn-primary">选择</label></li>
                       <li><label class="btn btn-primary" ai-click="refresh_files(1)">刷新</label></li>
                       <li><label class="btn btn-primary">设置</label></li>
                       <li><label class="btn btn-primary">导出</label></li>
                       <li class="edit-zone" ai-visible="show">
                          <!-- <label  class="btn btn-primary">上传</label>
                           <label ai-click="delete_files" class="btn btn-primary">删除</label>
                           <label  class="file-info"></label>
                           <label><progress class="progressbar" value="0" max="100"></progress></label>-->
                       </li>
                   </ul>

                    <form action="" enctype="multipart/form-data" method="post">
                        <input ai-change="selected_callback" type="file" multiple id="fileInput" style="display: none" accept="image/*,video/*,audio/*,application/*">
                        <input type="reset"  id="fileClear" style="display: none">
                    </form>
                </div>
                <div class="down-area row" >
                    <div class="img-wrapper pull-left" ai-repeat="pics" tabindex="0" >
                        <span class="delete-file-btn">X</span>
                        <img class="" ai-src="item.src" >
                        <p>
                             <span>类型：[[item.type]]</span>

                        </p>
                        <p>
                            <span>名称：[[item.name]]</span>
                        </p>
                    </div>
                    <div>
                        <ul class="pagination">
    <li><a href="#">&larr;</a></li>
    <?php if(is_array($info["page_size"])): $i = 0; $__LIST__ = $info["page_size"];if( count($__LIST__)==0 ) : echo "没有数据" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="#<?php echo ($vo); ?>" ai-click="refresh_files(<?php echo ($vo); ?>)"><?php echo ($vo); ?></a></li><?php endforeach; endif; else: echo "没有数据" ;endif; ?>
    <li><a href="#">&rarr;</a></li>
</ul>




                    </div>
                </div>
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">模态框（Modal）标题</h4>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped  ">
                                    <thead>
                                    <tr>
                                        <th>文件类型</th>
                                        <th>文件大小</th>
                                        <th>文件名称</th>
                                        <th>上传进度</th>
                                        <th>操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr ai-repeat="items" class="item-info">
                                        <td>[[item.type]]</td>
                                        <td>[[item.max]]KB</td>
                                        <td>[[item.name]]</td>
                                        <td><progress class="progressbar" ai-max="item.max" ai-value="item.progress"></progress> [[item.percent]]%</td>
                                        <td><span class="glyphicon glyphicon-remove" style="color: rgb(255, 140, 60);"> </span></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <label for="fileInput" class="btn btn-default" >选择本地文件</label>
                            <label for="fileClear" class="btn btn-default" >清除全部</label>
                            <button type="button"  ai-click='upload_files'  class="btn btn-primary">确认上传</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal -->
            </div>
        </div>
    </div>


    </div>
</div>






    <script>
        window.UPLOAD_BASE_URl="/KMS/Uploads/";
          seajs.use(["/KMS/Pub/static/js/file/file_list.js"],function(File){
               var file=new File();
              file.init();
          });
    </script>


</body>
</html>