<?php
class Page{

    //分页参数
    //public $params = '';
    public $pageNum = 10;//每页显示多少条
    public $pageTotal; //数据总条数
    public $start; //分页时，每页数据从哪里开始
    public $page; //当前页

    public function __construct($count, $pageNum=10)
    {
        $this->pageNum = $pageNum;
        $this->pageTotal = $count;
        //当前页，是从地址栏获取的
        $this->page = isset($_GET['page']) ? $_GET['page'] : 1;
        $this->start = ($this->page - 1) * $this->pageNum;
    }

    //显示分页样式
    public function showPage(){
        //echo '<pre>';
        //print_r($_SERVER);
        //获取地址栏里的参数
        $params = $_SERVER['QUERY_STRING']; // p=Admin&c=News&a=showNews&page=1

        /*
         * $params有5种情况
         * //$params = 'p=Admin&c=News&a=showNews&page=1'; //p=Admin&c=News&a=showNews&
           //$params = 'a=showNews&page=1'; // a=showNews&
           //$params = 'page=1'; //
           //$params = ''; //
           //$params = 'a=showPage'; // a=showPage
         */

        //想办法将page=?去掉，剩下的就是原来的参数
        $ppp = preg_replace('/page=\d+/', '', $params);
        // p=Admin&c=News&a=showNews&
        // c=News&a=showNews&
        //
        //echo $ppp;
        $formstr = '';
        if($ppp){
            $ppp = rtrim($ppp, '&') . '&';
            $a = rtrim($ppp, '&'); //p=Admin&c=News&a=showNews
            $arr = explode('&', $a);
            /*
             * $arr = array(
             *   'p=Admin',
             *   'c=News',
             *   'a=showNews'
             * )
             */
            foreach($arr as $val){
                //每次循环$val = 'p=Admin'
                $b = explode('=', $val); // $b = array('p', 'Admin');
                $formstr .= "<input type='hidden' name='".$b[0]."' value='".$b[1]."' />";
            }
        }

        $str = '';
        $str .= '<a href="?'.$ppp.'page=1">首页</a>';

        if($this->page<=1){
            $str .= "<span class='prev'>上一页</span>";
        }else{
            $str .= '<a class="prev" href="?'.$ppp.'page='.($this->page-1).'">上一页</a>';
        }

        //link页的制作。
        /*
         * 注意，不要写死就是5个，如果不到5页呢？
         * 如果满5页，可以写成12345
         */
//        for($i=0;$i<5;$i++){
//            $str .= " $i ";
//        }

        //获取最大页
        //要想取得最大页，必须知道总共多天条，每页显示多少条
        $pageMax = ceil($this->pageTotal / $this->pageNum);
        if($this->page>=$pageMax){
            $str .= '<span>下一页</span>';
        }else{
            $str .= '<a href="?'.$ppp.'page='.($this->page+1).'">下一页</a>';
        }

        $str .= '<a href="?'.$ppp.'page='.$pageMax.'">尾页</a>';
        $str .= $this->page . "/" . $pageMax;
        //跳转页
        $str .= "<form>$formstr<input type='text' name='page' size='4' /><input type='submit' value='GO' /></form>";
        return $str;
    }
}
?>