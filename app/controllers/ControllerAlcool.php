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

    
}