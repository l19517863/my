<?php
include_once "../config/conn.php";
if(isset($_GET['keyw']) or 1){
    $keyw = $_GET['keyw'];
    // $keyw = "男";
    $arr = preg_split ("//u", $keyw,-1,PREG_SPLIT_NO_EMPTY);

    $like="%";
    foreach ($arr as $key => $value) {
        $like.=$value."%";
    }
    $sql = "select * from product where 1 and pname like ? or pinyin like ?";
    // $sql = "select * from product where 1 and pname like :k1 or "; 占位符
    $data[]=$like;
    $data[]=$like;
    $query_pdo = $pdo->prepare($sql);
    $query_pdo->execute($data);
    $query_pdo->setFetchMode(PDO::FETCH_ASSOC);//PDO::FETCH_ASSOC
    $info = $query_pdo->fetchAll();
    // var_dump($query_pdo);
    // var_dump($info);
    // var_dump($data);
    echo json_encode($info);
}








?>
