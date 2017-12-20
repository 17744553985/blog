<?php
class Image{
    //验证码方法
    public static function verify($width = 200, $height = 80){
        //新建一个真彩色图像
        $im = imagecreatetruecolor($width, $height);
        //美化图像(背景颜色浅色)
        $bgcolor = imagecolorallocate($im, mt_rand(150,255), mt_rand(150,255), mt_rand(150,255)); //0~255，数字越大表示颜色越浅
        imagefill($im, 0, 0, $bgcolor);
        //对图像进行模糊操作（加点、线段、弧线）
        //加像素点
        for($i=0; $i<20; $i++){
            $pcolor = imagecolorallocate($im, mt_rand(0,150), mt_rand(0,150), mt_rand(0,150));
            imagesetpixel($im, mt_rand(1,$width-1), mt_rand(1,$height-1), $pcolor);
        }
        //画线段
        for($i=0; $i<8; $i++){
            $lcolor = imagecolorallocate($im,  mt_rand(0,150), mt_rand(0,150), mt_rand(0,150));
            imageline($im, mt_rand(0,$width),mt_rand(0,$height), mt_rand(0,$width),mt_rand(0,$height), $lcolor);
        }
        //画弧线
        for($i=0; $i<8; $i++){
            $acolor = imagecolorallocate($im, mt_rand(0,150), mt_rand(0,150), mt_rand(0,150));
            imagearc($im,
                mt_rand($width*0.25, $width*0.75), mt_rand($height*0.25, $height*0.75), //中心点坐标
                mt_rand($width*0.25, $width), mt_rand($height*0.25, $height), //弧线所在椭圆的宽和高
                mt_rand(0,360), mt_rand(0,360), //起始点和结尾点
                $acolor);
        }

        //在图像上写字母或者数字
        $base_str = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $base_str_num = '0123456789';
        //打乱字符串
        $shuffle_str = str_shuffle($base_str);
        //字符串已经乱了，所以直接取4个就行了
        $my_str = substr($shuffle_str, 0, 4);
        //将验证码字符放到session中
        //session_start();
        $_SESSION['yzm'] = md5(strtolower($my_str));

        /*
         * 实现算数的验证码
        $str = "1+3=?";
        $my_str = 4;
        session_start();
        $_SESSION['yzm'] = md5(strtolower($my_str));
        $tcolor = imagecolorallocate($im, mt_rand(0,150), mt_rand(0,150), mt_rand(0,150));
            imagettftext($im,50, 0, 5,70, $tcolor,
                PUBLIC_PATH . 'fonts/Raleway-Regular.TTF', $str);*/

        //将字符写到图片上(把字体文件拿过来)
        for($i=0; $i<4; $i++){
            $tcolor = imagecolorallocate($im, mt_rand(0,150), mt_rand(0,150), mt_rand(0,150));
            imagettftext($im,50, mt_rand(-30,30), 5+($width-10)/4*$i,70, $tcolor,
                PUBLIC_PATH . 'fonts/Raleway-Regular.TTF',substr($my_str,$i,1));
        }
        //输出图像之前一定要指定head头
        header('content-type:image/png');
        //输出图像
        imagepng($im);
        //销毁资源，释放内存
        imagedestroy($im);
    }

    //缩略图方法
    /*
     * src 打开的图像（原来的图像）包括路径和图片名称  ./Public/xxx/adsfasdf.jpg
     * dst 缩略后的图像
     */
    public static function thumb($src, $bili){
        //获取图像的信息
        $info = getimagesize($src);
        //echo '<pre>';
        //print_r($info);
        /*
         * Array
            (
                [0] => 500  宽度
                [1] => 332  搞定
                [2] => 2  图像类型1 = GIF，2 = JPG，3 = PNG，4 = SWF，5 = PSD，6 = BMP共16种
                [3] => width="500" height="332"
                [bits] => 8
                [channels] => 3
                [mime] => image/jpeg   mime类型
            )
         */
        $createFun = str_replace('/','createfrom',$info['mime']);
        //echo $createFun; //imagecreatefromjpeg
        $src_im = $createFun($src);
        //新图像
        $dst_im = imagecreatetruecolor($info[0]*$bili, $info[1]*$bili);
        //将原图拷贝到新图上
        imagecopyresampled($dst_im, $src_im,
            0,0 //拷贝到新图像的哪一点
            ,0,0, //从原图像的哪一点开始拷贝
            $info[0]*$bili, $info[1]*$bili,//新图像的宽和高
            $info[0], $info[1]);//原图像的宽高
        //将新图（缩略后的图）保存
        $saveFun = str_replace('/','',$info['mime']); // imagejpeg  iamgepng
        //获取原文件的存放目录
        //echo dirname($src); //  ./Public/Uploads
        //echo '<br>';
        //echo basename($src); // 23423423423.jpg

        $saveFun($dst_im, dirname($src) . '/thumb_' . basename($src));
        //销毁图像资源
        imagedestroy($src_im);
        imagedestroy($dst_im);
    }

    //加水印
    /*
     * dst 是要加水印的图片
     * water是水印图片，手册中是src
     */
    public static function water($dst, $water, $position=9, $pct=80){
        //•imagecopy — 拷贝图像的一部分
        //•imagecopymerge — 拷贝并合并图像的一部分
        $dst_info = getimagesize($dst); // 要加水印的图片的信息
        $water_info = getimagesize($water); //获取水印图片的信息
        $createDstFun = str_replace('/', 'createfrom', $dst_info['mime']);//创建打开要加水印图片的函数
        $createWaterFun = str_replace('/', 'createfrom', $water_info['mime']);//创建一个打开水印图片的方法
        $dst_im = $createDstFun($dst);//获取到要加水印图片的资源
        $water_im = $createWaterFun($water);//获取水印图片的资源

        //加水印的位置
        switch($position){
            case 9:
                $x = $dst_info[0] - $water_info[0];
                $y = $dst_info[1] - $water_info[1];
                break;
            case 8:
                $x = ($dst_info[0] - $water_info[0]) / 2;
                $y = $dst_info[1] - $water_info[1];
                break;
            case 7:
                $x = 0;
                $y = $dst_info[1] - $water_info[1];
                break;
            case 6:
                $x = $dst_info[0] - $water_info[0];
                $y = ($dst_info[1] - $water_info[1]) / 2;
                break;
            case 5:
                $x = ($dst_info[0] - $water_info[0]) / 2;
                $y = ($dst_info[1] - $water_info[1]) / 2;
                break;
            case 4:
                $x = 0;
                $y = ($dst_info[1] - $water_info[1]) / 2;
                break;
            case 3:
                $x = $dst_info[0] - $water_info[0];
                $y = 0;
                break;
            case 2:
                $x = ($dst_info[0] - $water_info[0]) / 2;
                $y = 0;
                break;
            case 1:
                $x = 0;
                $y = 0;
                break;

        }
        //如果水印图片是png的，透明的
        if($water_info[2] == 3){
            imagecopy($dst_im, $water_im,$x,$y,0,0,$water_info[0], $water_info[1]);
        }else{
            imagecopymerge($dst_im, $water_im,
                $x,$y, //要拷贝到要加水印的图片的哪个位置，00表示左上角
                0,0, //表示水印图片从哪里开始拷贝
                $water_info[0],$water_info[1], //水印图片多大
                $pct);
        }
        //保存加好水印的图片(保存后替换掉原图）
        $saveDstFun = str_replace('/','',$dst_info['mime']);
        $saveDstFun($dst_im, $dst);
        //销毁资源
        imagedestroy($dst_im);
        imagedestroy($water_im);
    }
}
?>