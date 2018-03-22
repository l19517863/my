<?php
	require './PHPMailer/class.phpmailer.php';
	$mail             = new PHPMailer();
	/*服务器相关信息*/
	$mail->IsSMTP();   //使用smtp方式发生邮件                     
	$mail->SMTPAuth   = true; //使用用户信息认证              
	$mail->Host       = 'smtp.163.com';//设置发件箱的smtp邮件服务器地址   	   
	$mail->Username   = 'l19517863';//用户名  		
	$mail->Password   = 'l18396315377';//密码 此密码时第三方的客户端密码
	/*内容信息*/
	$mail->IsHTML(true);
	$mail->CharSet    ="UTF-8";			
	$mail->From       = 'l19517863@163.com';	//发件箱 		
	$mail->FromName   ="postmaster";	//发件人的昵称
	$mail->Subject    = '您正在使用邮箱验证'; //主题
	$code = isset($_POST['code']) ? $_POST['code'] : 1234;
	$mail->MsgHTML("你的验证码是{$code},打死也不能告诉别人哦！");//具体邮件的正文
	$mail->AddAddress('785591860@qq.com');  //给指定的用户发送邮件
	$mail->AddAttachment("test.png"); //追加附件
	$res = $mail->Send();
	var_dump($res);
?>