<style>
div {

    margin-top:20px;
	display: inline-block;
	width: 100%;
	height: 50px;
	line-height: 50px;
	text-align: center;
	background-color: cadetblue;
	box-shadow: 0px 2px 10px cadetblue;
    font-size: 48px;
    color:currentColor;
}
.div1 {
	position: relative;
	left: 0;
}
.div2 {
	position: relative;
	left: 0;
}
span {
	font-size: 20px;
    color: aliceblue;
}
.span1{
    
}
.span2{
    
}
</style>
<?php


//    $filePath =getcwd()."\\";
    $lineCount_global = 0;
    $fileCount_global = 0;
   $filePath = "../";
   
   $allowType=['html','php']; // 统计文件 的 类型
   $disDir = [];//排除的 文件夹
   dirCodeCount(($filePath),0,0,$allowType);

   echo "(".$filePath.")<br>";
function dirCodeCount($d,$maxdeep=0,$deep=0,$allowFileType=['html','php']){
        $llqchar = "utf-8";
    $fwqchar = 'gbk';
    static $lineCount=0; // 记录代码 行数
    static $fileCount=0; // 记录文件 个数
    static $dirCount=0; // 记录文件夹 个数

    if(gettype($d)==='string'){
        if(substr($d,-1)=='/'){
            $d = dir(iconv("{$llqchar}","{$fwqchar}",$d)); //
        }else {
            $d = dir(iconv("{$llqchar}","{$fwqchar}",$d)."/");
        }
    }
        

    $handle = $d->handle;
    $path = $d->path;
    if($maxdeep > 0 && $deep>=$maxdeep)
        return ;
    while (($dfile = $d->read()) !== false){
        $file = iconv("{$fwqchar}","{$llqchar}",$dfile);
        if($file == '.' or $file =='..')
        continue;
       
        for ($i=0; $i < $deep; $i++) {
            echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        }
            // var_dump($path);
            // var_dump($file);
        if(is_dir($path.iconv("{$llqchar}","{$fwqchar}",$file)) && !in_array($file,['global','Group-2'])){
            echo " <font color='red'>" .$file . "(".($deep) .")</font><br>"; // filename:
            dirCodeCount(dir($path.iconv("{$llqchar}","{$fwqchar}",$file)."/"),$maxdeep,$deep+1,$allowFileType);
        }else {
            echo " " . $file . "<br>"; // filename:
            // echo $path.$file."()<br>";
            $filetype = pathinfo($path.$dfile,PATHINFO_EXTENSION);
            // var_dump($filetype);
            // var_dump($allowFileType);
            if(in_array($filetype,$allowFileType)){
                // echo "复合条件".$filetype."<br>";
                $handle = fopen($path.$dfile,'r');
                    $temCount=0;
                    while ($str=fgets($handle)) {
                        if(trim($str)!="")
                            $temCount++;
                    }
                    
                    
                    $fileCount++;
                    $lineCount+=$temCount;
                    
                fclose($handle);
                echo iconv("{$fwqchar}","{$llqchar}",$path).$file.":".$temCount."<br>";
            }
            

        }

    } 
    $d->close();

    global $lineCount_global;
    global $fileCount_global;
    
    $fileCount_global = $fileCount;
    $lineCount_global = $lineCount;
    
    return ;
}
echo "<div class='div2'><span class='span2'>{$allowType[0]},{$allowType[1]}文件共计</span>".$fileCount_global."<span class='span2'>个</span></div>";
echo "<div class='div1'><span class='span1'>{$allowType[0]},{$allowType[1]}代码共计</span>".$lineCount_global."<span class='span2'>行</span></div>"."<br>";


?>
