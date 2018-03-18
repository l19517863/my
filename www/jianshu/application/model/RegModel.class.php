<?php
/**
 * Created by PhpStorm.
 * User: ÂÒĞò
 * Date: 2018/2/13
 * Time: 2:54
 */
class RegModel extends Model
{
    public function getNames(){
        $sql = "select username from user_info";
        return $this->db->getAll($sql);
    }
    public function insertUser($list){
        return $this->insert($list);
    }
}