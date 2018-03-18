<?php
/**
 * Created by PhpStorm.
 * User: ÂÒĞò
 * Date: 2018/2/17
 * Time: 2:21
 */
class UserController extends Controller
{
    function index(){
        if(isset($_GET['uid'])){
            session_start();
            $this->headBar();
            $uid = $this->uid;
            $uavatar = $this->uavatar;
            $userModel = new UserModel("user_info");
            $userArr = $userModel->getUser();
            $usersArr = array();
            foreach ($userArr as $item){
                $usersArr[] = $item['uid'];
            }
            if(in_array($_GET['uid'],$usersArr)){
                $userInfoArr = $userModel->getUserInfo();
                $userArtitleArr = $userModel->getUserArtitleInfo();

                include VIEW_PATH . "user.html";
            }
            else {
                $this->jump();
            }
        }
        else {
            $this->jump();
        }
    }
}