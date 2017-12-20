<?php
class View{
    public $smarty;
    public function __construct()
    {
        include_once FRAME_PATH . 'Smarty/Smarty.class.php';
        $this->smarty = new Smarty();
        $this->smarty->setTemplateDir(TEMP_PATH);//定义模板目录
        $this->smarty->setCompileDir(COMP_PATH);//定义编译文件目录
    }

//    //重写assign方法
//    public function assign($key, $val){
//        $this->smarty->assign($key, $val);
//    }
//
//    //重写display方法
//    public function display($filename){
//        $this->smarty->display($filename);
//    }
}
?>