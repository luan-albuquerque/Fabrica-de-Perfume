<?php

namespace App\controllers;

use App\models\ModelAgua;
use Src\Classes\ClassRender;

class ControllerAgua extends ModelAgua{

    public function __construct()
    { $render = new ClassRender();
      $render->setKeyWords('');
      $render->setDescription('');
      $render->setTitle('');
      $render->setDir('agua');
      $render->renderLayout();
       
    }
    private function recValores()
    {
        if (isset($_POST['id_cod'])) {
            $this->codEx = $_POST['id_cod'];
        }
        if (isset($_POST['Vagua'])) {
            $this->VA = filter_input(INPUT_POST, 'Vagua', FILTER_SANITIZE_SPECIAL_CHARS);
        }

        if ($_POST['tipo_v'] == 1) {
            $this->VA = $this->VA * 1000;
        }
    }

    public function Cadastrar()
    {
        $this->recValores();
        $this->CadastrarEstAgua($this->VA);
    }

    
}