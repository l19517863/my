<?php
/**
 * Created by PhpStorm.
 * User: 乱序
 * Date: 2018/2/13
 * Time: 17:18
 */
class LoginController extends Controller
{
    function index(){
        include VIEW_PATH . "login.html";
    }
    function checkLogin(){
        session_start();
        $username = $_POST['username'];
        $password = md5($_POST['password']);
//        $username = 'luanxu';
        $output = array();
        $loginModel = new LoginModel('user_info');
        $users = $loginModel->getUsers();
        $userArr = array();
        foreach ($users as $item){
            $userArr[] = $item['username'];
        }
        if(in_array($username,$userArr)){
            $uPwd = $loginModel->getPassword($username)['password'];
            if($uPwd==$password){
                $_SESSION['username']=$username;
                $output = array(
                    'code'=>'200',
                    'msg'=>"登陆成功！"
                );
                exit(json_encode($output));
            }
            else{
                $output = array(
                    'code'=>'-202',
                    'msg'=>"密码错误，请重新尝试！"
                );
                exit(json_encode($output));
            }
        }
        else {
            $output = array(
                'code'=>'-203',
                'msg'=>"用户名不存在！"
            );
            exit(json_encode($output));
        }

    }
}