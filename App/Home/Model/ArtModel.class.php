<?php
class ArtModel extends Model{
    //根据文章id取出一篇文章
    public function getNewsById($id){
        $sql = "select a.*,c.name from article a JOIN category c on a.cid=c.id where a.id=$id";
        return $this->find($sql);
    }

    //根据大类别的id，查询子类的id
    /*
     * return array(id,id,id...);
     */
    public function getChildIdByParentId($id){
        $sql = "select id from category where pid=$id";
        $ids = $this->select($sql);
        //echo '<pre>';
        //print_r($ids);
        //array(5,6,7,8);   implode(',', $arr);
        //将获得的二维数组转化成一维数组
        $arr = array();
        foreach($ids as $val){
            $arr[] = $val['id'];
        }
        return $arr;
    }

    //根据多个cid查询文章
    /*
     * @param ids 一维数组
     */
    public function getNewsByCids($ids){
        // select * from article where cid in(5,6,7,8);
        // select * from article where cid=5 or cid=6 or cid=7 or cid=8
        $sql = "select count(*) from article where cid in(".implode(',', $ids).")";
        $count = $this->count($sql);
        $page = new Page2($count, 9);
        $sql = "select a.*,c.name from article a
join category c on a.cid=c.id
 where a.cid in(".implode(',', $ids).")
 limit {$page->start},{$page->pageNum}";
        //echo $sql; //select * from article where cid in(5,6,7,8)
        $data['list'] = $this->select($sql);
        $data['showPage'] = $page->showPage();
        return $data;
    }

    //根据父类id取出子类
    public function getSmallCateByParentId($id){
        $sql = "select * from category where pid=$id";
        return $this->select($sql);
    }

    //根据小类别的id，取出文章
    public function getNewsBySmallCid($cid){
        $sql = "select count(*) from article where cid = $cid";
        $count = $this->count($sql);
        $page = new Page2($count, 9);
        $sql = "select a.*,c.name from article a
join category c on a.cid=c.id
 where a.cid = $cid
 limit {$page->start},{$page->pageNum}";
        //echo $sql; //select * from article where cid in(5,6,7,8)
        $data['list'] = $this->select($sql);
        $data['showPage'] = $page->showPage();
        return $data;
    }

    //根据一个小类别的id，取得兄弟类别
    public function getSiblingsBySmallId($id){
        $sql = 'select pid from category where id='.$id;
        $pid = $this->find($sql); //array('pid'=>2);
        //print_r($pid);
        $sql = "select * from category where pid = ". $pid['pid'];
        return $this->select($sql);
    }

    //完成评论的添加
    public function addComment($d){
        $sql = "insert into pinglun(uid,aid,content,time)values(".$d['uid'].",".$d['aid'].",'".$d['content']."',".$d['time'].")";
        return $this->query($sql);
    }

    //根据文章id取评论
    public function getPinglunByAid($id)
    {
        $sql = "select p.*,u.username,u.pic from pinglun p
 join user u on p.uid=u.id where p.aid=$id order by time desc";
        return $this->select($sql);
    }
}
?>