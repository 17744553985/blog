<?php
//$str = 'This is a <b>php</b>,that is a <b>jsp</b>';
$str = 'This is a [b]php[/b],that is a [b]jsp[/b]';
$str = preg_replace('/\[b\](.*)\[\/b\]/U','<b>$1</b>', $str);
echo $str;
?>