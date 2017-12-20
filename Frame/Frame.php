<?php
//定义框架目录的路径
define('FRAME_PATH', __DIR__ . DIRECTORY_SEPARATOR);

//__DIR__表示当前文件所在的目录
//DIRECTORY_SEPARATOR 常量可以根据系统的不同，来表示适用于当前系统的 “/”
//echo FRAME_PATH;

//框架的入口文件
include_once FRAME_PATH . 'Core/Frame.class.php';
Frame::run();
?>