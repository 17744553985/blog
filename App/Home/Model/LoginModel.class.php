<?php
class LoginModel extends Model{
    //完成注册信息入库
    public function reg($d){
        $sql = "insert into user(username,email,tel,pwd,pic,ctime)values(";
        $sql .= "'".$d['username']."','".$d['email']."','".$d['tel']."','".md5('*^'.md5($d['pwd']).'+%')."','".$d['pic']."',".time();
        $sql .= ')';
        return $this->query($sql);
    }

    //完成登录验证
    public function loginCheck($d){
        $sql = "select * from user where
 pwd='".md5('*^'.md5($d['pwd']).'+%')."'
 and
 (username='".$d['username']."' or email='".$d['username']."' or tel='".$d['username']."')"; //and flag=1

        //echo $sql;
        //exit;
        return $this->find($sql);
    }

    //修改flag值
    public function UpdateFlag($email){
        $sql = "update user set flag=1 where email='$email'";
        return $this->query($sql);
    }
}
?>