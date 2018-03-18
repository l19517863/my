<?php


	//判断 奇数 与 偶数 ，奇数 返回 0 偶数 返回 1
function ifoushu($a){
	/*严格格式*/
	"use strict"; 
    //	var a =3;

	if($a%2===0){
        
    //		alert("为偶数");
		return 1;
	}
	else{
    //		alert("为奇数");
		return 0;
		
	}
	
	function a(){
		
	}
}

//增强版的path_info
function path_info($filepath)   
{   
    $path_parts = array();   
    $path_parts ['dirname'] = rtrim(substr($filepath, 0, strrpos($filepath, '/')),"/")."/";   
    $path_parts ['basename'] = ltrim(substr($filepath, strrpos($filepath, '/')),"/");   
    $path_parts ['extension'] = substr(strrchr($filepath, '.'), 1);   
    $path_parts ['filename'] = ltrim(substr($path_parts ['basename'], 0, strrpos($path_parts ['basename'], '.')),"/");   
    return $path_parts;
}

	// 是否为类水仙花
function if_flower($str){
	/*严格格式*/
	"use strict"; 

	/*方法重载  输入 Number  String ，使用 不同 的 方法 */
    //		 alert(typeof(str));
	//var str;//储存 的 字符型 水仙数
	$sum=0;// 数值型 ：水仙花（花数，如 玫瑰花数） 每位数 的 相应 次方 的和  再判断 水仙数 str  是否 成立  ;

		$str=(string)($str);//不管传入参数 是字符 还是数值  都转换成 字符型，再进行 运算


        $len=strlen($str);
        //echo $len;
        //			document.write("下标输出:");
		for($k=0;$k<$len;$k++){
    //				document.write(""+str[k]+"");
			$sum+=pow($str[$k],$len); 

		}
		if($sum==$str){
    //				alert("是水仙花或水鲜花");
    //				document.write(" 是水仙花或类水仙花");
			return 1;// 是 花数 返回 1

		}
		else{
    //				alert("不是水仙花或类水仙花");
    //				document.write(" 不是水仙花或类水仙花<br>");
			return 0;//不是 花 数 返回 0
		}

}

	// 交换 变量 传入地址
function swap(&$a , &$b){
	/*严格格式*/
	"use strict"; 
	$tem;
	$tem=$a;
	$a=$b;
	$b=$tem;
	
}

function microtime_float(){

	$time=microtime();
	list($msec,$sec)=explode(" ",$time);

	return $sec+$msec;


}
	// 判断 后缀 名    判断 资源类型 
function str_LastType($str,$boo=false){
	"use strict";
	if($boo)
	return substr($str,strrpos($str,"."));

	return substr($str,strrpos($str,".")+1);

}
	// 再字符串中中查找 所有 字符串，返回数组 0个数，之后 索引存放位置
function strAllops($str,$str1,$boo=true){

		//$str=explode($str);
		//echo $str;
	// boo  是否大小写  //  待完成
		$count=[0];
	for($i=0,$j=1;$i<strlen($str);$i++){

		if($str[$i]==$str1){
			$count[0]++;
			$count[$j++]=$i;//     //用 each()???  拓展
		}
			
	}

	return $count;

}

	// 1 不是质数 也不是 合数。
function isPrimeNumber($arr,$boo=true){
		
		/*严格格式*/
		
		$arr=(int)$arr;
	if($boo){
		if($arr===1){
			return 0;
		}
			
		for($i=2;$i<$arr;$i++){
			if($arr%$i===0){
				return 0;
			}
				
		}
	
		return 1;
	}
	else{

		if($arr===1){
			return 0;
		}
			
		for($i=2;$i<$arr;$i++){
			if($arr%$i===0){
				return 1;
			}	
		}
		return 0;
	}
}

