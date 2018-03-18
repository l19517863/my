<?php
/**
 * Created by PhpStorm.
 * User: ÂÒÐò
 * Date: 2018/2/17
 * Time: 2:22
 */
class UserModel extends Model
{
    public function getUser(){
        $sql = "SELECT uid FROM user_info";
        return $this->db->getAll($sql)[0];
    }
    public function getUserInfo(){
            $uid = $_GET['uid'];
            $sql = "SELECT nickname,avatar,sex,user_follow_num,user_fans_num,user_artitle_num,user_words_num,user_getlike_num,user_introduction FROM user_info WHERE uid={$uid}";
            return $this->db->getRow($sql)[0];
    }
    public function getUserArtitleInfo(){
            $uid = $_GET['uid'];
            $sql = "SELECT aid,artitle_title,artitle_content_short,artitle_add_time,artitle_read_num,artitle_commit_num,artitle_like_num FROM artitle_info WHERE artitle_uid={$uid} LIMIT 20";
            if($this->db->getALL($sql)!=null){
                return $this->db->getAll($sql)[0];
            }
    }
}