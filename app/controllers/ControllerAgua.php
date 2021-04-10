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

    
}