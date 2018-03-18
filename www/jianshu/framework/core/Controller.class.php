<?php
/**
 * Created by PhpStorm.
 * User: ����
 * Date: 2018/2/12
 * Time: 17:31
 */
class Controller {
    //���ع����ຯ��
    public function library($lib){
        include LIBRARY_PATH . "{$lib}.class.php";
    }
    //���ظ�������
    public function helper($helper){
        include HELPER_PATH . "{$helper}.class.php";
    }
    public function signOut(){
        session_start();
        unset($_SESSION['username']);
        $this->jump();
    }
    protected $uid = null;
    protected $uavatar = null;
    public function headBar(){
        $indexModel= new IndexModel('user_info');
        $avatar = $indexModel->avatar()['avatar'];
        $this->uid = $indexModel->avatar()['uid'];
        $this->uavatar = "public".DS."avatar".DS.$avatar;
    }
    public function jump($url="index.php"){
        header("Location:{$url}");
    }
}