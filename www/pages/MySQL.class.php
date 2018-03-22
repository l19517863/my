<?php 

	/*
	
	类名：MySQL
	属性：
		主机名称    $host
		数据库用户  $user
		数据库密码  $pwd 
		数据库名   $dbname;
		字符编码   $charset
		数据库对象 $pdo

    方法：

    	构造方法,用来连接数据库,需要传入一些参数
		exec($sql,data)  执行sql，返回影响行数
		findAll($sql,data) 查询所有数据
		getRow($sql,data)  查询并且返回一行数据
		getFirstFeild($sql,data) 获取查询结果的第一行第一列
		析构方法，用来把$pdo 释放掉

	 */ 

	class MySQL {


	// 属性：
	// 	主机名称    $host
		var $host;
	// 	数据库用户  $user
		var $user;
	// 	数据库密码  $pwd 
		var $pwd;
	// 	数据库名   $dbname;
		var $dbname;
	// 	字符编码   $charset
		var $charset;
	// 	数据库对象 $pdo
		var $pdo;

  //   方法：

  //   	构造方法,用来连接数据库,需要传入一些参数
    	function __construct($host,$user,$pwd,$dbname,$charset='utf8'){
    		//给对象属性赋值
    		$this->host = $host;
    		$this->user = $user;
    		$this->pwd = $pwd;
    		$this->dbname = $dbname;
    		$this->charset = $charset;

    		try{
	    		//通过pdo创建数据库连接
	    		$this->pdo = new PDO("mysql:host={$host};dbname={$dbname}",$user,$pwd);
	    		//设置编码
	    		$this->pdo->exec("set names {$charset}");
	    		//设置出现异常的解决办法
				$this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    		}catch(PDOException $e){
    			echo "mysql connection fail. ".$e->getMessage();
    		}

    	}
		// exec($sql,data)  执行sql，返回影响行数
		function exec($sql,$data=[]){

			//进行sql的预处理
			//stmt ---> PDOStatement
			$stmt = $this->pdo->prepare($sql);
			//绑定数据并且执行
			return $stmt->execute($data);

		}
		// findAll($sql,data) 查询所有数据
		function findAll($sql,$data=[]){

			//进行sql的预处理
			//stmt ---> PDOStatement
			$stmt = $this->pdo->prepare($sql);
			//定义一个空数组
			$arr = array();
			//绑定数据并且执行
			if($stmt->execute($data)){

				//取出查询的结果
				$arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
			//返回查询的结果集
			return $arr;
		}
		// getRow($sql,data)  查询并且返回一行数据
		function getRow($sql,$data=[]){

			//进行sql的预处理
			//stmt ---> PDOStatement
			$stmt = $this->pdo->prepare($sql);
			//定义一个空数组
			$arr = array();
			//绑定数据并且执行
			if($stmt->execute($data)){

				//取出查询的结果
				$arr = $stmt->fetch(PDO::FETCH_ASSOC);
			}
			//返回查询的结果集
			return $arr;
		}		
		// getFirstFeild($sql,data) 获取查询结果的第一行第一列
		function getFirstFeild($sql,$data=[]){

			//进行sql的预处理
			//stmt ---> PDOStatement
			$stmt = $this->pdo->prepare($sql);
			//定义一个空数组
			$arr = array();
			//绑定数据并且执行
			if($stmt->execute($data)){

				//取出查询的结果
				//FETCH_NUM 以索引的方式返回记录
				$arr = $stmt->fetch(PDO::FETCH_NUM);
			}
			//返回查询的结果集
			return $arr[0];
		}		


		// 析构方法，用来把$pdo 释放掉
    	function __destruct(){

    		//把当前的属性（对象）释放掉
    		$this->pdo = null;
    	}


	}




 ?>