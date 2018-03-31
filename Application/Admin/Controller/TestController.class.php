<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Think;

class TestController extends CommonController {
    function test1(){
        session("name","韩梅梅");
        session("name2","李雷");

        dump(session("?name"));
    }
    function test2(){
        cookie("name","韩梅梅",3600);
        cookie(null);
        dump(cookie("name"));
    }
    function test3(){
        gbk2utf8();
    }
    function test4(){
        getInfo();
    }
    function test5(){
        load("@/hello");
        hello();
    }
    function test6(){
        $config=array(
            'fontSize'  =>  25,              // 验证码字体大小(px)
            'useCurve'  =>  true,            // 是否画混淆曲线
            'useNoise'  =>  true,            // 是否添加杂点
            'imageH'    =>  100,               // 验证码图片高度
            'imageW'    =>  200,               // 验证码图片宽度
            'length'    =>  4,               // 验证码位数
            'fontttf'   =>  '1.ttf',
        );
        $code=new \Think\Verify($config);
        //dump($code);
        $code->entry();
    }
    function test7(){
        $config=array(
            'fontSize'  =>  25,              // 验证码字体大小(px)
            'useCurve'  =>  true,            // 是否画混淆曲线
            'useNoise'  =>  true,            // 是否添加杂点
            'imageH'    =>  100,               // 验证码图片高度
            'imageW'    =>  200,               // 验证码图片宽度
            'length'    =>  4,               // 验证码位数
            'fontttf'   =>  'STXINGKA.TTF',
            'useZh'     =>  true,           // 使用中文验证码
        );
        $code=new \Think\Verify($config);
        $code->entry();
    }
    function test8(){
        echo get_client_ip(1);
    }
    function test9(){
        $ipLo=new \Org\Net\IpLocation("qqwry.dat");
        dump( $ipLo->getlocation("223.87.204.17"));
    }
}

