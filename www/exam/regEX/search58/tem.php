<?php
include_once "./config/conn.php";

        $sql ="insert into list_url (url,page) values(:u,:p)";
        $data[':u'] = "www.a.com";
        $data[':p'] = 2;
        $pdo2 = $pdo->prepare($sql);
        $num = $pdo2 ->execute($data);
        








?>