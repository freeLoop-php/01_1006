<?php
namespace Admin\Controller;
//命名空间声明
namespace Admin\Controller;
//引入父类控制器
use Think\Controller;
//声明类并且继承父类
class PublicController extends Controller{

    //登录页面展示
    public function login(){

        //展示模版
        $this->display();
    }

    public function captcha(){
        $config=array(
            'fontSize'  =>  17,              // 验证码字体大小(px)
            'useCurve'  =>  true,            // 是否画混淆曲线
            'useNoise'  =>  true,            // 是否添加杂点
            'imageH'    =>  113,               // 验证码图片高度
            'imageW'    =>  110,               // 验证码图片宽度
            'length'    =>  4,               // 验证码位数
            'fontttf'   =>  '1.ttf',
        );
        $code=new \Think\Verify($config);
        $code->entry();
    }

    public function checkLogin(){
        $code=new \Think\Verify();
        $post=I("post.");
        $result=$code->check($post["captcha"]);
        if (!$result){
            $this->error("验证码错误");
            exit();
        }else{
            $model=M('User');
            unset($post['captcha']);
            $data=$model->where($post)->find();
            if (!$data){
                $this->error("用户名或密码错误错误");
                exit();
            }else{
                session('id',$data['id']);
                session('username',$data['username']);
                session('role_id',$data['role_id']);
                $this->success('登录成功',U('Index/index'),3);
            }
        }
    }

    public function loginOut(){
        session(null);
        $this->success("退出成功",U("Public/login"),3);
    }
}




