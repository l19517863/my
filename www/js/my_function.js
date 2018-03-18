// JavaScript Document

	//判断 奇数 与 偶数 ，奇数 返回 0 偶数 返回 1
function ifoushu(a){
	/*严格格式*/
	"use strict"; 
//	var a =3;

	if(a%2===0){
		
//		alert("为偶数");
		return 1;
	}
	else{
//		alert("为奇数");
		return 0;
		
	}
	
	
}
	// 是否为类水仙花
function if_flower(str){
	/*严格格式*/
	"use strict"; 

	/*方法重载  输入 Number  String ，使用 不同 的 方法 */
//		 alert(typeof(str));
	//var str;//储存 的 字符型 水仙数
	var sum=0;// 数值型 ：水仙花（花数，如 玫瑰花数） 每位数 的 相应 次方 的和  再判断 水仙数 str  是否 成立  ;

		str=String(str);//不管传入参数 是字符 还是数值  都转换成 字符型，再进行 运算


		var len=str.length;
//			document.write("下标输出:");
		for(var k=0;k<len;k++){
//				document.write(""+str[k]+"");
			sum+=Math.pow(str[k],len); 

		}
		if(sum===Number(str)){
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

		//返回一个随机数 数组
function someRandomNumArr(){
	/*严格格式*/
	"use strict"; 
	var arr=[];
	for(var i=0,j=1;i<5;i++,j+=2){

		arr.push(Math.round(Math.random()*99+1));//push  在 数组 前面 插入 
	}
	return arr;
}

//  sort  方法  的使用 函数参数 用于 number型排序
function forSortNum(a,b){
		/*严格格式*/
	"use strict"; 
	return a-b;
}
// 生成一个随机整数 [参数1,参数2]之间的
function someIntRandomAtoB(m,n){
	/*严格格式*/
	"use strict"; 

	var tem= Math.floor(Math.random()*(n-m+1))+m;

	return tem;

}
// 生成一个 长度为 n 的 [参数1,参数2]之间的 随机整数 数组  待
function someIntRandomAtoBArr(p,m,n){
	/*严格格式*/
	"use strict"; 
	
	var arr=[];
	for(var i=0,j=1;i<p;i++,j+=2){

		arr.push(Math.floor(Math.random()*(n-m+1))+m);//push  在 数组 前面 插入 
	}
	return arr;

}



	// 交换 变量 传入 实参
function swap(a , b){
	/*严格格式*/
	"use strict"; 
	var tem;
	tem=a;
	a=b;
	b=tem;
	
}
/*-------------一些 数学 判断----------------------------*/
		// 判断一个数是否素数(质素)返回 1   是  质素  返回  0  是 合数
	function isPrimeNumber(arr){
		
		/*严格格式*/
		"use strict"; 
		
		arr=Number(arr);
		
		if(arr===1){
			return 0;
		}
			
		for(var i=2;i<arr;i++){
			if(arr%i===0){
				return 0;
			}
				
		}
			

		return 1;
	}
/*-------DOM 操作--------------------------*/
function getObjById(str){
	"use strict";
	return document.getElementById(str);
}
function getObjsByTagName(str){
	"use strict";
	return document.getElementsByTagName(str);
}
function getObjsByName(str){
	"use strict";
	return document.getElementsByName(str);
}

/**/
	// 判断 后缀 名    判断 资源类型 
function str_LastType(str){
	"use strict";
	var loc=str.lastIndexOf(".");
	var a=str.substr(loc+1);
	return a;

}


















