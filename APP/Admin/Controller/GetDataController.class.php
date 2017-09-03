<?php
namespace Admin\Controller;
use Think\Controller;
use Org\Net\IpLocation;
class GetDataController extends Controller {
    public function get_user(){
        $user_name=$_GET['name'];
        $user_age=$_GET['age'];
        $user_job=$_GET['job'];
        $data=[];
        array_push($data,$user_name,$user_age,$user_job);
        echo json_encode($data,JSON_UNESCAPED_UNICODE);
    }
    public function getClientIp(){
        $ip = get_client_ip();
        $Ip = new IpLocation();
        $area=$Ip->getlocation();
        echo $ip;
    }
    private function cal_num($num){
           //迭代写法
           /* $sum=1;
           for($i=1;$i<=$num;$i++){
               $sum *= $i;
           }
           return $sum; */
        //递归写法
        if($num<=1)
            return 1;
        return $num * $this->cal_num($num-1);
    }
    
    public function printJC(){
        $num=$_GET['num'];
        echo self::cal_num($num);
    }
}