<?php
header('Access-Control-Allow-Origin: *');
$str = "&nbsp;".date('Y-m-d h:m:s')." ";
echo $str.$_POST['contentStr'];
 ?>