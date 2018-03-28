<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends Controller{
    public function add(){
        if (IS_POST){
            $model=M('User');
            $data=$model->create();
            $data['addtime']=time();
            $result=$model->add($data);
            if ($result){
                $this->success("添加职员成功",U("showList"),3);
            }else{
                $this->error("添加职员失败!");
            }
        }else{
            $data=M("Dept")->field("id,name,pid")->select();
            load("@/tree");
            $data=getTree($data);
            $this->assign("data",$data);
            $this->display();
        }
    }

    public function showList(){
        $model=M("User");
        $count=$model->count();
        $page=new \Think\Page($count,5);
        $page->setConfig('prev',"上一页");
        $page->setConfig('next',"下一页");
        $page->setConfig('first',"首页");
        $page->setConfig('last',"尾页");
        $page->rollPage=4;
        $page->lastSuffix=false;
        $list=$page->show();
        $data=$model->field("t1.*,t2.name as deptname")->alias('t1')->limit($page->firstRow,$page->listRows)->join('left join sp_dept as t2 on t1.dept_id=t2.id')->select();
        $this->assign("data",$data);
        $this->assign("list",$list);
        $this->assign("count",$count);
        $this->display();
    }

    function charts(){
        $model=M("User");
        $data=$model->field("t2.name as deptname,count(*) as count")
              ->table("sp_user as t1,sp_dept as t2")
              ->where("t1.dept_id=t2.id")
              ->group("deptname")
              ->select();
        $dataStr='[';
        foreach ($data as $v){
            $dataStr .= "['".$v['deptname']."',".$v['count'].'],';
        }
        $dataStr=rtrim($dataStr,',');
        $dataStr .=']';
        $this->assign('str',$dataStr);
        $this->display();
    }
}

