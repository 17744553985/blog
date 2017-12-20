<?php
/* Smarty version 3.1.30, created on 2016-11-26 10:29:58
  from "E:\wamp\www\blog\App\Home\View\Art\newslist.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5838f3a69accd3_84597966',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '85ae131fbcb6bede8cac6b16d646034e21f4553d' => 
    array (
      0 => 'E:\\wamp\\www\\blog\\App\\Home\\View\\Art\\newslist.html',
      1 => 1479716247,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../Public/nav.html' => 1,
  ),
),false)) {
function content_5838f3a69accd3_84597966 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>黑色Html5响应式个人博客模板——主题《如影随形》</title>
    <meta name="keywords" content="个人博客模板,博客模板,响应式"/>
    <meta name="description" content="如影随形主题的个人博客模板，神秘、俏皮。"/>
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
    <article>
        <h2 class="about_h">您现在的位置是：<a href="/">首页</a>><a href="1/">慢生活</a></h2>

        <div class="bloglist">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value['list'], 'val');
$_smarty_tpl->tpl_vars['val']->iteration = 0;
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->iteration++;
$__foreach_val_0_saved = $_smarty_tpl->tpl_vars['val'];
?>
            <div class="newblog">
                <ul>
                    <h3><a href="?c=Art&a=news&id=<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['val']->value['title'];?>
</a></h3>

                    <div class="autor">
                        <span>作者：<?php echo $_smarty_tpl->tpl_vars['val']->value['author'];?>
</span>
                        <span>分类：[<a href="/"><?php echo $_smarty_tpl->tpl_vars['val']->value['name'];?>
</a>]</span>
                        <span>浏览（<a href="/"><?php echo $_smarty_tpl->tpl_vars['val']->value['hits'];?>
</a>）</span>
                        <span>评论（<a href="/"><?php echo $_smarty_tpl->tpl_vars['val']->value['comment'];?>
</a>）</span>
                    </div>
                    <p>
                        <?php echo $_smarty_tpl->tpl_vars['val']->value['description'];?>

                        <a href="?c=Art&a=news&id=<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
" class="readmore">全文</a>
                    </p>
                </ul>
                <?php if ($_smarty_tpl->tpl_vars['val']->value['pic']) {?>
                <figure><img src="<?php echo $_smarty_tpl->tpl_vars['val']->value['pic'];?>
" height="115" width="175"></figure>
                <?php }?>
                <div class="dateview"><?php echo $_smarty_tpl->tpl_vars['val']->value['ptime'];?>
</div>
            </div>
            <?php
$_smarty_tpl->tpl_vars['val'] = $__foreach_val_0_saved;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


        </div>
        <div class="page">
            <?php echo $_smarty_tpl->tpl_vars['data']->value['showPage'];?>

            <!--<a title="Total record"><b>113</b></a>-->
            <!--<b>1</b>-->
            <!--<a href="/">2</a>-->
            <!--<a href="/">3</a>-->
            <!--<a href="/">4</a>-->
            <!--<a href="/">5</a>-->
            <!--<a href="/">&gt;</a><a href="/">&gt;&gt;</a>-->
        </div>
    </article>
    <aside>
        <div class="rnav">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['smallCate']->value, 'val');
$_smarty_tpl->tpl_vars['val']->iteration = 0;
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->iteration++;
$__foreach_val_1_saved = $_smarty_tpl->tpl_vars['val'];
?>
            <li class="rnav<?php echo $_smarty_tpl->tpl_vars['val']->iteration;?>
"><a href="?c=Art&a=newslist2&id=<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['val']->value['name'];?>
</a></li>
            <?php
$_smarty_tpl->tpl_vars['val'] = $__foreach_val_1_saved;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            <!--<li class="rnav1 "><a href="/">日记</a></li>-->
            <!--<li class="rnav2 "><a href="/">欣赏</a></li>-->
            <!--<li class="rnav3 "><a href="/">程序人生</a></li>-->
            <!--<li class="rnav4 "><a href="/">经典语录</a></li>-->
        </div>
        <div class="ph_news">
            <h2>
                <p>点击排行</p>
            </h2>
            <ul class="ph_n">
                <li><span class="num1">1</span><a href="/">有一种思念，是淡淡的幸福,一个心情一行文字</a></li>
                <li><span class="num2">2</span><a href="/">励志人生-要做一个潇洒的女人</a></li>
                <li><span class="num3">3</span><a href="/">女孩都有浪漫的小情怀——浪漫的求婚词</a></li>
                <li><span>4</span><a href="/">Green绿色小清新的夏天-个人博客模板</a></li>
                <li><span>5</span><a href="/">女生清新个人博客网站模板</a></li>
                <li><span>6</span><a href="/">Wedding-婚礼主题、情人节网站模板</a></li>
                <li><span>7</span><a href="/">Column 三栏布局 个人网站模板</a></li>
                <li><span>8</span><a href="/">时间煮雨-个人网站模板</a></li>
                <li><span>9</span><a href="/">花气袭人是酒香—个人网站模板</a></li>
            </ul>
            <h2>
                <p>栏目推荐</p>
            </h2>
            <ul>
                <li><a href="/">有一种思念，是淡淡的幸福,一个心情一行文字</a></li>
                <li><a href="/">励志人生-要做一个潇洒的女人</a></li>
                <li><a href="/">女孩都有浪漫的小情怀——浪漫的求婚词</a></li>
                <li><a href="/">Green绿色小清新的夏天-个人博客模板</a></li>
                <li><a href="/">女生清新个人博客网站模板</a></li>
                <li><a href="/">Wedding-婚礼主题、情人节网站模板</a></li>
                <li><a href="/">Column 三栏布局 个人网站模板</a></li>
                <li><a href="/">时间煮雨-个人网站模板</a></li>
                <li><a href="/">花气袭人是酒香—个人网站模板</a></li>
            </ul>
            <h2>
                <p>最新评论</p>
            </h2>
            <ul class="pl_n">
                <dl>
                    <dt><img src="<?php echo PUBLIC_PATH;?>
Home/images/s8.jpg"></dt>
                    <dt></dt>
                    <dd>DanceSmile
                        <time>49分钟前</time>
                    </dd>
                    <dd><a href="/">文章非常详细，我很喜欢.前端的工程师很少，我记得几年前yahoo花高薪招聘前端也招不到</a></dd>
                </dl>
                <dl>
                    <dt><img src="<?php echo PUBLIC_PATH;?>
Home/images/s7.jpg"></dt>
                    <dt></dt>
                    <dd>yisa
                        <time>2小时前</time>
                    </dd>
                    <dd><a href="/">我手机里面也有这样一个号码存在</a></dd>
                </dl>
                <dl>
                    <dt><img src="<?php echo PUBLIC_PATH;?>
Home/images/s6.jpg"></dt>
                    <dt></dt>
                    <dd>小林博客
                        <time>8月7日</time>
                    </dd>
                    <dd><a href="/">博客色彩丰富，很是好看</a></dd>
                </dl>
                <dl>
                    <dt><img src="<?php echo PUBLIC_PATH;?>
Home/images/003.jpg"></dt>
                    <dt></dt>
                    <dd>DanceSmile
                        <time>49分钟前</time>
                    </dd>
                    <dd><a href="/">文章非常详细，我很喜欢.前端的工程师很少，我记得几年前yahoo花高薪招聘前端也招不到</a></dd>
                </dl>
                <dl>
                    <dt><img src="<?php echo PUBLIC_PATH;?>
Home/images/002.jpg"></dt>
                    <dt></dt>
                    <dd>yisa
                        <time>2小时前</time>
                    </dd>
                    <dd><a href="/">我手机里面也有这样一个号码存在</a></dd>
                </dl>
            </ul>
            <h2>
                <p>最近访客</p>
                <ul>
                    <img src="<?php echo PUBLIC_PATH;?>
Home/images/vis.jpg"><!-- 直接使用“多说”插件的调用代码 -->
                </ul>
            </h2>
        </div>
        <div class="copyright">
            <ul>
                <p> Design by <a href="/">DanceSmile</a></p>

                <p>蜀ICP备11002373号-1</p>
                </p>
            </ul>
        </div>
    </aside>
    <?php echo '<script'; ?>
 src="<?php echo PUBLIC_PATH;?>
Home/js/silder.js"><?php echo '</script'; ?>
>
    <div class="clear"></div>
    <!-- 清除浮动 -->
</div>
</body>
</html>
<?php }
}
