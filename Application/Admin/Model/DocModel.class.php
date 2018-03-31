<?php
namespace Admin\Model;
use Think\Model;
class DocModel extends Model{
    public function saveData($post,$file){
        if ($file['error']===0){
            $cfg=array(
                'rootPath'=>WORK_PATH.UPLOAD_ROOT_PATH,
            );
            $upload=new \Think\Upload($cfg);
            $info=$upload->uploadOne($file);
            if ($info){
                $post['filename']=$info['name'];
                $post['filepath']=UPLOAD_ROOT_PATH.$info['savepath'].$info['savename'];
                $post['hasfile']=1;
                $post['addtime']=time();
                return $result=$this->add($post);
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function updateData($post,$file){
        if ($file['error']===0){
            $cfg=array(
                'rootPath'=>WORK_PATH.UPLOAD_ROOT_PATH,
            );
            $upload=new \Think\Upload($cfg);
            $info=$upload->uploadOne($file);
            if ($info){
                $post['filename']=$info['name'];
                $post['filepath']=UPLOAD_ROOT_PATH.$info['savepath'].$info['savename'];
                $post['hasfile']=1;
                return $result=$this->save($post);
            }else{
                return false;
            }
        }else{
            $result=$this->save($post);
            if ($result===false){
                return false;
            }else{
                return true;
            }
        }
    }
}




