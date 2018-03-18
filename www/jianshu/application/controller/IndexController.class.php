<?php
/**
 * Created by PhpStorm.
 * User: ÂÒÐò
 * Date: 2018/2/12
 * Time: 17:39
 */
class IndexController extends Controller
{
    public function index(){
        session_start();
        $this->headBar();
        $uid = $this->uid;
        $uavatar = $this->uavatar;
        $indexModel= new IndexModel('user_info');
        $indexTag = $indexModel->tagInfo();
        if(isset($_GET['keyword'])){
            $indexArtitle = $indexModel->searchArtitleInfo($_GET['keyword']);

            include VIEW_PATH."index.html";
        }
        else {
            $indexArtitle = $indexModel->artitleInfo();
            include VIEW_PATH."index.html";
        }
    }
}