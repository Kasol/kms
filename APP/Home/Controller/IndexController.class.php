<?php
namespace Home\Controller;
use Think\Controller;
use Lang\Controller\GetLangController;
use Admin\Controller\GetDataController;
use Admin\Controller\CheckController;
session_start();
class IndexController extends Controller {

    public function _before_index(){
        CheckController::setStamp();
    }
    public function index(){
    //    $this->redirect("/home/index/index")
        if(!session('?user_id')){//假如是第一次访问
            $sessionId=session_id();
            session('user_name','kasol');  //用户名放在session中，后需要改到放置登录服务中
            session('user_id',$sessionId);
            cookie('user_id',$sessionId);
        }
    $getLang=new GetLangController();
    $this->assign("currentLang",$getLang->getCurrentLang());
    $this->assign("current_side","portal");
    $this->display("home/Index/index");
    }
}