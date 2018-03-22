<?php
class a{
    function __construct(){
        echo "echo class a something";
    }
}
class b extends a{
    function __construct(){
		// parent::__construct();
        echo "echo class b something";
    }
}
$a = new b();
?>