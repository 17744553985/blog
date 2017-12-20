<?php
//邮箱验证正则
$pattern = '/^[0-9a-zA-Z_\-\.]{2,255}@[0-9a-zA-Z_\-]{2,255}(\.[a-zA-Z]{2,4}){1,2}$/';
$email = 'asaal@qq.com.cn';
if(preg_match($pattern, $email)){
    //格式正确
    echo 1;
}else{
    //格式不正确
    echo 0;
}

?>