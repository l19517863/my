<?php
 try{
	$dbh = new PDO('mysql:host=localhost;dbname=mydb1','root','123qwe');  
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
	$dbh->exec('set names utf8'); 
	
 }catch(PDOException $e){
 	
	 print "数据库连接出错!:".$e->getMessage()."<br/>";
	 die();
 }
 ?>
