<?php
return array(
	//'配置项'=>'配置值'
    'URL_ROUTE_RULES'=>array(
        'news/:year/:month/:day' => array('News/archive', 'status=1'),
        'portal/'               => '',
    ),
);