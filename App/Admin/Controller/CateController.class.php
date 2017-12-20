<?php
class CateController extends CommonController{
    //显示添加分类的模板
    public function add(){
        $id = $_GET['id'];//父级类别的id，
        //在这里，一方面当做子类的pid；另一方面通过id可以查到父类的path，进而连接成一个子类的path

        //分配id和path
        if($id == 0){
            $path = 0;
        }else{
            $cate = new CateModel();
            $path = $cate->getPathById($id);
            $path = $path . '-' . $id;
        }
        $this->view->smarty->assign('id', $id);
        $this->view->smarty->assign('path', $path);

        $this->view->smarty->display('add.html');
    }

    //处理表单提交的数据
    public function addHandle(){
        //print_r($_POST); //Array ( [name] => 1234 [order] => 50 )
        $cate = new CateModel();
        if($cate->insert($_POST)){
            $this->jump('添加成功', '?p=Admin&c=Cate&a=index');
        }else{
            $this->jump('添加失败', '?p=Admin&c=Cate&a=add&id='.$_POST['pid']);
        }
    }

    //显示分类列表
    public function index(){
        //取出数据库中的分类
        $cate = new CateModel();
        $data = $cate->getCates();
//        echo '<pre>';
//        print_r($data);
//        echo '</pre>';
        $data = $cate->sortCate($data);
//        echo '<pre>';
//        print_r($data);
//        echo '</pre>';
        $this->view->smarty->assign('arr', $data);
        $this->view->smarty->display('index.html');
    }


}
?>