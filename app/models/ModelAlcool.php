<?php

namespace App\Models;

use App\models\ClassConexao;

class ModelAlcool extends ClassConexao
{


    private $db;
    protected function CadastrarEstAlcool($VAL){

        $this->db = $this->connectionMysql()
            ->prepare("INSERT INTO est_alcool VALUES(null,:dtreg,$VAL,$VAL)");
        $this->db->bindParam(":dtreg", date("Y-m-d"), \PDO::PARAM_STR);
        $this->db->execute();
        echo "<script>alert('Volume de Agua registrado com Sucesso!')</script>";

}

    protected function ListarEstAlcool()
    {
        $BFetch = $this->db = $this->connectionMysql()->prepare(
            "SELECT * FROM est_alcool ORDER BY id_est DESC"
        );
        $BFetch->execute();
        $I = 0;
        while ($Fetch = $BFetch->fetch(\PDO::FETCH_ASSOC)) {
            $ArrayList[$I] = [
                'COD' => $Fetch['id_est'],
                'REG' => $Fetch['dt_registro'],
                'VAL' => $Fetch['volumeInicial'],
                'VALT' => $Fetch['volume']

            ];
            $I++;
        }


        return $ArrayList;
    }

    protected function DeletarAlcool($ID)
    {
        $this->db = $this->connectionMysql()
            ->prepare("DELETE FROM est_alcool WHERE id_est=$ID");
        $this->db->bindParam(":ID", $ID, \PDO::PARAM_INT);
        $this->db->execute();
        echo "<script>alert('Registro Excluido com Sucesso!')</script>";
    }
}
