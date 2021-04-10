<?php

namespace App\controllers;

use App\models\ModelFragancia;
use Src\Classes\ClassRender;

class ControllerFragancia extends ModelFragancia
{

   public function __construct()
   {
        $render = new ClassRender();
        $render->setKeyWords('');
        $render->setDescription('');
        $render->setTitle('');
        $render->setDir('fragancia');
        $render->renderLayout();
         
      }
      public function ListarSelectFrag(){

        return $this->ListarFrag();
    }
}