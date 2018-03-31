<?php
namespace Admin\Model;
use Think\Model;
class KnowledgeModel extends Model{
    public  function addData($data,$file){
        if ($file['error']=='0'){
            $cfg=array("rootPath"=>WORK_PATH.UPLOAD_ROOT_PATH);
            $upload=new \Think\Upload($cfg);
            $info=$upload->uploadOne($file);
            if ($info){
                $data['picture']=UPLOAD_ROOT_PATH.$info['savepath'].$info['savename'];

                //制作缩略图
                $img=new \Think\Image();
                $img->open(WORK_PATH.$data['picture']);
                $img->thumb(50.50)->save(WORK_PATH.UPLOAD_ROOT_PATH.$info['savepath'].'thumb_'.$info['savename']);
                $data['thumb']=UPLOAD_ROOT_PATH.$info['savepath'].'thumb_'.$info['savename'];
            }else{
                return false;
            }
        }

        $data['addtime']=time();
        $result=$this->add($data);
        return $result;
    }
}

