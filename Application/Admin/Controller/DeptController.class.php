<?php
namespace Admin\Controller;
//use Admin\Model\DeptModel;
use Think\Controller;
use Think\Model;

class DeptController extends Controller{
    public function add(){
        if (IS_POST){
            $model=D("Dept");
            $data=$model->create();
            if (!$data){
                $this->error($model->getError());
                exit();
            }else{
                $requst=$model->add();
                if ($requst){
                    $this->success("添加成功",U("showList"));
                }else{

                    $this->error("添加失败");
                }
            }

        }else{
            $model=M('Dept');
            $data=$model->where("pid=0")->select();
            $this->assign("data",$data);
            $this->display();
        }
    }

    public function showList(){
        $this->display();
    }
}



