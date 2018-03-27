<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>myDemo</title>
</head>
<body>

<h1><?php echo ($str); ?></h1>

<h1><?php echo ($str); ?></h1>
<?php if(is_array($arr2)): $k = 0; $__LIST__ = $arr2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($k % 2 );++$k;?><p><?php echo ($value["id"]); ?>==<?php echo ($k); ?>列</p><?php endforeach; endif; else: echo "" ;endif; ?>
<hr/>
<?php if(is_array($arr2)): foreach($arr2 as $k=>$value): ?><foreach>
        <p><?php echo ($value["id"]); ?>==<?php echo ($k); ?>列</p><?php endforeach; endif; ?>
</foreach>
<?php if($week==1): ?><p>今天星期一</p>
    <?php elseif($week==2): ?>
    <p>今天星期二</p>
    <?php elseif($week==2): ?>
    <p>今天星期3</p>
    <?php elseif($week==2): ?>
    <p>今天星期4</p>
    <?php elseif($week==2): ?>
    <p>今天星期5</p>
    <?php elseif($week==2): ?>
    <p>今天星期6</p>
    <?php else: ?>
    今天是星期天<?php endif; ?>


<h1>版权信息</h1>

</body>
</html>