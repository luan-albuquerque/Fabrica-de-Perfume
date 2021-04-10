<?php
namespace App\models;

use App\models\ClassConexao;

class ModelFragancia extends ClassConexao{


protected function ListarFrag(){

   $BFetch = $this->connectionMysql()
   ->prepare("SELECT * FROM fragancia");
   $BFetch->execute();
   $I =0;
   while($Fetch = $BFetch->Fetch(\PDO::FETCH_ASSOC)){
   $ArrayList[$I] = [
       'COD' => $Fetch['id'],
       'DESC' => $Fetch['descr']
    ]; 
    $I++;
}

       return $ArrayList;
 

}



}

?>