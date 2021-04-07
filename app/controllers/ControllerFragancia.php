<?php

namespace App\controllers;

use App\models\ModelFragancia;

class ControllerFragancia extends ModelFragancia
{

public function ListarSelectFrag(){

    return $this->ListarFrag();
}

}