<?php
$_pasta_interna = "";


define('DIRPAGE',"http://{$_SERVER['HTTP_HOST']}/{$_pasta_interna}");


if(substr($_SERVER['DOCUMENT_ROOT'],-1) == "/"){
         define('DIRREQ', "{$_SERVER['DOCUMENT_ROOT']}{$_pasta_interna}");
}else{
         define("DIRREQ", "{$_SERVER['DOCUMENT_ROOT']}s/{$_pasta_interna}"); 
}

define('HOST', 'localhost');
define('USER', 'root');
define('PASS', "");
define('DB', 'F_PERFUME');


?>
