<?php

namespace App\Models;

use App\models\ClassConexao;
use Exception;

class ModelPerfume extends ClassConexao
{

    private $db,$SELMAX;

    protected function cadastrarPerfume($VF, $VA, $VAL, $IDF, $VT)
    {

        $this->db = $this->connectionMysql()
            ->prepare("INSERT INTO perfume VALUES(null,:dtreg,:key_frag,$VF,$VA,$VAL,$VT)");
        $this->db->bindParam(":dtreg", date("Y-m-d"), \PDO::PARAM_STR);
        $this->db->bindParam(":key_frag", $IDF, \PDO::PARAM_INT);
        $this->db->execute();

        $this->SELMAX =$this->connectionMysql()->prepare(
            "SELECT  max(id_est) FROM est_agua"
        );
        $this->SELMAX->execute();
        ECHO $this->SELMAX->fetch(\PDO::FETCH_ASSOC);




    }

    protected function ListarPerfume()
    {
        $Bfetch = $this->db = $this->connectionMysql()
            ->prepare("SELECT * FROM perfume INNER JOIN fragancia ON perfume.id_frag=fragancia.id ORDER BY idperf DESC");
        $Bfetch->execute();
        $I = 0;
        while ($Fetch = $Bfetch->fetch(\PDO::FETCH_ASSOC)) {
            $ArrayList[$I] = [
                'COD' => $Fetch['idperf'],
                'REG' => $Fetch['dtregistro'],
                'ID_F' =>  $Fetch['id_frag'],
                'DESC' => $Fetch['name'],
                'VF'  => $Fetch['volumeFra'],
                'VA'  => $Fetch['volumeAgua'],
                'VAL' => $Fetch['volumeAlcool'],
                'VT' => $Fetch['volumeTotal']
            ];
            $I++;
        }

        return $ArrayList;
    }



    protected function UpdatePerfume($VF, $VA, $VAL, $ID, $VT)
    {
        if ($ID != null) {
            $this->db = $this->connectionMysql()
                ->prepare("UPDATE perfume SET volumeFra=$VF , volumeAgua=$VA, volumeAlcool=$VAL, volumeTotal=$VT WHERE idperf=$ID;");
            $this->db->execute();
        } else {
            echo "<script>alert('Campos Vazios')</script>";
        }
    }
    protected function DeletarPerfume($ID)
    {

        if (isset($ID)) {
            $this->db = $this->connectionMysql()
                ->prepare("DELETE FROM perfume WHERE idperf=:ID");
            $this->db->bindParam(":ID", $ID, \PDO::PARAM_INT);
            $this->db->execute();
        }
    }
}
