<?php

namespace App\controllers;

use App\models\ModelAlcool;
use Src\Classes\ClassRender;

class ControllerAlcool extends ModelAlcool{

    public function __construct()
    { $render = new ClassRender();
      $render->setKeyWords('');
      $render->setDescription('');
      $render->setTitle('');
      $render->setDir('alcool');
      $render->renderLayout();
       
    }

    private $VAL;
    private function recValores()
    {
        if (isset($_POST['Valcool'])) {
            $this->VAL = filter_input(INPUT_POST, 'Valcool', FILTER_SANITIZE_SPECIAL_CHARS);
        }

        if ($_POST['tipo_v'] == 1) {
            $this->VAL = $this->VAL * 1000;
        }
    }

    public function Cadastrar(){
         $this->recValores();
         $this->CadastrarEstAlcool($this->VAL);

    }

    
}