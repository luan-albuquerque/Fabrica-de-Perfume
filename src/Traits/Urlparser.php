<?php

namespace Src\traits;

#Dividir a URL coletada  em um Array
trait Urlparser{ //Clase auxiliar pra evitar rp de codigo.

public function parserURL(){

    return explode("/", rtrim($_GET['url']),FILTER_SANITIZE_URL);

}

}

?>