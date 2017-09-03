<?php
namespace Admin\Model;
use Think\Model;

class UserModel extends Model{
    //即对应数据库中的comment表，因为 加了空前缀,否则可以定义前缀，
    protected $tablePrefix =''; 
}