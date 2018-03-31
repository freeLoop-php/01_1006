<?php
namespace Admin\Controller;
use Think\Controller;
class EmailController extends CommonController {
    public  function send(){
        if (IS_POST){
            $model=D("Email");
            $result=$model->addData(I("post."),$_FILES["file"]);
            if ($result){
                $this->success("邮件发送成功",U("showSend"));
            }else{
                $this->error("邮件发送失败");
            }
        }else{
            $users=M("User")->field("id,truename")->select();
            $this->assign("users",$users);
            $this->display();
        }
    }

    public  function showSend(){
        $id=session("id");
        $model=M("Email");
        $data=$model->alias("t1")->field("t1.*,t2.truename")->join("left join sp_user as t2 on t1.to_id=t2.id")->where("t1.from_id=$id")->select();
        $this->assign("data",$data);
        $this->display();
    }

    public  function showMessage(){
        $id=session("id");
        $model=M("Email");
        $data=$model->alias("t1")->field("t1.*,t2.truename")->join("left join sp_user as t2 on t1.to_id=t2.id")->where("t1.to_id=$id")->select();
        $this->assign("data",$data);
        $this->display();
    }

    public function download(){
        $id=I("get.id");
        $data=M("Email")->find($id);
        $file = WORK_PATH.$data['file'];
        header("Content-type: application/octet-stream");
        header('Content-Disposition: attachment; filename="' . basename($file) . '"');
        header("Content-Length: ". filesize($file));
        readfile($file);
    }

    public function getContent(){
        $id=I("get.id");
        $data=M("Email")->where("id=$id and to_id=".session("id"))->find();
        if (isset($data['isread']) and $data['isread']==0){
            M("Email")->save(array("id"=>$id,"isread"=>1));
        }
        echo $data['content'];
    }

    public function getCount(){
        if (IS_AJAX){
            $model=M("Email");
            echo $count=$model->where("isread=0 and to_id=".session("id"))->count();
        }
    }
}






