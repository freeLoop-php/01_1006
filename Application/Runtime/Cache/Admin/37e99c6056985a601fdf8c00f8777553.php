<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>myDemo</title>
</head>
<body>
<p/><?php echo ($_SERVER['PATH']); ?></p>
<p/><?php echo ($_GET['id']); ?></p>
<p/><?php echo ($_REQUEST['pid']); ?></p>
<p/><?php echo (cookie('PHPSESSID')); ?></p>
<p/><?php echo (session('id')); ?></p>
<p/><?php echo (C("DEFAULT_MODULE")); ?></p>
<p><?php echo (date("Y-m-d",$time)); ?></p>
<p><?php echo ((isset($str) && ($str !== ""))?($str):"这个人很烂，什么都没有留下"); ?></p>
<p><?php echo ($a/$b); ?></p>
</body>
</html>