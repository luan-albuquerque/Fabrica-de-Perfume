<?php
namespace App;

use Src\Classes\ClassRoutes;

class Dispach extends ClassRoutes{

private $_method;
private $_param = [];
private $_obj;



public function __contruct(){

 self::addController();

}

public function addController(){
   
    $_RotaController = $this->getRota();
    $_NameController = "App\\Controllers\\{$_RotaController}";
          $this->_obj = new $_NameController;
    
          if(isset($this->parserURL()[1])){
             self::addMethod();
          }


}

public function addMethod(){

if(method_exists($this->_obj,$this->parserURL()[1])){

   

}
    
}




}

?>