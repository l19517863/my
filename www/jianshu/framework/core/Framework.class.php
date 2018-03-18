<?php
/**
 * Created by PhpStorm.
 * User: ����
 * Date: 2018/2/12
 * Time: 17:32
 */
class Framework {
    public static function run() {
        self::init();
        self::autoload();
        self::dispatch();
    }
    public static function init(){
        //Ŀ¼б��
        define("DS",DIRECTORY_SEPARATOR);
        //��Ŀ¼
        define("ROOT",getcwd() . DS);
        //������Ŀ¼
        define("APP_PATH",ROOT . "application" . DS);
        //���Ŀ¼
        define("FRAMEWORK_PATH",ROOT . "framework" . DS);
        //�����ļ�Ŀ¼
        define("PUBLIC_PATH",ROOT . "public" . DS);
        //�����ļ�Ŀ¼
        define("CONFIG_PATH",APP_PATH ."config" . DS);
        //������Ŀ¼
        define("CONTROLLER_PATH",APP_PATH ."controller" . DS);
        //ģ��Ŀ¼
        define("MODEL_PATH",APP_PATH ."model" . DS);
        //��ͼĿ¼
        define("VIEW_PATH",APP_PATH ."view" . DS);
        //��ܺ���Ŀ¼
        define("CORE_PATH",FRAMEWORK_PATH ."core" . DS);
        //���ݿ�Ŀ¼
        define("DATABASE_PATH",FRAMEWORK_PATH ."database" . DS);
        //�������Ŀ¼
        define("HELPER_PATH",FRAMEWORK_PATH ."helper" . DS);
        //��Ŀ¼
        define("LIBRARY_PATH",FRAMEWORK_PATH . "library" . DS);
        //�ϴ�Ŀ¼
        define("UPLOAD_PATH",PUBLIC_PATH . "upload" . DS);
        //����ҳ��
        define("CONTROLLER",isset($_GET['c']) ? ucfirst($_GET['c']):"Index");
        //�������
        define("Action",isset($_GET['a'])?$_GET['a']:"Index");
        //���幫��Ŀ¼
        define("CUR_PUBLIC","public".DS);
        //���������
        include "Controller.class.php";
        include "Model.class.php";
        include DATABASE_PATH . "Mysql.class.php";
        $GLOBALS['config'] = include CONFIG_PATH ."config.php";
    }
    private static function dispatch(){
        $controller_name = CONTROLLER . "Controller";
        $action_name = Action;
        $controller = new $controller_name;
        $controller->$action_name();
    }
    public static function autoload(){
        spl_autoload_register('self::loader');
    }
    public static function loader($classname){
        //������
        if(substr($classname,-10)=="Controller") {
            if(file_exists(CONTROLLER_PATH ."{$classname}.class.php")){
                include CONTROLLER_PATH . "{$classname}.class.php";
            }
//            echo $classname;
        }
        //ģ��
        else if (substr($classname,-5=="Model")){
            if(file_exists(MODEL_PATH. "{$classname}.class.php")){
                include MODEL_PATH ."{$classname}.class.php";
            }
        }
        else {

        }
    }
}