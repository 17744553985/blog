<?php
class IndexController extends Controller{
    //显示首页模板的方法
    public function index(){
        echo $_GET['t'];
        $i = new IndexModel();
        $data = $i->getNewsByHits();
        $this->view->smarty->assign('data', $data);
        $this->view->smarty->display('index.html');
    }
}
?>