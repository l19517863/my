<?php

require_once "./class/Loader.class.php"; // 包含自动加载类  必须用 require 否则 不执行
Loader::$LoaderDir= "./class/";
spl_autoload_register("Loader::__autoload");
spl_autoload_register("Loader::other_");
spl_autoload_register("Loader::math_");
spl_autoload_register("Loader::final_");
spl_autoload_register("Loader::abstruct_");
spl_autoload_register("Loader::upfile_");
spl_autoload_register("Loader::GD_");

Captcha::img_EN();



?>