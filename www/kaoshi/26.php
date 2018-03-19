<style>
span {
	font-size: 20px;
    color: aliceblue;
}
</style>
<?php
   $filePath = "./";
   $allowType=['html','php']; // 统计文件 的 类型
   $disDir = [];//排除的 文件夹
   echo "(".$filePath.")<br>";
   dirCodeCount(($filePath),0,0,$allowType);

function dirCodeCount($d,$maxdeep=0,$deep=0){
    $llqchar = "utf-8";
    $fwqchar = 'gbk';

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

        if(is_dir($path.iconv("{$llqchar}","{$fwqchar}",$file)) && !in_array($file,['global','Group-2'])){
            echo " <font color='red'>" .$file . "(".($deep) .")</font><br>"; // filename:
            dirCodeCount(dir($path.iconv("{$llqchar}","{$fwqchar}",$file)."/"),$maxdeep,$deep+1);
        }else {
            echo " " . $file . "<br>"; // filename:
        }

    } 
    $d->close();

    return ;
}

?>
