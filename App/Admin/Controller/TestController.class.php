<?php
class TestController extends Controller{
    public function index(){
        $this->view->smarty->display('_blog_list.html');
    }
}
?>