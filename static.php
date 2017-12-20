<?php
//静态变量的例子
//function t(){
//    static $a=1;
//    $a = $a+1;
//    echo $a;
//}
//
//
//
//t(); //2
//
//t(); //2
//
//t(); //2
//
////动态变量的例子
//$a = 'hello';
//$hello = 'world';
//echo $$a; //world


//面试题
//define('a','b');
$arr['c'] = '123';
$arr['b'] = '223';
$arr['a'] = '333';
echo "$arr[a]"; //输出一个333，没有错误
echo $arr[a]; //报一个notice，并输出333
echo $arr[a]; //如果24行不注释，这里输出223，并且没有错误。如果下标a不加引号，默认找一个常量a


?>