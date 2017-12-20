<?php
class Model{
    private $pdo;

    //构造方法，获取Db对象
    public function __construct()
    {
        $db = Db::getIns();
        $this->pdo = $db->pdo;
    }

    //查询所有行
    public function select($sql){
        $stmt = $this->pdo->prepare($sql);
        if($stmt->execute())
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //查询一行
    public function find($sql){
        $stmt = $this->pdo->prepare($sql);
        if($stmt->execute())
            return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //执行一条sql
    public function query($sql){
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute();
    }

    //查询总行数
    //select count(*) from table
    public function count($sql){
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchColumn(0);
    }
}
?>