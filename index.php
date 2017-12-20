<?php
//定义项目目录App
//define('APP_PATH', dirname($_SERVER['SCRIPT_FILENAME']) . '/App/');
define('APP_PATH', './App/');
//所有的当前目录“./”，一定是和index.php同级的目录。
//而且不会错，因为访问项目的任何位置都要先访问index.php

session_start();

//定义网站的公共目录
define('PUBLIC_PATH', './Public/');
//echo APP_PATH;
include_once './Frame/Frame.php';

?>