<?php
//只允许单文件上传
class Upload{
    /*
         * 上传之前应该考虑一些问题
             * 允许上传文件的类型(后缀)
             * 上传文件的大小
             * 错误信息的提示
             * 上传文件不能有重名，重命名文件
             * 设置上传文件的保存目录 Public/Uploads/
             * 设置上传文件存放的子目录 20161115  20161116
         */

    //获取上传文件的信息
    /*
     * Array
        (
            [name] => 1.jpg
            [type] => image/jpeg
            [tmp_name] => E:\wamp\tmp\phpD00F.tmp
            [error] => 0
            [size] => 117138
        )
     */
    private $info = array();
    public $ext = array('jpg', 'gif', 'png');//允许上传的文件的后缀
    public $size = 6; //单位M
    public $rootPath = './Public/Uploads';//上传文件的存放位置
    public $subPath = 'Ymd';//上传文件存放的子目录 2016/11/15
    public $error = '';

    public function __construct()
    {
        if(count($_FILES) > 1){
            exit('只允许单文件上传');
        }
        foreach($_FILES as $val){
            $this->info = $val;
        }
    }

    //实现上传的方法
    public function up(){
        //上传之前还应该有判断
        if(!$this->checkError() || !$this->checkExt() || !$this->checkSize()){
            exit($this->error);
        }

        $this->mkRootPath();
        $zimulu = $this->mkSubPath();
        $filename = $this->mkName().".".$this->getExt();
        if(move_uploaded_file($this->info['tmp_name'], $zimulu . $filename)){
            return $zimulu . $filename; // ./Public/Uploads/20161115/12423234324.jpg
        }else{
            exit('文件上传失败');
        }
    }

    //判断允许上传文件的类型（后缀），允许的类型，返回true；不允许的类型返回false。记录错误信息
    public function checkExt(){
        if(in_array(strtolower($this->getExt()), $this->ext)){
            return true;
        }else{
            //记录错误
            $this->error = '上传文件后缀不允许';
            return false;
        }
    }
    //取得当前上传文件的后缀
    //返回值  jpg JPG
    public function getExt(){
        return ltrim(strrchr($this->info['name'], '.'), '.');
    }

    //上传文件的大小的控制
    public function checkSize(){
        if($this->size*1024*1024 >= $this->info['size']){
            return true;
        }else{
            $this->error = '上传文件太大了 :(';
            return false;
        }
    }

    //制作新的文件名
    public function mkName(){
        return time() . mt_rand(00,99);
    }

    //上传文件的存放根目录设置
    public function mkRootPath(){
        if(!file_exists($this->rootPath)){
            mkdir($this->rootPath, 0777, true);
        }
    }

    //设置上传文件存放的子目录
    public function mkSubPath(){
        $subPath = date($this->subPath);
        $zimulu = rtrim($this->rootPath, '/') . '/' . $subPath . '/';
        if(!file_exists($zimulu)){
            mkdir($zimulu, 0777, true);
        }
        return $zimulu;
    }

    //检测error是否有问题
    public function checkError(){
        $err = array(
            1 => '上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值',
            2 => '上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值',
            3 => '文件只有部分被上传',
            4 => '没有文件被上传',
            6 => '找不到临时文件夹',
            7 => '文件写入失败',
        );
        if(array_key_exists($this->info['error'], $err)){
            $this->error = $err[$this->info['error']];
            return false;
        }
        return true;
    }
}
?>