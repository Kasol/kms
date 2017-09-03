<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/19 0019
 * Time: 19:00
 */
namespace File\Controller;
use Think\Controller;
use Think\Upload ;
use Paginator\Controller\PaginatorController;
class FileUploadController extends Controller
{
    public function saveFiles()
    {
        $FILE=M('file');
        $user_name=session('user_name');
        $res = [];
        $config = C('FILE_UPLOAD_CONFIG');
        $fileUpload = new Upload($config);
        $info = $fileUpload->upload();
        if (!$info) {// 上传错误提示错误信息
            $this->error($fileUpload->getError());
        } else {// 上传成功 获取上传文件信息
            foreach ($info as $file) {
                $item = [];
                $item['file_path'] = $file['savepath'] . $file['savename'];
                $item['file_name'] = $file['name'];
                $item['file_type'] = $file['type'];
                $item['upload_by'] = $user_name;
                array_push($res, $item);
                $FILE->add($item,$options=array(),$replace=true);
            }
        }

        $this->ajaxreturn($res, 'json');
    }

    public function queryFiles()
    {
        $tableName='file';
        $p=new PaginatorController();
        $user_name=session('user_name');
        $map['upload_by']=$user_name;
        $res=$p->pagination($tableName,$map);
        $this->ajaxReturn($res,'json');

    }
}