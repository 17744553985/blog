<?php
class CommonController extends Controller{
    //写一个权限验证的方法
    public function _verify(){
        //判断是否登录
        session_start();
        if(!isset($_SESSION['isLogin']) || $_SESSION['isLogin'] !== true){
            //没有登录
            $this->jump('请先登录','?p=Admin&c=Login&a=login');
            exit();
        }
    }
}
?>