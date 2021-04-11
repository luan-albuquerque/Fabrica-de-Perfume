<?php

namespace App\controllers;


use App\models\ModelFragancia;
use Src\Classes\ClassRender;

class ControllerEstFrag extends ModelFragancia{

    public function __construct()
    { $render = new ClassRender();
      $render->setKeyWords('');
      $render->setDescription('');
      $render->setTitle('');
      $render->setDir('est_frag');
      $render->renderLayout();
       
    }

    
}