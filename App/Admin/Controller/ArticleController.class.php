<?php
class ArticleController extends CommonController{
    //显示文章列表
    public function index()
    {
        //调用model中的方法，取出数据
        $art = new ArticleModel();
        $data = $art->getArt();
        $this->view->smarty->assign('data', $data);
        $this->view->smarty->display('index.html');
    }

    //显示添加模板
    public function add()
    {
        //查询分类，并分配到模板
        $cate = new CateModel();
        $category = $cate->getCates(); //调用cateModel中的方法取得所有分类
        $category = $cate->sortCate($category); //对所有分类进行一个排序
        $this->view->smarty->assign('category', $category);
        $this->view->smarty->assign('hits', mt_rand(10, 500));
        $this->view->smarty->display('add.html');
    }

    //处理表单提交的信息，进行文章添加
    public function addHandle()
    {
        //向post数组中，加入ctime和ip
        $_POST['ctime'] = time();
        $_POST['ip'] = $_SERVER['REMOTE_ADDR'];
//        echo '<pre>';
//        print_r($_POST);
//        exit;
        //上传图片
        if($_FILES['pic']['name']){
            //有图片上传
            $upload = new Upload();
            $filename = $upload->up();
        }
        //将上传后的文件的路径及名字放到POST数组中
        $_POST['pic'] = $filename;

        //要添加的数据已经处理好了
        //调用model中的方法进行添加
        $art = new ArticleModel();
        if($art->insert($_POST)){
            $this->jump('添加文章成功','?p=Admin&c=Article&a=index');
        }else{
            $this->jump('添加文章失败','?p=Admin&c=Article&a=index');
        }
    }
}
?>