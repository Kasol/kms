<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/17 0017
 * Time: 20:19
 */
namespace File\Controller;
use Think\Controller;
use Paginator\Controller\PaginatorController;
class FileListController extends Controller {
       public function showList(){
           $tableName='file';
           $p=new PaginatorController();
           $user_name=session('user_name');
           $map['upload_by']=$user_name;
           $res=$p->pagination($tableName,$map);
           $this->assign("info",$res);
           $this->assign("current_side","file");
           $this->display("file/FileList/file_list");
       }
}
