<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/23 0023
 * Time: 11:25
 */
namespace Paginator\Controller;
use Think\Controller;
use \Think\Page;
class PaginatorController extends Controller{
     public function pagination($tableName,$map){//实例化的table表，筛选条件
         $defaultPageNum=C('pageNum');
         $table=M($tableName);
         $count=$table->where($map)->count();
         $pageId=I('get.pageId',1);//要获得第几页
         $pageNum=I('get.pageNum',$defaultPageNum);//一页显示几条数据,如果没有则系统默认12条
         $list=$table->where($map)->limit(($pageId-1)*$pageNum.','.$pageNum)->select();
         $res['data']=$list;
         $res['data_size']=count($list);
         $res['page_size']=[];
         $kasol=ceil($count/$pageNum);//实际上可以展示的页数
         if($kasol<=5){
             for($i=1;$i<=$kasol;$i++){
                 array_push($res['page_size'],$i);
             }
         }else{
             for($i=1;$i<=$kasol;$i++){
                 array_push($res['page_size'],$i);
             }
         }


//         $this->assign('list',$list);
//         $this->display('paginator/pagination/pagination');
         //这里只是返回list，其中包含了想要数量的数据，已经数据总长度和分页总长度，
         //具体如何使用要根据逻辑来
         return $res;
     }
}