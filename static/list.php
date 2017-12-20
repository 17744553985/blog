<?php
mysql_connect('localhost','root','');
mysql_select_db('itcast');
mysql_query('set names utf8');


$sql = "select * from student";
$res = mysql_query($sql);
$arr = array();
while($row = mysql_fetch_assoc($res)){
    $arr[] = $row;
}
ob_start(); //开启ob
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>学生列表</title>
</head>
<body>
<table>
    <tr>
        <th>ID</th>
        <th>NAME</th>
        <th>AGE</th>
        <th>SEX</th>
    </tr>
    <?php
    foreach($arr as $val) {
        ?>
        <tr>
            <td><?php echo $val['id'];?></td>
            <td><a href="<?php echo $val['html'];?>"><?php echo $val['name'];?></a></td>
            <td><?php echo $val['age'];?></td>
            <td><?php echo $val['sex'];?></td>
        </tr>
        <?php
    }
    ?>
</table>
</body>
</html>

<?php
$str = ob_get_contents(); //将上面存放到ob缓存中的所有的html代码取得
file_put_contents('list.html', $str);
//删除ob，就不显示页面了
ob_clean();
?>
