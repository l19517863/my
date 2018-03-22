<?php 

	//分页的类
	class Page{

		//最核心的
		//1）返回 limit m,n  字符串
		//2）返回 分页页码的字符串

		// makePage
		// 参数1) 总的记录数
		// 参数2) 每页显示的大小(条数)
		// 
		public static function makePage($rowCount,$pageSize){

			//1、根据总记录数和每页大小，计算总的页数
			$pages = ceil($rowCount / $pageSize);

			//2、接收当前页，并且判断当前页是否>0
			//   $_GET['p']
			$p = isset($_GET['p']) && $_GET['p']>0 ? $_GET['p'] : 1 ;

			//3、拼接limit字符串
			//   limit (当前页-1)*每页大小,每页大小
			$limtStr = " limit ".($p-1)*$pageSize." , ".$pageSize." ";

			//http://www.a.com/phpday11/pages/test.php?a=aaa&b=bbb&flag=1&p=3
			//http://www.a.com/phpday11/pages/test.php?p=3
			
			// ?   a=aaa&b=bbb&flag=1&     p=3
			var_dump($_GET);
			$pageStr = "<div class='pagelist'>";
			if($pages>0){

				//判断get中是否有参数
				$old = "";
				//先把p删除
				unset($_GET['p']);

				if(count($_GET)){
					//如过有参数，开始循环，拼接字符串
					//a=aaa&b=bbb&flag=1&
					foreach ($_GET as $key => $value) {
						$old .= $key."=".$value."&";
					}

				}

				//4、生成分页的代码
				//                a=aaa&b=bbb&flag=1&
				$pageStr .="<a href='?{$old}p=1'>首页</a>";
				$pageStr .="<a href='?{$old}p=3'>上一页</a>";


				$pageStr .="<a href='?{$old}p=3'>下一页</a>";
				$pageStr .="<a href='?{$old}p=".$pages."'>末页</a>";
				

			}else {
				$pageStr .= "暂无数据...";
			}

			
			$pageStr .= "</div>";

			//把字符串放到数组中
			$arr['limit'] = $limtStr;
			$arr['pageStr'] = $pageStr;

			return $arr;

		}


	}



 ?>
