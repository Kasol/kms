<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/22 0022
 * Time: 15:24
 */
namespace Admin\Controller;
use Think\Controller;
class  CheckController extends Controller{
        private static $expireTime = 1800;

        public static function isOverTime()
        {
           if (session('expire') < time()){
            return true; //true表示超时,实际上应该重定向到登录页面
           }else{
               self::setStamp();
           }
        }
        public static function isLogined()
        {
            return !empty(session('user_id'));//true表示已经登录
        }
     public static function setStamp (){
         session('expire',time()+self::$expireTime);
         return false;
     }
}