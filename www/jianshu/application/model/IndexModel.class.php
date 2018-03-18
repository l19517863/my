<?php
/**
 * Created by PhpStorm.
 * User: ÂÒÐò
 * Date: 2018/2/14
 * Time: 2:22
 */
class IndexModel extends Model {
    public function avatar() {
        if(isset($_SESSION['username'])){
            $sql = "SELECT uid,avatar FROM user_info WHERE username='{$_SESSION['username']}'";
            return $this->db->getRow($sql)[0];
        }
    }
    public function tagInfo() {
        $sql = "SELECT tid,tag_name,tag_cover_src FROM tag_info LIMIT 7";
        return $this->db->getAll($sql)[0];
    }
    public function artitleInfo() {
        $sql = "SELECT aid,artitle_uid,artitle_tag_id,artitle_title,artitle_content_short,artitle_add_time,artitle_read_num,artitle_like_num,artitle_commit_num,artitle_cover_src,tid,tag_name,uid,nickname,avatar FROM artitle_info,tag_info,user_info WHERE artitle_tag_id=tid and artitle_uid=uid ORDER BY artitle_add_time DESC LIMIT 20";
        return $this->db->getAll($sql)[0];
    }
    public function searchArtitleInfo($key){
        $sql = "SELECT aid,artitle_uid,artitle_tag_id,artitle_title,artitle_content_short,artitle_add_time,artitle_read_num,artitle_like_num,artitle_commit_num,artitle_cover_src,tid,tag_name,uid,nickname,avatar FROM artitle_info,tag_info,user_info WHERE artitle_tag_id=tid and artitle_uid=uid and artitle_title LIKE '%{$key}%' OR artitle_tag_id=tid and artitle_uid=uid and artitle_content LIKE '%{$key}%' OR artitle_tag_id=tid and artitle_uid=uid and nickname LIKE '%{$key}%' ORDER BY artitle_add_time DESC LIMIT 20";
        if($this->db->getAll($sql)!=null){
            return $this->db->getAll($sql)[0];
        }
    }
}