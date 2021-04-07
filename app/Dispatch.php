<?php
namespace App;

use Src\Classes\ClassRoutes;

class Dispatch extends ClassRoutes{

private $MetodoExecutavel;
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

private function addController()
{

    $_RotaController = $this->getRota();
    $_NameController = "App\\controllers\\{$_RotaController}";
    $this->_Obj = new $_NameController;

    if (isset($this->parserURL()[1])) {
        self::addMethod();
    }
}

private function controleDeMetodos()
{

    $this->MetodoExecutavel = array(
        "Cadastrar-Perfume" => "Cadastrar"

    );

    return $this->MetodoExecutavel;
}
//URL AMIGAVEL CONTROLADA
private function addMethod()
{
    $URL = $this->parserURL();

//Se houver uma ação deum formulario ou ser digitado na URL dentro do array, Entra!!!
    if (array_key_exists($URL[1], $this->controleDeMetodos())) {

        //Se houver um valor da chave do array dentro da Classe como metodo, Entra !!!
        if (method_exists($this->_Obj, $this->controleDeMetodos()[$URL[1]])) {

            $this->set_Method($this->controleDeMetodos()[$URL[1]]);

            call_user_func_array([$this->_Obj, $this->get_Method()], $this->get_Param());
        } else {
            echo " Metodo não encontrado !!";
        }
    } else {
        echo "Erro no Array de Metodos";
    }
}
}
