<?php
include_once "conn.php";
include_once "function.php";
//判断是否传递过来pid值，如果不存在pid值，则不执行程序
if(!isset($_POST['pid']))return;
//调用函数，查询所有的省
$res = findAllByParentId($dbh,$_POST['pid']);
//把查询到的结果数组转换为json字符串，返回给客户端
echo json_encode($res);
?>