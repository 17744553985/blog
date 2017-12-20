<?php
class IndexModel extends Model{
    //查询首页“最冷文章”
    public function getNewsByHits(){
        $sql = "select a.id,a.title,a.pic,a.description,a.author,a.hits,a.comment,a.ptime,c.name from article a
join category c
on a.cid=c.id
where c.pid!=0
order by a.hits desc
limit 5";
        return $this->select($sql);
    }
}
?>