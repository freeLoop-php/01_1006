<?php
namespace Admin\Model;
use Think\Model;
class DeptModel extends Model{
    //protected $patchValidate=true;
    //自动验证
    protected $_validate=array(
        array("name","require","部门不能为空"),
        array("name","","部门名称已经存在，请重填",0,"unique"),
        array("sort","is_numeric","排序必须是数字",0,"function"),
    );
    protected $_map=array(
        "abc"=>"name",
        "sst"=>"sort",
        "kk"=>"remark"
    );
}



