<?php
namespace Admin\Controller;
use Think\Controller;
class KnowledgeController extends CommonController {
    public function add(){
        if (IS_POST){
            $post=I("post.");
            $model=D("Knowledge");
            $result=$model->addData($post,$_FILES['thumb']);
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
        $model=D('Knowledge');
        $data=$model->select();
        $this->assign("data",$data);
        $this->display();
    }

    public function download(){
        $id=I("get.id");
        $data=M("Knowledge")->find($id);
        $file = WORK_PATH.$data['thumb'];
        header("Content-type: application/octet-stream");
        header('Content-Disposition: attachment; filename="' . basename($file) . '"');
        header("Content-Length: ". filesize($file));
        readfile($file);
    }
}

