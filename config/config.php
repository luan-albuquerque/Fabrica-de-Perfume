<?php
$_pasta_interna = "";

# DIRPAGE - LOCALIZAÇÃO DE DA PAGINA
define('DIRPAGE',"http://{$_SERVER['HTTP_HOST']}/{$_pasta_interna}");

# DIRREQ - LOCALIZAÇÃO DOS ARQUIVOS
if(substr($_SERVER['DOCUMENT_ROOT'],-1) == "/"){
         define('DIRREQ', "{$_SERVER['DOCUMENT_ROOT']}{$_pasta_interna}");
}else{
         define("DIRREQ", "{$_SERVER['DOCUMENT_ROOT']}s/{$_pasta_interna}"); 
}




?>
