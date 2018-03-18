<?php
/**
 * Created by PhpStorm.
 * User: ÂÒÐò
 * Date: 2018/2/18
 * Time: 0:53
 */
class ArtitleModel extends Model
{
    public function getArtitleDetail(){
        $aid = $_GET['aid'];
        $sql = "SELECT sex,username,artitle_word_num,artitle_read_num,artitle_commit_num,artitle_like_num,uid,nickname,avatar,artitle_title,artitle_tag_id,tag_name,user_introduction,artitle_content FROM artitle_info,tag_info,user_info WHERE artitle_tag_id=tid and artitle_uid=uid and aid={$aid}";
        return $this->db->getRow($sql)[0];
    }
}