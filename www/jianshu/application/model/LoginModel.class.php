<?php
/**
 * Created by PhpStorm.
 * User: ÂÒÐò
 * Date: 2018/2/13
 * Time: 17:18
 */
class LoginModel extends Model {
    public function getPassword($username) {
        $sql = "SELECT password FROM user_info WHERE username = '{$username}'";
        return $this->db->getRow($sql)[0];
    }
    public function getUsers(){
        $sql = "SELECT username FROM user_info";
        return $this->db->getAll($sql)[0];
    }
}