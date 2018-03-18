<?php
/**
 * Created by PhpStorm.
 * User: ÂÒÐò
 * Date: 2018/2/17
 * Time: 2:34
 */
class ArtitleController extends Controller
{
    public function index(){
        session_start();
        $this->headBar();
        $uid = $this->uid;
        $uavatar = $this->uavatar;
        $artitleModel = new ArtitleModel("user_info");
        $artitleDetail = $artitleModel->getArtitleDetail();
        $ajaxModel = new AjaxModel("artitle_like");
        if(isset($_SESSION['username'])){
            if($ajaxModel->queryLike($_GET['aid'],$uid)!=null){
                $isLike = true;
            }else{
                $isLike = false;
            }
        }else{
            $isLike = false;
        }

        include VIEW_PATH . "artitle.html";

    }
}