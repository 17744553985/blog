<?php
class LoginController extends Controller{
    //显示注册页面
    public function register(){
        $this->view->smarty->display('register.html');
    }

    //显示登录页面
    public function login(){
        $this->view->smarty->display('login.html');
    }

    //接收注册信息,完成注册
    public function registerHandle(){
        //判断验证码
        session_start();
        if(md5(strtolower($_POST['yzm'])) != $_SESSION['yzm']){
            $this->jump('验证码错误','?c=Login&a=register');
            exit;
        }
        //其他验证，用户名不能为空
        //密码不能少于6位
        //两次密码是否一致
        //验证邮箱、电话格式是否正确
        $pattern = '/^[0-9a-zA-Z_\-\.]{2,255}@[0-9a-zA-Z_\-]{2,255}(\.[a-zA-Z]{2,4}){1,2}$/';
        $email = $_POST['email'];
        if(!preg_match($pattern, $email)){
            $this->jump('邮箱格式不正确','?c=Login&a=register');
            exit;
        }
        //手机号必须是数字，11位，开头必须是13?/157/158/177/188
        $pattern2 = '/(13\d|157|158|177|188)\d{8}/';
        $tel = $_POST['tel'];
        if(!preg_match($pattern2, $tel)){
            $this->jump('手机号格式不正确','?c=Login&a=register');
            exit;
        }
        //判断是否有头像上传
        $filename = '';
        if($_FILES['pic']['name']){
            $upload = new Upload();
            //指定头像存放路径
            $upload->rootPath = PUBLIC_PATH . 'Head';
            $filename = $upload->up();
        }
        $_POST['pic'] = $filename; // ./Public/Head/20161151/234235235.jpg
        $login = new LoginModel();
        if($login->reg($_POST)){
            //设置这个超链接，当做邮件的正文发送给注册的用户
            $url = "http://www.blog.com/index.php?c=Login&a=emailVerify&email=".$_POST['email'];
            $str = "请点击<a href='$url'>这里</a>完成邮件验证";
            $sendmail = new sendmail();
            if(true !== $sendmail->postmail($_POST['email'], '高端大气博客网站邮件验证', $str, $_POST['username'])){
                //邮件发送失败，提示用户到“个人中心”从新发送邮件
            }
            $this->jump('注册成功，请到邮箱中验证','/');
        }else{
            $this->jump('注册失败','?c=Login&a=register');
        }
    }

    //
    public function emailVerify(){
        //用户点击邮件中的超链接，跳转到这个方法
        //把用户的flag改为1
        $email = $_GET['email'];
        $login = new LoginModel();
        if($login->UpdateFlag($email)){
            //$this->jump('恭喜，完成验证','/');
        }else{
            $this->jump('验证失败，请从新注册或与管理员联系','/');
        }
    }

    //登录验证
    public function loginHandle(){
        //判断验证码
        if(md5(strtolower($_POST['yzm'])) != $_SESSION['yzm']){
            $this->jump('验证码错误','?c=Login&a=register');
            exit;
        }

        $login = new LoginModel();
        if($res = $login->loginCheck($_POST)){
            //登录成功
            //存放用户信息到session中
            $_SESSION['userinfo'] = $res;
            $this->jump('登录成功','/');
        }else{
            $this->jump('登录失败','?c=Login&a=login');
        }
    }

    //前台用户退出
    public function logout(){
        unset($_SESSION['userinfo']);
        //setcookie(session_name());
        //session_destroy();
        $this->jump('退出成功','/');
    }
}
?>