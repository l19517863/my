<?php
/**
 * Created by PhpStorm.
 * User: ÂÒÐò
 * Date: 2018/2/17
 * Time: 2:30
 */
class TagModel extends Model
{
    public function getTags(){
        $sql = "SELECT tid FROM tag_info";
        return $this->db->getAll($sql)[0];
    }
    public function getTagInfo(){
        $sql = "SELECT tag_name,tag_follow_num,tag_artitle_num,tag_cover_src FROM tag_Info WHERE tid={$_GET['tid']} LIMIT 20";
        return $this->db->getRow($sql)[0];
    }
    public function getTagArtitle(){
        $sql = "SELECT nickname,uid,avatar,aid,artitle_add_time,artitle_cover_src,artitle_title,artitle_content_short,artitle_read_num,artitle_commit_num,artitle_like_num,artitle_donate_num FROM artitle_info,user_info WHERE artitle_uid=uid and artitle_tag_id = {$_GET['tid']}";
        if($this->db->getAll($sql)!=null){
            return $this->db->getAll($sql)[0];
        }
    }
}