<?php
    include_once '../php/php2sql.php';

    $pdo=pdo_link();
   
   $id=$_GET['id'];
   echo $id;
    $sql="delete from books where id={$id}; ";
    $num = $pdo->exec($sql);// 发送 编码 指令
    
       if($num>0){
           echo "<script>alert('删除数据成功，影响{$num}条');location.href='index1.php';</script>";
       }
       else{

            echo "<script>alert('删除数句失败，影响{$num}条');location.href='index1.php';</script>";
            var_dump($num);

       }

?>
