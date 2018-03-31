<?php
namespace Admin\Model;
use Think\Model;
class EmailModel extends Model{
    public  function addData($data,$file){
        if ($file['error']=='0'){
            $cfg=array(
                'rootPath'=>WORK_PATH.UPLOAD_ROOT_PATH,
            );
            $upload=new \Think\Upload($cfg);
            $info=$upload->uploadOne($file);
            if ($info){
                $data['filename']=$info['name'];
                $data['file']=UPLOAD_ROOT_PATH.$info['savepath'].$info['savename'];
                $data['hasfile']=1;
            }
        }

        $data['addtime']=time();
        $data['from_id']=session("id");
        $result=$this->add($data);
        return $result;
    }
}

