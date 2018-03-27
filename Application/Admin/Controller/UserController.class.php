<?php
/**
 * Created by PhpStorm.
 * User: freeLoop
 * Date: 2018/3/25
 * Time: 16:53
 */
namespace Admin\Controller;
use Think\Controller;
class UserController extends Controller{
    public function test1(){
        $model=D("Szphp");
        dump($model);exit();
        echo U("Index/user",array("id"=>100,"name"=>50));
    }
    public function test2(){
        $student=new student();
        $student->name="奶茶";
        $student->age=17;
        $str="12314";
        $this->assign("student",$student);
        $this->assign("a",1);
        $this->assign("b",2);
        $this->assign("c",3);
        $this->assign("str",$str);
        $this->assign("time",time());
        $this->display("User/test2");
    }
    public function body(){
        $str="12314";
        $this->assign("week",date('N'));
        $this->assign("str",$str);
        $this->assign("arr",array("id"=>100,"name"=>50,"age"=>20));
        $this->assign("arr2",array(
            array("id"=>100,"name"=>50,"age"=>20),
            array("id"=>200,"name"=>150,"age"=>20),
            array("id"=>300,"name"=>250,"age"=>20)
        ));
        $this->display();
    }
}

