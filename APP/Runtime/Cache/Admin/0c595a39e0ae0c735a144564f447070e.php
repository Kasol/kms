<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo ($title); ?></title>

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
<div class="nav nav-sidebar">
    <ul class="sidebar-ul">
     <!--<li></li>-->
    <li class="active"><a href="#">首页</a></li>
    <li><a href="#">兴趣</a></li>
    <li><a href="#">问候</a></li>
    <li><a href="#">个人</a></li>
    <li><a href="#">文件</a></li>
    </ul>
</div>
<div class="content" id="container">

<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="/new/<?php echo ($vo["id"]); ?>"><?php echo ($vo["title"]); ?></a><br/>
 <?php echo ($vo["content"]); endforeach; endif; else: echo "" ;endif; ?>

</div>






</body>
</html>