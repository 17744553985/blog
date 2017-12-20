<?php
////////// preg_match_all ///////////
$str = 'aaphp1abcphp2hhphp3ggphp4asdphp5llphp6';
//在字符串中，查找php4以上结果，包含php4
preg_match_all('/php[4-9]/',$str, $out);
echo '<pre>';
//print_r($out);


////////////// preg_replace /////////////
$str = 'aasdf3aasp1abcjsp2hhjsp3ggasp4asdasp5llasp6asdfjspasasp';
//将后面带数字的asp、jsp换成php
echo preg_replace('/(asp|jsp)(\d)/','php$2', $str);
//上面例子中，正则表达式中的每个小括号，在替换结果中使用的话，$1表示第一个小括号，$2表示第二个小括号，依次类推

?>