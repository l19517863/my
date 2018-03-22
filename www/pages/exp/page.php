<?php 
	$p = isset($_GET['p'])?$_GET['p']:1;
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/kkpager.js"></script>
	<link rel="stylesheet" type="text/css" href="css/kkpager_blue.css" />
</head>
<body>
	<div style="width:800px;margin:0 auto;">
		<div id="kkpager"></div>
	</div>
</body>
</html>

<script type="text/javascript">
//init
$(function(){
	//生成分页
	var totalPage = 20;
	var totalRecords = 390;
	var pageNo = <?php echo $p; ?>;
	if(!pageNo){
		pageNo = 1;
	}
	//有些参数是可选的，比如lang，若不传有默认值
	kkpager.generPageHtml({
		pno : pageNo,
		//总页码
		total : totalPage,
		//总数据条数
		totalRecords : totalRecords,
		mode : 'click',//默认值是link，可选link或者click
		click : function(n){
			// do something
			location.href="page.php?p="+n;
			//手动选中按钮
			this.selectPage(n);
			return false;
		}
		/*
		,lang				: {
			firstPageText			: '首页',
			firstPageTipText		: '首页',
			lastPageText			: '尾页',
			lastPageTipText			: '尾页',
			prePageText				: '上一页',
			prePageTipText			: '上一页',
			nextPageText			: '下一页',
			nextPageTipText			: '下一页',
			totalPageBeforeText		: '共',
			totalPageAfterText		: '页',
			currPageBeforeText		: '当前第',
			currPageAfterText		: '页',
			totalInfoSplitStr		: '/',
			totalRecordsBeforeText	: '共',
			totalRecordsAfterText	: '条数据',
			gopageBeforeText		: ' 转到',
			gopageButtonOkText		: '确定',
			gopageAfterText			: '页',
			buttonTipBeforeText		: '第',
			buttonTipAfterText		: '页'
		}*/
	});
});
</script>