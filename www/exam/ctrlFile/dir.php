<?php

//    $filePath = dir(getcwd());
   $filePath = "./";
   echo "(".$filePath.")<br>";
   thisdirAll(dir($filePath));
function thisdirAll($d,$maxdeep=0,$deep=0){
    $handle = $d->handle;
    $path = $d->path;
    if($maxdeep > 0 && $deep>=$maxdeep)
        return ;
    while (($file = $d->read()) !== false){
        $file = iconv("gbk",'utf-8',$file);
        if($file == '.' or $file =='..')
        continue;
       
        // var_dump($num);
        for ($i=0; $i < $deep; $i++) { 
            echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        }
        
        if(is_dir($path.$file)){
            echo "filename: <font color='red'>(".($deep) .")" .$file . "</font><br>";
            thisdirAll(dir($path.$file."/"),$maxdeep,$deep+1);
        }else {
            echo "filename: " . $file . "<br>";
        }

    } 
    $d->close();

}


?>