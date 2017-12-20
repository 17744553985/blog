<?php
class ArtController extends Controller{
    //显示文章内容
    public function news(){
        $id = $_GET['id'];
        //根据id查询文章内容
        //echo $id;
        $art = new ArtModel();
        $row = $art->getNewsById($id);

        //取评论
        $this->view->smarty->assign(
            'pinglun',
            $art->getPinglunByAid($id)
        );
        $this->view->smarty->assign('row', $row);
        //显示模板
        $this->view->smarty->display('news.html');
    }

    //文章列表
    public function newslist(){
        $id = $_GET['id']; //类别表中大类别的id，文章表的cid
        //通过大类别的id，查询子类的id
        $art = new ArtModel();
        $ids = $art->getChildIdByParentId($id); //array(5,6,7,8);
        // select * from article where cid in(5,6,7,8);
        // select * from article where cid=5 or cid=6 or cid=7 or cid=8
        $data = $art->getNewsByCids($ids);
        //取出侧边栏可转动的小类
        $smallCate = $art->getSmallCateByParentId($id);
        $this->view->smarty->assign('smallCate', $smallCate);
        $this->view->smarty->assign('data', $data);

        $this->view->smarty->display('newslist.html');
    }

    //文章列表，获取的参数是小类的id
    public function newslist2(){
        $id = $_GET['id'];//这是一个小类别的id
        $art = new ArtModel();
        $data = $art->getNewsBySmallCid($id);
        //根据小类别的id，取出兄弟级别的其他类别
        $smallCate = $art->getSiblingsBySmallId($id);
        //print_r($smallCate);
        $this->view->smarty->assign('smallCate', $smallCate);
        $this->view->smarty->assign('data', $data);
        $this->view->smarty->display('newslist.html');
    }

    //添加评论
    public function addComment(){
        echo '<pre>';
        print_r($_POST); //content , aid
        $_POST['uid'] = $_SESSION['userinfo']['id'];
        $_POST['time'] = time();
        $art = new ArtModel();
        if($art->addComment($_POST)){
            $this->jump('发布成功', '?c=Art&a=news&id='.$_POST['aid']);
        }else{
            $this->jump('发布失败', '?c=Art&a=news&id='.$_POST['aid']);
        }
    }
}
?>