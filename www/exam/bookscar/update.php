<?php
	include_once '../php/php2sql.php';
	$pdo=pdo_link();
?>
<?php
$servername = "localhost"; 
$username = "root"; 
$password = "123qwe"; 
$dbname = "bookdb"; // 不马上use  库 则 为空 即可
	if(isset($_POST['flag'])){

		$bookname=$_POST['bookname'];
		$zuozhe=$_POST['zuozhe'];
        $press=$_POST['press'];
        $price=$_POST['price'];
		$count=$_POST['count'];
		

		var_dump($price);
		echo "<br>";
		 echo isset($price);
		 echo "<br>";

			
			
	
			pdo_update($pdo,'books',$bookname,$zuozhe,$press,$price,$count);




	}

?>