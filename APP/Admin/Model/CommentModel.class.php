<?php
namespace Admin\Model;
use Think\Model;
class CommentModel extends Model{
    protected $tablePrefix='';
    
    public function testMfuc(){
        echo '这是自己的业务逻辑';
    }
    
    public function getFieldArr(){
        $resArr=$this->getField("user");
        array_push($resArr, 'kasol');
        return $resArr;
    }
}