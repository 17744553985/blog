<?php
/* Smarty version 3.1.30, created on 2016-11-26 09:32:34
  from "E:\wamp\www\blog\App\Home\View\Index\index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5838e632b3e058_10572367',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd11c63384667f1018e2726624df0d88ea70e0b0b' => 
    array (
      0 => 'E:\\wamp\\www\\blog\\App\\Home\\View\\Index\\index.html',
      1 => 1479716841,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../Public/nav.html' => 1,
  ),
),false)) {
function content_5838e632b3e058_10572367 (Smarty_Internal_Template $_smarty_tpl) {
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
Home/css/index.css" rel="stylesheet">
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
        <div class="banner">
            <ul class="texts">
                <p>The best life is use of willing attitude, a happy-go-lucky life. </p>

                <p>最好的生活是用心甘情愿的态度，过随遇而安的生活。</p>
            </ul>
        </div>
        <div class="bloglist">
            <h2>
                <p><span>最冷</span>文章</p>
            </h2>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'val');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['val']->value) {
?>
            <div class="blogs">
                <h3><a href="?c=Art&a=news&id=<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['val']->value['title'];?>
</a></h3>
                <figure><img src="<?php echo $_smarty_tpl->tpl_vars['val']->value['pic'];?>
" height="130" width="180"></figure>
                <ul>
                    <p>
                        <?php echo $_smarty_tpl->tpl_vars['val']->value['description'];?>

                    </p>
                    <a href="?c=Art&a=news&id=<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
" class="readmore">阅读全文&gt;&gt;</a>
                </ul>
                <p class="autor">
                    <span>作者：<?php echo $_smarty_tpl->tpl_vars['val']->value['author'];?>
</span>
                    <span>分类：【<a href="/"><?php echo $_smarty_tpl->tpl_vars['val']->value['name'];?>
</a>】</span>
                    <span>浏览（<a href="/"><?php echo $_smarty_tpl->tpl_vars['val']->value['hits'];?>
</a>）</span>
                    <span>评论（<a href="/"><?php echo $_smarty_tpl->tpl_vars['val']->value['comment'];?>
</a>）</span>
                </p>

                <div class="dateview"><?php echo $_smarty_tpl->tpl_vars['val']->value['ptime'];?>
</div>
            </div>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        </div>
    </article>
    <aside>
        <div class="avatar"><a href="about.html"><span>关于我</span></a></div>
        <div class="topspaceinfo">
            <h1>执子之手，与子偕老</h1>

            <p>于千万人之中，我遇见了我所遇见的人....</p>
        </div>
        <div class="about_c">
            <p>网名：DanceSmile | 即步非烟</p>

            <p>职业：Web前端设计师、网页设计 </p>

            <p>籍贯：四川省—成都市</p>

            <p>电话：13662012345</p>

            <p>邮箱：dancesmiling@qq.com</p>
        </div>
        <div class="bdsharebuttonbox">
            <a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
            <a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
            <a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a>
            <a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a>
            <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
            <a href="#" class="bds_more" data-cmd="more"></a>
        </div>
        <div class="tj_news">
            <h2>
                <p class="tj_t1">最新文章</p>
            </h2>
            <ul>
                <li><a href="/">犯错了怎么办？</a></li>
                <li><a href="/">两只蜗牛艰难又浪漫的一吻</a></li>
                <li><a href="/">春暖花开-走走停停-发现美</a></li>
                <li><a href="/">琰智国际-Nativ for Life官方网站</a></li>
                <li><a href="/">个人博客模板（2014草根寻梦）</a></li>
                <li><a href="/">简单手工纸玫瑰</a></li>
                <li><a href="/">响应式个人博客模板（蓝色清新）</a></li>
                <li><a href="/">蓝色政府（卫生计划生育局）网站</a></li>
            </ul>
            <h2>
                <p class="tj_t2">推荐文章</p>
            </h2>
            <ul>
                <li><a href="/">犯错了怎么办？</a></li>
                <li><a href="/">两只蜗牛艰难又浪漫的一吻</a></li>
                <li><a href="/">春暖花开-走走停停-发现美</a></li>
                <li><a href="/">琰智国际-Nativ for Life官方网站</a></li>
                <li><a href="/">个人博客模板（2014草根寻梦）</a></li>
                <li><a href="/">简单手工纸玫瑰</a></li>
                <li><a href="/">响应式个人博客模板（蓝色清新）</a></li>
                <li><a href="/">蓝色政府（卫生计划生育局）网站</a></li>
            </ul>
        </div>
        <div class="links">
            <h2>
                <p>友情链接</p>
            </h2>
            <ul>
                <li><a href="/">W3C</a></li>
                <li><a href="/">3DST技术社区</a></li>
            </ul>
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