function findPart($arr,$num=false){
    // 查找数组(以、已排序), 查找数
    	echo "二分（折半）查找<br>";
// $arr=array(1,2,3,4,5,6,7,8,9,10);//  不能 重复
print_r($arr);
if($num==false)
$num=$arr[rand(0,count($arr)-1)];//  从数组中 随机 娶一个 数 ;
// $min=0;$max=$arr[count($arr)-1];
    
// $num=rand(0,120);// 设置范围,允许找不到
$min=-1;$max=count($arr);
echo "随机查找：".$num.'<br>';

$time=1;

while($min!=$max){
    
    $point=floor(($min+$max)/2);//
    echo $min.','.$max.",".floor(($min+$max)/2)."<br>";
	if($arr[$point]<$num)
		$min=$point;
	if($arr[$point]>$num)
		$max=$point;
	
	if($num==$arr[$point]){
        echo '查找'.$time."次,找到".$num."下标为".$point."<br>";
		break;
	}
	$time++;
    
    if($max-$min<=1){
        echo "未找到".$num;
        return 0;
    }
		
}

}
function someRandNumArr($tot=10,$min=0,$max=100){

    $arr=[];
    for($i=0;$i<$tot;$i++){

        $arr[]=rand($min,$max);//push  在 数组 前面 插入 
    }
    return $arr;
}

	//表单 name , 允许类型 ， 保存路劲 默认 upload  是否 多文件 ，是否 保存为 随机名
function upfiles($post_name,$allow_type,$savedir="upload/",$ismany=0,$israndname=0){

	var_dump($_FILES[$post_name]);
	$aa=$_FILES[$post_name];//
	//$allow_type=array('jpeg','jpg','gif','png','bmp');// 添加 允许的  后缀
	//$savedir="upload/";// 存储的目录

	
		// 判断 单文件 还是 多文件
	if(!$ismany){
		echo "ismany flase";

		$filetype = pathinfo($aa['name'],PATHINFO_EXTENSION);	// 获取文件类型
		$filename = pathinfo($aa['name'],PATHINFO_FILENAME);		// 获取文件名
		// $filename = pathinfo(iconc("utf8",'gbk',$aa['name']),PATHINFO_FILENAME); //乱码使用
		
		if($aa['error']==0){
				// 获取后缀名
				//$lttype = pathinfo($fileArr['name'][$key],PATHINFO_EXTENSION);
				$filetype = pathinfo($aa['name'],PATHINFO_EXTENSION); // 文件类型
				$filename = pathinfo($aa['name'],PATHINFO_FILENAME); //文件名
				// iconv
				if(!$israndname){
					$filename = uniqid();
				}
				//print($lttype);
				if(in_array($filetype,$allow_type)){
						
					if(!file_exists($savedir)){
						mkdir($savedir);
						//判断目录 是否存在 不存在 创建 目录;
					}
					
						//.uniqid() 
					if(move_uploaded_file($aa["tmp_name"],$savedir.$filename.".".$filetype)){
						
						echo "上传成功:".$aa['error']."<br>";
						return $savedir.$filename.".".$filetype; // 返回 一个 文件名
					}
				
				}

			}
			else {
				echo "文件"."上传错误:".$aa['error']."<br>";
			}


	}else{


		  foreach ($aa['error'] as $key => $value) {
			if($value==0){
				// 获取后缀名
				//$lttype = pathinfo($fileArr['name'][$key],PATHINFO_EXTENSION);
				$filetype = pathinfo($aa['name'][$key],PATHINFO_EXTENSION);
				$filename = pathinfo($aa['name'][$key],PATHINFO_FILENAME);
				//print($lttype);
				if(in_array($filetype,$allow_type)){
						
					if(!file_exists($savedir)){
						mkdir($savedir);
						//判断目录 是否存在 不存在 创建 目录;
					}
					
						//.uniqid() 
					if(move_uploaded_file($aa["tmp_name"][$key],$savedir.$filename.".".$filetype)){
						echo "第".($key+1)."文件"."上传成功:".$value."<br>";
					}
				}
			}
			else{
				echo "第".($key+1)."文件"."上传错误:".$value."<br>";
			}
		}
	}
}








?>