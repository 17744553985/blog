<?php
class LoginModel extends Model{
    //管理员登录检测
    public function loginCheck(){
        //echo $_POST['user'];
//        $sql = "select * from admin where username=$username and pwd=$pwd";
        $sql = "select * from admin where username='".$_POST['user']."'";
        $row = $this->find($sql);
//        echo '<pre>';
//        print_r($row);
//        exit;
        if($row){
            //表示根据用户名查询到了密码
            if(md5($_POST['pwd']) == $row['pwd']){
                //成功
                return $row;
            }else{
                //密码不对
                return false;
            }
        }else{
            //用户名不对
            return false;
        }
    }
}
?>