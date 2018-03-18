<?php
if(isset($_COOKIE['uname']) && isset($_COOKIE['pwd']) ){
    if($_COOKIE['pwd']==666666 && $_COOKIE['uname']=='admin')
    echo "<script>alert('登良成功,正在跳转');location.href='b.html';</script>";
}

if(isset($_POST['user']['name'])){
    if($_POST['user']['name']=='admin' && $_POST['user']['password']==666666){
        setcookie('uname',$_POST['user']['name'],0);
        setcookie('pwd',$_POST['user']['password'],time()+$_POST['retime']);
        echo "<script>alert('登良成功,正在跳转');location.href='b.html';</script>";
    }
    
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
        <form action="" method="post">
        
            <input type="text" name="user[name]" value=''>账号
            <input type="password" name="user[password]" value=''>密码
            <input type="radio" name="retime" value="0" checked="checked">不记住
            <input type="radio" name="retime" value="604800">一周
            <input type="radio" name="retime" value="2592000">一月
            <input type="submit" value="提交">
        </form>
</body>
</html>