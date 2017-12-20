<?php
header('content-type:text/html;charset=utf-8');
//$str = "aj2341s4252dljl2222assddf4444sadf8888a";
//$pattern = '/(?:\d)(\d)(\d)\1/';



//$str = 'helloworld你好朋友abc';
////查找里面有多少个字母
//$pattern = '/([a-z])/';


//$str = 'helloworld你好朋友abc';
////查找里面有多少个汉字
//$pattern = '/[\x{4e00}-\x{9fa5}]/u';


//解决结巴问题
$str = '我我我我....快快..饿饿饿死了';
$pattern = '/([\x{4e00}-\x{9fa5}])\1*\.*/u';

echo preg_match_all($pattern,$str, $arr);
echo '<pre>';
print_r($arr);
echo implode('',$arr[1]);
?>