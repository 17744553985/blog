<?php
class Frame{

    //项目开始工作
    //将当期类中的方法依次调用一下。
    public static function run(){
        //下面四个方法的调用是有顺序的
        self::readConfig();
        self::setConst();
        self::autoLoad();
        self::dispatcher();
    }

    //加入私有的构造方法，不允许实例化本类
    private function __construct()
    {
    }

    //读取配置项
    //将配置项升级为公共的/全局的，这样在任何位置都可以使用了
    private static function readConfig(){
        $GLOBALS['conf'] = include_once  FRAME_PATH . 'Config/config.php';
//        echo '<pre>';
//        print_r($GLOBALS['conf']);
//        exit;
        //$GLOBALS['conf']['P']
        /*
         * Array
            (
                [P] => Home
                [C] => Stu
                [A] => showStus
            )
         */
    }

    //定义常用的目录常量
    private static function setConst(){
        //echo FRAME_PATH;
        $p = isset($_GET['p']) ? $_GET['p'] : $GLOBALS['conf']['P'];
        $c = isset($_GET['c']) ? $_GET['c'] : $GLOBALS['conf']['C'];
        //定义项目目录App下的Home下的Controller
        define('CONTROLLER_PATH', APP_PATH . $p . '/Controller/');
        define('MODEL_PATH', APP_PATH . $p . '/Model/');
        define('VIEW_PATH', APP_PATH . $p . '/View/');
        //echo CONTROLLER_PATH;
        //定义Core路径
        define('CORE_PATH', FRAME_PATH . 'Core/');
        //定义配置项目录
        define('CONFIG_PATH', FRAME_PATH . 'Config/');
        //模板目录
        define('TEMP_PATH', VIEW_PATH . $c);
        //编译文件目录
        define('COMP_PATH', APP_PATH . 'Runtime/');
    }

    //类的自动加载
    /*
     * 类都在哪里：
     * App下的控制器、模型中有很多类，在开发项目时写的
     * Frame目录下，也有很多类
     * 所以在做自动加载类的时候，会加载好几个位置的类
     */
    private static function autoLoad(){
        spl_autoload_register('self::loadController');
        spl_autoload_register('self::loadModel');
        spl_autoload_register('self::loadCore');
    }
    //自动加载App下的控制器类
    private static function loadController($class_name){
        $filename = CONTROLLER_PATH . $class_name . '.class.php';
        // ./App/Admin/Controller  $class_name  .class.php
        if(file_exists($filename)) include_once $filename;
    }
    //自动加载App下的模型类
    private static function loadModel($class_name){//StuModel
        $filename = MODEL_PATH . $class_name . '.class.php';
        if(file_exists($filename)) include_once $filename;
    }
    //自动加载Frtame下的类
    private static function loadCore($class_name){
        $filename = CORE_PATH . $class_name . '.class.php';
        //echo $filename;
        if(file_exists($filename)) include_once $filename;
    }

    //请求分发方法
    /*
     * 获取地址栏里的p参数、c参数、a参数，根据这三个参数，实例化一个控制器类，调用里面的一个方法
     */
    private static function dispatcher(){
        //$p = $_GET['p'];
        $c = isset($_GET['c']) ? $_GET['c'] : $GLOBALS['conf']['C'];
        $a = isset($_GET['a']) ? $_GET['a'] : $GLOBALS['conf']['A'];
        $controller = $c . 'Controller'; //NewsController
        //include_once CONTROLLER_PATH . $controller . '.class.php';
        $obj = new $controller(); //new StuController();
        $obj->$a();
    }
}

?>