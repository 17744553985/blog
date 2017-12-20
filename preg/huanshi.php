<?php
//$str = 'asdfhhhsjdlfhhhddfsfhhhsdhhhsd';

//找三个h前面是f

//$pattern = '/(?<=f)hhh/'; //找前面必须是f的
//$pattern = '/(?<!f)hhh/'; //找的是hhh，但是有个条件，hhh前面不能是f

//$pattern = '/hhh(?=s)/';//找hhh，但是后面必须是s的
//$pattern = '/hhh(?!s)/';//找hhh，但是后面必须不是s的


//有个字符串，要求字符串必须是3~5，必须包含数字和字母，不能是纯数字，也不能是纯字母
$str = 'asd32';
//$pattern = '/[a-z0-9]{3,5}/'; //匹配多少个
$pattern = '/(?!^[a-z]+$)(?!^[0-9]+$)^[a-z0-9]{3,5}$/';

echo preg_match_all($pattern, $str, $arr);
echo '<pre>';
print_r($arr);
?>