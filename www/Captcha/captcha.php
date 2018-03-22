<?php 
	//引入类文件
	require_once "Captcha.class.php";
	//验证码类的用法
	//1、导入验证码的类
	//2、通过类名调用静态方法 zh_captcha 中文验证码  en_captcha英文验证码
	//3、服务器 1)session_start()    2)通过 $_SESSION['validateCode'];
	Captcha::en_captcha(4,20,108,35);
?>