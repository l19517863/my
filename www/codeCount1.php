<?php

//    $filePath =getcwd()."\\";
    $count = 0;
   $filePath = "/";
   echo "(".$filePath.")<br>";
   $allowType=['html','php'];
   dirCodeCount(dir($filePath),0,0,$allowType);
function dirCodeCount($d,$maxdeep=0,$deep=0,$allowFileType=['html','php']){
    $handle = $d->handle;
    $path = $d->path;
    if($maxdeep > 0 && $deep>=$maxdeep)
        return ;
    while (($dfile = $d->read()) !== false){
        $file = iconv("gbk",'utf-8',$dfile);
        if($file == '.' or $file =='..')
        continue;
       
        for ($i=0; $i < $deep; $i++) { 
            echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        }
            // var_dump($path);
            // var_dump($file);
        if(is_dir($path.iconv("utf-8",'gbk',$file))){
            echo "filename: <font color='red'>(".($deep) .")" .$file . "</font><br>";
            dirCodeCount(dir($path.iconv("utf-8",'gbk',$file)."/"),$maxdeep,$deep+1,$allowFileType);
        }else {
            echo "filename: " . $file . "<br>";
            // echo $path.$file."()<br>";
            $filetype = pathinfo($path.$dfile,PATHINFO_EXTENSION);
            // var_dump($filetype);
            // var_dump($allowFileType);
            if(in_array($filetype,$allowFileType)){
                // echo "复合条件".$filetype."<br>";
                $handle = fopen($path.$dfile,'r');
                    $temCount=0;
                    while ($str=fgets($handle)) {
                        // if(trim($str)!="")
                            $temCount++;
                    }
                    global $count;
                    $count+=$temCount;
                    
                fclose($handle);
                echo iconv("gbk",'utf-8',$path).$file.":".$temCount."<br>";
            }

        }

    } 
    $d->close();
    
    return ;
}
echo $count;


?>