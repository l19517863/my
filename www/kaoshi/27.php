<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>上传图片</title>
</head>
<body>
    <form action="./php/upimg.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="flag" value="1">
        图片<input type="file" name="img1" id=""><br>
        <input type="hidden" name='MAX_FILE_SIZE'  value='2097152'>
        <br>
        <input type="submit" name="imgs" value="单图片">
	</form>
	
</body>
</html>