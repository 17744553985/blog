<?php
mysql_connect('localhost','root','');
mysql_select_db('itcast');
mysql_query('set names utf8');

$sql = "insert into student(name,age,sex)values('$_POST[name]',$_POST[age],'$_POST[sex]')";
mysql_query($sql);
$id = mysql_insert_id();//最新添加数据的id

//修改最新添加的数据的 html字段
$sql = "update student set html='./html/$id.html' where id=$id";
mysql_query($sql);

//生成学生的详细信息页面的静态页
$sql = "select * from student where id=$id";
$res = mysql_query($sql);
$row = mysql_fetch_assoc($res);
ob_start();
include_once 'stu.html';
$str = ob_get_contents();
file_put_contents("../html/$id.html", $str);
ob_clean();
?>