<?php
//$str = 'ajsdljl2342ass422ddf3223sadf8989a';
//$pattern = '/\d{4}/';


//$str = 'aj2341s4224dljl2222assddf4444sadf8888a';
//找连续的四个数字，四个数字必须一样
//$pattern = '/(\d)(\d)(\d)\1/'; //加小括号的叫做 子表达式，\1表示第一个子表达式
//$pattern = '/(\d)\1{3}/'; //加小括号的叫做 子表达式，\1表示第一个子表达式


//$str = "aj2341s4252dljl2222assddf4444sadf8888a";
//$pattern = '/(?:\d)(\d)(\d)\1/';


//$str = "aj2341s4252dljl2222assddf4444sadf8888a";
//$pattern = "/(?:\d)(?<a>\d)(\d)/";


echo preg_match($pattern,$str, $arr);
echo '<pre>';
print_r($arr);
?>