<?php
/**
 * Created by PhpStorm.
 * User: ÂÒÐò
 * Date: 2018/2/18
 * Time: 2:09
 */
class AjaxController extends Controller
{
    public function index(){
        $ajaxModel = new AjaxModel("artitle_info");
        $aid = 1;
        $uid = 6;
        var_dump($ajaxModel->queryLike($aid,$uid));
    }
    public function artitleLike(){
        $isLike = $_POST['isLike'];
        $uid = $_POST['uid'];
        $aid = $_POST['artitle_id'];
        $ajaxModel = new AjaxModel("artitle_info");
        if($isLike==1){
            if($ajaxModel->queryLike($aid,$uid)==null){
                if($ajaxModel->insertLike($aid,$uid)!=null){

                    echo "true";
                }
                else {
                    echo "false";
                }
            }
            else {
                echo "true";
            }
        }else {
            if($ajaxModel->deleteLike($aid,$uid)!=null){
                echo "false";
            }
        }
    }
}