<?php
class Db{
    private static $ins = null;//静态方法不能使用非静态属性，所以这里必须是静态属性
    public $pdo;

    //定义成私有方法，目的是不让在类外部实例化
    private function __construct()
    {
        //连接数据库
        $this->conn();
    }

    //连接数据库
    private function conn(){
        try{
            $dsn = "mysql:host=localhost;dbname=blog;charset=utf8";
            $this->pdo = new PDO($dsn, 'root', '');
        }catch (PDOException $e){
            exit($e->getMessage());
        }
    }

    //单例模式方法
    public static function getIns(){
        if(self::$ins === null){
            self::$ins = new Db();
        }
        return self::$ins;
    }
}
?>