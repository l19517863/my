<?php
/**
 * Created by PhpStorm.
 * User: ÂÒÐò
 * Date: 2018/2/18
 * Time: 3:04
 */
class AjaxModel extends Model
{
    public function insertLike($aid,$uid){
        $sql = "INSERT INTO artitle_like(artitle_id,user_id) VALUES({$aid},{$uid})";
        return $this->db->exec($sql);
    }
    public function queryLike($aid,$uid){
        $sql = "SELECT * FROM artitle_like WHERE artitle_id={$aid} and user_id={$uid}";
        if($this->db->getRow($sql)!=null){
            return  $this->db->getRow($sql)[0];
        }
    }
    public function deleteLike($aid,$uid){
        $sql = "DELETE FROM artitle_like WHERE artitle_id={$aid} and user_id={$uid}";
        return $this->db->exec($sql);
    }
}