<?php
	require_once ('class/email.class.php');
	//##########################################
	$smtpserver = "smtp.liuhaozhe.com";//SMTP服务器
	$smtpserverport =25;//SMTP服务器端口
	$smtpusermail = "admin@liuhaozhe.com";//SMTP服务器的用户邮箱
	$smtpemailto = "1824910921@qq.com";//发送给谁
	$smtpuser = "admin@liuhaozhe.com";//SMTP服务器的用户帐号
	$smtppass = "!@#123qwe";//SMTP服务器的用户密码
	$mailsubject = "ijquery.cn 测试邮件系统";//邮件主题
	$mailbody = "<h1> 这是一个测试程序 ijquery.cn </h1>";//邮件内容
	$mailtype = "TXT";//邮件格式（HTML/TXT）,TXT为文本邮件
	##########################################
	$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//这里面的一个true是表示使用身份验证,否则不使用身份验证.
	$smtp->debug = FALSE;//是否显示发送的调试信息
	$smtp->sendmail($smtpemailto, $smtpusermail, $mailsubject, $mailbody, $mailtype);
	
?>