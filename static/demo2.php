<?php
//flush  将程序缓存中的内容刷新到浏览器
for($i=1; $i<=5; $i++){
    echo $i;
    echo str_repeat(' ',1024);
    flush();
    sleep(1);
}
?>