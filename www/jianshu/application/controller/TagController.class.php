<?php
/**
 * Created by PhpStorm.
 * User: ÂÒĞò
 * Date: 2018/2/17
 * Time: 2:29
 */
class TagController extends Controller
{
    public function index(){
            if($_GET['tid']){
            session_start();
            $this->headBar();
            $uid = $this->uid;
            $uavatar = $this->uavatar;
            $tagModel = new TagModel("user_info");
            $tagInfo = $tagModel->getTagInfo();
            $tagArtitleInfo = $tagModel->getTagArtitle();
            $tags = $tagModel->getTags();
            $tagArr = array();
            foreach ($tags as $item){
                $tagArr[] = $item['tid'];
            }
            if(in_array($_GET['tid'],$tagArr)) {
                include VIEW_PATH . "tag.html";
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