<?php
namespace App;

use Src\Classes\ClassRoutes;

class Dispatch extends ClassRoutes{


private $_Method;
private $_Param = [];
public $_Obj;

#Get and Set 

protected function get_Method(){ return $this->_Method; }
public function set_Method($_Method){ return $this->_Method = $_Method; }

protected function get_Param(){ return $this->_Param; }
public function set_Param($_Param){ return $this->_Param = $_Param; }

public function __construct()
   {
       
   self::addController();

   }
   
private function addController(){
  
    $_RotaController = $this->getRota();
    $_NameController = "App\\controllers\\{$_RotaController}";
    $this->_Obj = new $_NameController;
    
        // if(isset($this->parserURL()[1])){
       //      self::addMethod();
       //   }


}
/*
private function addMethod(){

if(method_exists($this->_obj,$this->parserURL()[1])){

   

}
    
}*/
}
