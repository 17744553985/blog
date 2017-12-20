<?php
class CateModel extends Model{
    //完成分类的添加入库
    public function insert($data){
        //$data = Array ( [name] => 1234 [order] => 50 )
        $sql = "insert into `category`(`name`,`order`,pid,path)
values('".$data['name']."',".$data['order'].",".$data['pid'].",'".$data['path']."')";
//        echo $sql;
//        exit;
        return $this->query($sql);
    }


    //取出所有的分类
    public function getCates(){
        $sql = "select * from category";
        return $this->select($sql);
    }

    //通过id，取得path
    public function getPathById($id){
        $sql = "select path from category where id=$id";
        $row = $this->find($sql);
        //print_r($row);
        return $row['path'];
    }

    //给分类排序
    public function sortCate($data, $pid=0, $lev=0){
        static $arr = array();
        foreach($data as $key=>$value){
            if($value['pid'] == $pid){
                $value['lev'] = $lev;
                $arr[] = $value;
                $this->sortCate($data, $value['id'], $lev+1);
            }
        }
        return $arr;
    }
}
?>