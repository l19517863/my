<?php

    $file = $_GET['f'];
    header("Content-type:application/octet;stream");
    header("Content-disposition:attachment;filename=".$file);

    echo file_get_contents($file);









?>