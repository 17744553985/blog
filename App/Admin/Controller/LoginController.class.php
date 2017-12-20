<?php
class LoginController extends Controller{
    //显示登录页面
    public function login(){
        //echo md5('123'); //202cb962 ac59075b964b0715 2d234b70
        //str_replace('b','m', md5('123')); ////202cm962ac59075m964m07152d234m70
        $this->view->smarty->display('login.html');
    }

    //处理用户的登录信息
    public function loginHandle(){
        //$_POST['pwd'];
        $login = new LoginModel();
        if($row = $login->loginCheck()){
            //成功
            //记录登录成功的标志
            session_start();
            $_SESSION['isLogin'] = true; //记录一个登录成功的标志
            $_SESSION['info'] = $row; //将用户的信息存放到session中
            $this->jump('登录成功', '?p=Admin&c=Cate');
        }else{
            //失败
            $this->jump('用户名或者密码不对', '?p=Admin&c=Login&a=login');
        }
    }


    //退出登录的方法
    public function logout(){
        //①、删除session数组中保存的值
        session_start();
        unset($_SESSION['isLogin']);
        unset($_SESSION['info']);
        //②、删除cookie中的PHPSSID
        setcookie(session_name(),'',time()-1);
        //echo session_name();
        //③、销毁session文件
        session_destroy();
        $this->jump('退出成功', '?p=Admin&c=Login&a=login');
    }
}
?>