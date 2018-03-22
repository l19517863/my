<?php  
/* 接收请求的API */  
if($_POST){  
 echo '<pre>';  
 print_r($_POST);  
 print_r($_FILES);  
}else{  
 echo 'error';  
}  
?>