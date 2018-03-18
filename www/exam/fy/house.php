
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="./js/jquery-3.2.1.min.js"></script>
    <style>
        table {
            font-size: 16px;
            color: #666;
            width: 1200px;
            margin: 0px auto;
            text-align: center;
            border-collapse: collapse;
        }

        th,td {
            border: 1px solid #999;
        }

        tr:nth-child(even) {
            background-color: #FFFFCC;
        }
        .pagenumb.cur {
    color: red;
}
    </style>
        <script>
        $(function(){
            searchAndfy(1,'');
            function searchAndfy(p,keyword){
			$.ajax({
              type: "POST",
			  url: "./php/get.php",
			  data:{'p':p,'keyword':keyword} , // p 页码 keyword 搜索关键字
			  // 序列化表单值  ('#new_user').serializeArray()
              async: true,
              error: function (request) {
                alert("Connection error");
              },
              success: function (data) {
                        $("#main").html(data);
				
			    }
				
            });

		}


        })
    </script>
</head>
<body>
    
    

        <div id="main">ss</div>
    


</body>
</html>