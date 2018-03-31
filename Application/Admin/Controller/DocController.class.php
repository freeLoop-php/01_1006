<?php
namespace Admin\Controller;
use Think\Controller;
class DocController extends CommonController {
    public function add(){
        $post=I("post.");
        if ($post){
            //dump($post);exit();
            $model=D('Doc');
            $result=$model->saveData($post,$_FILES['file']);
            if ($result){
                $this->success("添加成功",U("showList"));
            }else{
                $this->error("添加失败");
            }
        }else{
            $this->display();
        }
    }

    public function showList(){
        $model=M('Doc');
        $data=$model->select();
        //dump($data);exit();
        $this->assign("data",$data);
        $this->display();
    }

    public function download(){
        $id=I("get.id");
        $data=M("Doc")->find($id);
        $file = WORK_PATH.$data['filepath'];
        header("Content-type: application/octet-stream");
        header('Content-Disposition: attachment; filename="' . basename($file) . '"');
        header("Content-Length: ". filesize($file));
        readfile($file);
    }

    public function layerContent(){
        $id=I("get.id");
        $data=M("Doc")->find($id);
        $data=htmlspecialchars_decode($data['content']);
        echo $data;
    }

    public function edit(){
        if (IS_POST){
            $model=D('Doc');
            $post=I("post.");
            $result=$model->updateData($post,$_FILES['file']);
            if ($result){
                $this->success("保存成功",U('showList'));
            }else{
                $this->error("修改失败");
            }
        }else{
            $model=M('Doc');
            $data=$model->find(I("get.id"));
            $this->assign("data",$data);
            $this->display();
        }
    }
}



