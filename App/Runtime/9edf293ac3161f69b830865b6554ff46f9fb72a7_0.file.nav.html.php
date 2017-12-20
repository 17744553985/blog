<?php
/* Smarty version 3.1.30, created on 2016-11-26 09:31:09
  from "E:\wamp\www\blog\App\Home\View\Public\nav.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5838e5dddc8513_89265596',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9edf293ac3161f69b830865b6554ff46f9fb72a7' => 
    array (
      0 => 'E:\\wamp\\www\\blog\\App\\Home\\View\\Public\\nav.html',
      1 => 1480123696,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5838e5dddc8513_89265596 (Smarty_Internal_Template $_smarty_tpl) {
?>
<style>
    #login{
        float:right;
    }
    #login span{
        color: #fff;
        display: inline-block;
        font-family: "Microsoft Yahei",Arial,Helvetica,sans-serif;
        padding: 0 20px;
        transition: all 1s ease 0s;
        height:30px;
        margin-top:20px;
        line-height:30px;
        font-size:14px;
        background-color: #df8505;
        cursor: pointer;
    }
</style>

<nav id="topnav">
    <a href="index.php">首页</a>
    <a href="about.html">关于我</a>
    <a href="?c=Art&a=newslist&id=2">慢生活</a>
    <a href="?c=Art&a=newslist&id=3">学习笔记</a>
    <a href="new.html">相册</a>
    <div id="login">
        <?php if (isset($_SESSION['userinfo'])) {?>
            <span id="yhm"><?php echo $_SESSION['userinfo']['username'];?>
</span>
            <span id="tc" onclick="location.href='index.php?c=Login&a=logout'">退出</span>
        <?php } else { ?>
            <span id="ll">注册</span>
            <span id="rr">登录</span>
        <?php }?>

    </div>
</nav>
<?php echo '<script'; ?>
>
    var ll = document.getElementById('ll');
    ll.onclick=function(){
        location.href='index.php?c=Login&a=register';
    }

    var rr = document.getElementById('rr');
    rr.onclick=function(){
        location.href='index.php?c=Login&a=login';
    }


<?php echo '</script'; ?>
><?php }
}
