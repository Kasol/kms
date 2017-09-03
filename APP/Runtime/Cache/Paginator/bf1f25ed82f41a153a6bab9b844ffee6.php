<?php if (!defined('THINK_PATH')) exit();?><div>
<?php echo ($pagination); ?>
</div>
<!--<div>
<?php echo ($list); ?>
</div>-->
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "没有数据" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><ul>
       <li>
           <?php echo ($vo['comment_id']); ?>
       </li>
       <li>
           <?php echo ($vo['user']); ?>
       </li>
       <li>
           <?php echo ($vo['public_time']); ?>
       </li>
       <li>
           <?php echo ($vo['title']); ?>
       </li>
   </ul><?php endforeach; endif; else: echo "没有数据" ;endif; ?>