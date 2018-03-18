<?php
session_start();
include_once "./config/conn.php";
if(!isset($_SESSION['car_books']))
    $_SESSION['car_books']=[];// 初始化


if(isset($_POST["bookid"])){
    $bookid=$_POST["bookid"];
    $ac=$_POST["action"];

    if(!array_key_exists($bookid,$_SESSION['car_books']) && ($ac==1 || $ac==2)){
        // echo "创建书目";
        $_SESSION['car_books'][$bookid]=[];
        $_SESSION['car_books'][$bookid]['count']=1;
        
        $sql="select * from bookdb.books where id={$bookid}";
        // echo $sql;
        $bookdata=$pdo->query($sql);
        if($bookdata!=false){
            $bookinfo=$bookdata->fetch(PDO::FETCH_ASSOC);
            // var_dump($bookinfo);
            foreach ($bookinfo as $key => $value) {
                $_SESSION['car_books'][$bookid][$key]=$value;
            }
        }
            // 数据库  读取  追加 数据

    }else{

        // echo "存在键";
        // echo "动作".$ac;
        if($ac==4 && array_key_exists($bookid,$_SESSION['car_books'])){
            unset($_SESSION['car_books'][$bookid]);
            // echo "删除书目";
        }else if($ac==3 && array_key_exists($bookid,$_SESSION['car_books'])){

            if(--$_SESSION['car_books'][$bookid]['count']<=0){
                unset($_SESSION['car_books'][$bookid]);
                // echo "减删书目";
            }else {
                // echo "减少数量";
            }
                
        }else if($ac==2 || $ac==1){

            $_SESSION['car_books'][$bookid]['count']++;
            // echo "增加数量";
        }

    }

}
else{
    // echo "未收到";
}
echo json_encode($_SESSION['car_books']);
// var_dump($_SESSION['car_books']);

?>