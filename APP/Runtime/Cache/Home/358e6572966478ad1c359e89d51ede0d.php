<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>首页</title>

   <link rel="stylesheet" type="text/css" href="/KMS/Pub/static/lib/bootstrap/dist/css/bootstrap.min.css" >
   <link rel="stylesheet" type="text/css" href="/KMS/Pub/static/css/base.css" >
   <link rel="stylesheet" type="text/css" href="/KMS/Pub/static/css/fonts/iconfont.css" >


    <script src="/KMS/Pub//static/lib/seajs/dist/sea.js"></script>
    <script src="/KMS/Pub//static/lib/jquery/dist/jquery.min.js"></script>
    <script src="/KMS/Pub//static/lib/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/KMS/Pub//static/lib/anita/klass-seed.js"></script>
    <script src="/KMS/Pub//static/lib/anita/anita.min.js"></script>
    <script>
    if (typeof Klass != 'undefined') {
        Klass.retire();
    }

    anita.config({
        'interpolate': ['[[', ']]']
    });
    </script>
    <script>
        seajs.config({
        	alias:{
        		"jquery.js":"/wechat/Public/static/lib/jquery/dist/jquery.min.js",
        		"bootstrap.js":"/wechat/Public/static/lib/bootstrap/dist/js/bootstrap.min.js",
        		"klass-seed.js":"/wechat/Public/static/lib/anita/klass-seed.js",
        		"anita.js":"/wechat/Public/static/lib/anita/anita.min.js",
        		"common.js":"/wechat/Public/static/js/common/common.js"
        	}
        });
        
        seajs.use(["common.js"],function(){
        	 if (typeof Klass != 'undefined') {
                 Klass.retire();
             }

             anita.config({
                 'interpolate': ['[[', ']]']
             });
        });
    </script>



</head>

<body>

<div class="header"  ai-controller="headerCtrl">  
    <nav class="navbar navbar-inverse head-bar" role="navigation">
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
                <input type="text" class="form-control" placeholder="Search">
                <span class="iconfont icon-search3 icon"></span>>
            </div>
        </form>
        <div class="navbar-right navbar-user-info" >
             <select class="lang-select" >
             <option>1</option>
             <option selected="selected">2</option>
             <option>3</option>
             </select>
              <span>[[user]]</span> 
        </div>
    </div>
	</div>
</nav>
</div>
<div class="nav nav-sidebar">
    <ul class="sidebar-ul">
     <li></li>
    <li><a href="#">首页</a></li>
    <li><a href="#">兴趣</a></li>
    <li><a href="#">文件管理</a></li>
    <li><a href="#">问候</a></li>
    <li><a href="#">设置</a></li>
    </ul>
</div>
<div class="contenter">

   

</div>




  <script>
  
  seajs.use(['/KMS/Public/static/js/home/getUser.js'],function(getUser){
	 var isStored= getUser.isInCookie('kasol');
	 
  });
  
  </script>


</body>
</html>