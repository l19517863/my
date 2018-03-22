<?php
/**
 * @author zhao jinhan
 * @email: xb_zjh@126.com
 * @url : www.icode100.com
 * @date : 2014年1月18日13:09:42
 * 
 */
header('Content-type:text/html; charset=utf-8');  //声明编码
//模拟POST上传图片和数据
//第一种方法：CURL
$ch = curl_init();
$url = 'http://www.test.localhost/fsocketget.php';
$curlPost = array('sid'=>1,'file'=>'@D:/xampp/htdocs/www/www.test.localhost/images/adding.gif');
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1); //POST提交
curl_setopt($ch, CURLOPT_POSTFIELDS,$curlPost);
$data =curl_exec($ch);
curl_close($ch);
echo '<pre>';
var_dump($data);
 
//第二种方法：fsockopen方法上传
 
$arr_data = array('sid'=>1,'mid'=>2);  //普通参数
$var_file='image';       //文件变量名
$file_type='image/jpeg'; //文件类型
$filepath = 'D:/xampp/htdocs/www/www.test.localhost/images/2.jpg'; //文件路径
$filestring = @file_get_contents($filepath) or exit('not found file ( '.$filepath.' )'); //生成文件流
$host = 'www.test.localhost';
 
 
 
//构造post请求的头
$boundary = substr(md5(time()),8,16);  //分隔符
$header  = "POST /fsocketget.php HTTP/1.1\r\n";//一般有post, get这两种
$header .= "Host: {$host}\r\n";
$header .= "Content-Type: multipart/form-data; boundary={$boundary}\r\n";
 
$data = "";
//请求普通数据
foreach($arr_data as $k=>$v){
 $data .= "--{$boundary}\r\n";
 $data .= "Content-Disposition: form-data; name=\"{$k}\"\r\n";
 $data .= "\r\n{$v}\r\n";
 $data .= "--{$boundary}\r\n";
}
//请求图片数据
$filename = basename($filepath); //文件名
$data .= "--{$boundary}\r\n";
$data .= "Content-Disposition: form-data; name=\"$var_file\"; filename=\"$filename\"\r\n";
$data .= "Content-Type: $file_type\r\n";  //\r\n不可少
$data .= "\r\n$filestring\r\n";           //\r\n不可少
$data .= "--{$boundary}\r\n";             //\r\n不可少
$header .= "Content-Length: ".strlen($data)."\r\n\r\n";   //\r\n不可少
 
//发送post的数据
$fp = fsockopen($host,80,$errno,$errstr,10) or exit($errstr."--->".$errno);
fputs($fp,$header.$data);
 
$inheader = 0;  //1去除请求包的头只显示页面的返回数据 0-保留头
while (!feof($fp)) {
 $line = fgets($fp,1024);
 if ($inheader && ($line == "\n" || $line == "\r\n")) {
  $inheader = 0;
 }
 if ($inheader == 0) {
  echo $line;
 }
}
 
fclose($fp);

?>