<?php
/**
 * Created by PhpStorm.
 * User: 乱序
 * Date: 2018/2/13
 * Time: 2:09
 */
class RegController extends Controller
{
    function index(){
        include VIEW_PATH . "reg.html";
    }
    function regcheck(){
        $data['nickname']=$_POST['nickname'];
        $data['username']=$_POST['username'];
        $data['password']=md5($_POST['password']);
        $output = array();
        if($this->query()){
            $output = array(
                'code'=>'-201',
                'msg'=>'用户名已存在'
            );
            exit(json_encode($output));
        }else {
            $inarr = array('username'=>$data['username'],'password'=>$data['password'],'nickname'=>$data['nickname']);
            if($this->insert($inarr)!=false){
                $output = array(
                    'code'=>'200',
                    'msg'=>'注册成功！'
                );
                exit(json_encode($output));
            }
        }
    }
    function query(){
        $data['username']=$_POST['username'];
        //判断账号名长度
        //判断账号是否存在
        $regModel = new RegModel("user_info");
        $users = array();
        $dbdata = $regModel->getNames()[0];
        foreach ($dbdata as $value){
            $users[] = $value['username'];
        }
        if(in_array($data['username'],$users)){
            return true;
        }else{
            return false;
        }
    }

    function insert($list){
        $regModel = new RegModel("user_info");
        return $regModel->insertUser($list);
    }
}