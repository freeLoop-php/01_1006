<?php
namespace Admin\Controller;
use Think\Controller;
class DocController extends Controller{
    public function add(){
        $post=I("post.");
        if ($post){
            $model=M('Doc');
            $post['addtime']=time();
            $result=$model->add($post);
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
        $this->assign("data",$data);
        $this->display();
    }
}

