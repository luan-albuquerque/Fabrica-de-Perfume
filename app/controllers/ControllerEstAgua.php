<?php

namespace App\controllers;

use App\models\ModelAgua;
use Src\Classes\ClassRender;

class ControllerEstAgua extends ModelAgua{

    public function __construct()
    { $render = new ClassRender();
      $render->setKeyWords('');
      $render->setDescription('');
      $render->setTitle('');
      $render->setDir('est_agua');
      $render->renderLayout();
       
    }

    
}