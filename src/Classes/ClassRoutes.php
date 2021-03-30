<?php

namespace Src\Classes;
Class ClassRoutes{

    use \Src\traits\Urlparser;
    
private $_ROTA;


public function getRota(){

    $_URL = $this->parserURL();
    $_I = $_URL[0];
 #
    $this->_ROTA = array( 
      "" => "ControllerHome",
      "home" => "ControllerHome"

    );

    if(array_key_exists($_I, $this->_ROTA)){ # Se existir na rota a url digitada
       if(file_exists(DIRREQ."app/controllers/{$this->_ROTA[$_I]}.php")){ # Se o arquivo existir no controller
           
       return $this->_ROTA[$_I];
    
    } else{
     
        return "ControllerHome";
    }#1FIMIF

    }else{ 
    
        return "ControllerErro"; 
    }#2FIMIF

}#FUNÇÃO



}#CLASS
?>