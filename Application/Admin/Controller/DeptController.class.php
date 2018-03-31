<?php
namespace Admin\Controller;
//use Admin\Model\DeptModel;
use Think\Controller;
use Think\Model;

class DeptController extends CommonController {
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
        $model=M('Dept');
        $data=$model->order("sort asc")->select();
        foreach ($data as $k=>$v){
            if ($v['pid']>0){
                $info=$model->find($v['pid']);
                if ($info){
                    $data[$k]['dName']=$info['name'];
                }
            }else{
                $data[$k]['dName']="顶级部门";
            }
        }
        load("@/tree");
        $data=getTree($data);
        $this->assign("data",$data);
        $this->display();
    }

    public function edit(){
        $model=M("Dept");
        if (I("post.")){
            $result=$model->save(I("post."));
            if ($result===false){
                $this->error("修改失败");
            }else{
                $this->success("修改成功",U("showList"),3);
            }
        }else{
            $id=I('get.id');
            $data=$model->find($id);
            $ids=$model->where("id!=".$id)->select();
            $this->assign('data',$data);
            $this->assign('ids',$ids);
            $this->display();
        }
    }

    public function del(){
        $model=M("Dept");
        //dump($_GET);exit();
        $result=$model->delete(I("get.id"));
        dump($model->getLastSql());
        if ($result){
            $this->redirect("Dept/showList");
        }else{
            $this->redirect("Dept/showList");
        }
    }
}



