<?php
include_once "./config/conn.php";

    $sql='show databases'; // 'show databases'
    $data = $pdo->query($sql);
    $info = $data->fetchAll(PDO::FETCH_ASSOC);
    var_dump($info);

    $sql='show tables'; // 'show tables'
    $data = $pdo->query($sql);
    $info = $data->fetchAll(PDO::FETCH_ASSOC);
    var_dump($info);

    $sql='desc books'; // 'desc'
    $data = $pdo->query($sql);
    $info = $data->fetchAll(PDO::FETCH_ASSOC);
    var_dump($info);

    $sql='select * from books'; // 'desc'
    $data = $pdo->query($sql);
    $info = $data->fetch(PDO::FETCH_ASSOC);
    var_dump($info);

    $sql="insert into bookdb.books (`name`, `sex`, `aaa`, `ccc`) VALUES ('a', '1', '2', '2')";
    $num = $pdo->exec($sql);
    if($num!=false){
        echo "插入成功<br>";
    }

    // pdo 预处理
    $sql="insert into ? (?,?,?,?) VALUES (?,?,?,?)";
    $stmt = $pdo->prepare($sql);
    $data=['bookdb.books',`name`, `sex`, `aaa`, `ccc`,'a', '1', '2', '2'];
    $num = $stmt->execute($data);
    if($num!=false){
        echo "预处理插入成功";
    }



    
