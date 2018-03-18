<?php   


function myTest()
{
    static $x=0;
    echo "<script>alert({$x})</script>";
    $x++;
    if($x>4)
        return ;
    myTest();

}

    $d = "ss./";
  echo substr($d,-1);
//   var_dump( gettype(dir('aaa')));
//   var_dump( gettype("aaa"));


?>