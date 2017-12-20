<?php
class ArticleModel extends Model{

    //添加文章的方法
    public function insert($d)
    {
        $sql = "insert into article
(title,content,ptime,ctime,hits,cid,flag,author,keywords,description,alias,ip,pic)
VALUES
('".$d['title']."','".$d['content']."','".$d['ptime']."',".$d['ctime'].",".$d['hits'].",".$d['cid'].",".$d['flag'].",'".$d['author']."','".$d['keywords']."','".$d['description']."','".$d['alias']."','".$d['ip']."','".$d['pic']."')";
       //echo $sql;
        return $this->query($sql);
    }

    //取出所有文章列表
    public function getArt()
    {
        $count = $this->count("select count(*) from article");
        $page = new Page($count);
        $data['showPage'] = $page->showPage(); //获取分页样式
        $sql = "select a.*,c.name from article a join category c on a.cid=c.id limit {$page->start},{$page->pageNum}";
        $data['list'] = $this->select($sql); //文章列表
        return $data;
    }

}
?>