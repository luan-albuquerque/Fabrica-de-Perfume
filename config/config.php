<?php
$_pasta_interna = "";


define('DIRPAGE',"http://{$_SERVER['HTTP_HOST']}/{$_pasta_interna}");


if(substr($_SERVER['DOCUMENT_ROOT'],-1) == "/"){
         define('DIRREQ', "{$_SERVER['DOCUMENT_ROOT']}{$_pasta_interna}");
}else{
         define("DIRREQ", "{$_SERVER['DOCUMENT_ROOT']}s/{$_pasta_interna}"); 
}



define('DIRCSS', "http://{$_SERVER['HTTP_HOST']}/{$PastaInterna}public/css/");
define('DIRJS', "http://{$_SERVER['HTTP_HOST']}/{$PastaInterna}public/js/");

define('DIRTHEME', "http://{$_SERVER['HTTP_HOST']}/{$PastaInterna}public/theme/");
define('DIRBOOTSTRAP', "http://{$_SERVER['HTTP_HOST']}/{$PastaInterna}public/bootstrap/");

define('HOST', 'localhost');
define('USER', 'luans');
define('PASS', "123");
define('DB', 'F_PERFUME');


?>
