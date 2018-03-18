<?php
 try{
	$dbh = new PDO('mysql:host=localhost;dbname=czxy_2017_db','root','123');  
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
	$dbh->exec('set names utf8'); 
	
 }catch(PDOException $e){
 	
	 print "数据库连接出错!:".$e->getMessage()."<br/>";
	 die();
 }
 ?>
