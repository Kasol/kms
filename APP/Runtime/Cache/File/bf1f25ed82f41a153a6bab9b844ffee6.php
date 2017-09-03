<?php if (!defined('THINK_PATH')) exit();?><ul class="pagination">
    <li><a href="#">&larr;</a></li>
    <?php if(is_array($list["size"])): $i = 0; $__LIST__ = $list["size"];if( count($__LIST__)==0 ) : echo "没有数据" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="#"><?php echo ($vo); ?></a></li><?php endforeach; endif; else: echo "没有数据" ;endif; ?>
    <li><a href="#">&rarr;</a></li>
</ul>