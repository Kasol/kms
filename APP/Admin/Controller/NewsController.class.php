<?php
namespace Admin\Controller;
use Think\Controller;
use Admin\CommentModel;
header("Access-Control-Allow-Origin:*");
class NewsController extends Controller{
    public function _empty(){
        $this->show("not found ,please check the url");
    }
    
 public function _before_read(){
 }
    public function read($id){
        //这种url参数绑定到函数的参数貌似只对相应的方法有效，对其前置和后置 貌似无效
//         echo $id;
        $user_id=I('get.id','','htmlspecialchars');
        $user_name=I('get.name','','htmlspecialchars');
        
        $path=I('path.','');
        $New = D('comment');
        $res=$New->where("note_info_id=$user_id")->order('public_time')->limit(10)->select();
        if(isset($user_id)) {
            // 根据id查询结果
            $data = $New->find($user_id);
        }else if(isset($user_name)){
            // 根据name查询结果
            $data = $New->getByName($user_name);
        }
        $this->data = $data;
        if(!empty($data)){
//             $this->redirect('GetData/printJC', array('num' => $id), 5, '页面跳转中...');
         $this->ajaxReturn($res,'json',JSON_UNESCAPED_UNICODE);
           /*  $this->assign('comment_info',$res);
            $this->display('admin/News/read');*/

        }else{
            $this->error("查询失败","../view/NotFound.html",15);
        }
        
//         $this->display();
//         $this->ajaxReturn($this->data,"jsonp");
    }
    function _after_read(){
    }
    public function archive(){
        $New = M('New');
        $year   =   $_GET['year'];
        $month  =   $_GET['month'];
        $begin_time = strtotime($year . $month . "01");
        $end_time = strtotime("+1 month", $begin_time);
        $map['create_time'] =  array(array('gt',$begin_time),array('lt',$end_time));
        $map['status']  =   1;
        $list = $New->where($map)->select();
        $this->list =   $list;
        $this->display();
    }
}