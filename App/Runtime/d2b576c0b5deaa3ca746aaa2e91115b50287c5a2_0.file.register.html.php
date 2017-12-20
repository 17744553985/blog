<?php
/* Smarty version 3.1.30, created on 2016-11-26 10:15:49
  from "E:\wamp\www\blog\App\Home\View\Login\register.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5838f055888926_17472911',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd2b576c0b5deaa3ca746aaa2e91115b50287c5a2' => 
    array (
      0 => 'E:\\wamp\\www\\blog\\App\\Home\\View\\Login\\register.html',
      1 => 1480121458,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../Public/nav.html' => 1,
  ),
),false)) {
function content_5838f055888926_17472911 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>注册</title>
    <meta name="keywords" content="个人博客模板,博客模板,响应式" />
    <meta name="description" content="如影随形主题的个人博客模板，神秘、俏皮。" />
    <link href="<?php echo PUBLIC_PATH;?>
Home/css/base.css" rel="stylesheet">
    <link href="<?php echo PUBLIC_PATH;?>
Home/css/style.css" rel="stylesheet">
    <link href="<?php echo PUBLIC_PATH;?>
Home/css/media.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
    <!--[if lt IE 9]>
    <?php echo '<script'; ?>
 src="<?php echo PUBLIC_PATH;?>
Home/js/modernizr.js"><?php echo '</script'; ?>
>
    <![endif]-->
    <style>
        #login{
            background: none;
            width:100%;
        }
        table{
            width:600px;
            margin:0 auto;
        }
        td{
            font-family: 微软雅黑;
            font-size: 16px;
            border-bottom: solid 1px #8e8d8d;
            padding:5px 10px;
        }
        input[type=text], input[type=password]{
            background-color: #ffffff;
            border: 1px solid #cccccc;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
            transition: border 0.2s linear 0s, box-shadow 0.2s linear 0s;
            border-radius: 5px;
            height: 23px;
            line-height: 23px;
            padding: 2px 4px;
            width:250px;
        }
        input[type=submit]{
            background-color: #006dcc;
            background-image: linear-gradient(to bottom, #0088cc, #0044cc);
            background-repeat: repeat-x;
            border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
            color: #ffffff;
            text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
            -moz-border-bottom-colors: none;
            -moz-border-left-colors: none;
            -moz-border-right-colors: none;
            -moz-border-top-colors: none;
            background-color: #f5f5f5;
            background-image: linear-gradient(to bottom, #ffffff, #e6e6e6);
            background-repeat: repeat-x;
            border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) #a2a2a2;
            border-image: none;
            border-radius: 4px;
            border-style: solid;
            border-width: 1px;
            box-shadow: 0 1px 0 rgba(255, 255, 255, 0.2) inset, 0 1px 2px rgba(0, 0, 0, 0.05);
            color: #333333;
            cursor: pointer;
            display: inline-block;
            font-size: 14px;
            line-height: 20px;
            margin-bottom: 0;
            padding: 4px 12px;
            text-align: center;
            text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75);
            vertical-align: middle;
        }
        #yzm{
            width:50px;
            float:left;
            margin-right:10px;
        }
    </style>
</head>
<body>
<div class="ibody">
    <header>
        <h1>如影随形</h1>
        <h2>影子是一个会撒谎的精灵，它在虚空中流浪和等待被发现之间;在存在与不存在之间....</h2>
        <div class="logo"><a href="/"></a></div>
        <?php $_smarty_tpl->_subTemplateRender("file:../Public/nav.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    </header>
    <article id="login">
        <h2 class="c_titile">用户注册</h2>

        <form action="?c=Login&a=registerHandle" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td align="right" width="180">用户名</td>
                    <td><input type="text" name="username"></td>
                </tr>
                <tr>
                    <td align="right">密码</td>
                    <td><input type="password" name="pwd"></td>
                </tr>
                <tr>
                    <td align="right">重复密码</td>
                    <td><input type="password" name="repwd"></td>
                </tr>
                <tr>
                    <td align="right">电话</td>
                    <td><input type="text" name="tel"></td>
                </tr>
                <tr>
                    <td align="right">邮箱</td>
                    <td><input type="text" name="email"></td>
                </tr>
                <tr>
                    <td align="right">头像</td>
                    <td><input type="file" name="pic"></td>
                </tr>
                <tr>
                    <td align="right">验证码</td>
                    <td>
                        <input type="text" name="yzm" id="yzm">
                        <img src="?c=Public&a=verify" width="80" onclick="this.src='?c=Public&a=verify&t='+Math.random()">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" value="注册">
                    </td>
                </tr>
            </table>
        </form>
    </article>

    <?php echo '<script'; ?>
 src="<?php echo PUBLIC_PATH;?>
Home/js/silder.js"><?php echo '</script'; ?>
>

    <!-- 清除浮动 -->
</div>
</body>
</html>
<?php }
}