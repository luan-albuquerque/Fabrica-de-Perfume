<?php

namespace App\Models;

use App\models\ClassConexao;

class ModelPerfume extends ClassConexao
{

    private $db;

    protected function cadastrarPerfume($servdesc, $servcgl)
    {
        $this->db = $this->connectionMysql()
            ->prepare("INSERT INTO F_PERFUME VALUES(null,:dtreg,:key_frag,:volume)");
        $this->db->bindParam(":dtreg", date("Y-m-d"), \PDO::PARAM_STR);
        $this->db->bindParam(":key_frag", $key_frag, \PDO::PARAM_INT);
        $this->db->bindParam(":volume", $key_frag, \PDO::PARAM_STR);
        $this->db->execute();
    }

 protected function ListarPerfume()
    {
       $Bfetch = $this->db = $this->connectionMysql()
            ->prepare("SELECT * FROM perfume");
        $Bfetch->execute();
        $I = 0;
        while($Fetch = $Bfetch->fetch(\PDO::FETCH_ASSOC)){
            $ArrayList[$I] = [
            'COD' => $Fetch['id'],
            'REG' => $Fetch['dtregistro'],
             'ID_F' =>  $Fetch['id_frag'],
             'VF'  => $Fetch['volumeFra'],
             'VA'  => $Fetch['volumeAgua'],
             'VAL' => $Fetch['volumeAlcool']
            ];
            $I++;
        
        }
          if(isset($ArrayList)){
              return $ArrayList;
          } else{
              echo "Erro Retornar Lista";
          }
    
        }
}
