<?php
class Controller{
    //Controller是一个控制器，不适合做和模板有关的东西。

    //升级$view为控制器类都能使用的一个成员属性
    public $view;

    //写构造方法
    public function __construct()
    {
        if(method_exists($this, '_verify')){
            $this->_verify();
        }
        $this->view = new View();
    }

    //写一个跳转的方法
    public function jump($msg, $url, $refresh=2){
        header('content-type:text/html;charset=utf-8');
        echo $msg;
        header('refresh:'.$refresh.'; url='.$url);
    }
}
?>