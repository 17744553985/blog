<?php
ob_start();
echo 100;
//ob_end_clean(); //清空ob缓存，并关闭ob缓存
//ob_end_flush(); //将ob缓存中的内容剪切到程序缓存,并关闭ob缓存
ob_flush(); //将ob缓存中的内容剪切到程序缓存
echo 300;

header('content-type:text/html;charset=utf-8'); //这里出错了，就会输出错误提示（页面上看到的警告），这也是输出
$str = ob_get_contents(); //
//ob_clean(); // 清空ob缓存区的内容
echo 200;

file_put_contents('./a.txt', $str);
?>