<?php
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller{
    function _initialize(){
        if(!isset($_SESSION["username"])){

            //$this->error("请登录",U("Public/login"),2);
            $url=U("Public/login");
            echo "<script>top.location.href='$url'</script>";
            exit();
        }

        //获取角色id
        $role_id=session("role_id");
        $rbac_role_auths=C('RBAC_ROLE_AUTHS');
        $currentRoleAuths=$rbac_role_auths[$role_id];
        $controller=strtolower(CONTROLLER_NAME);
        $func=strtolower(ACTION_NAME);
        if ($role_id != 1){
            if (!in_array($controller.'/'.$func,$currentRoleAuths) && !in_array($controller.'/*',$currentRoleAuths)){
                $this->error("您没有权限");exit();
            }
        }
    }

    public function _empty(){
        $this->display("Empty/error");
    }
}







