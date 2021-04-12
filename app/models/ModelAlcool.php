<?php

namespace App\Models;

use App\models\ClassConexao;

class ModelAlcool extends ClassConexao
{


    private $db;

    protected function ListarEstAlcool()
    {
        $BFetch = $this->db = $this->connectionMysql()->prepare(
            "SELECT * FROM est_alcool ORDER BY id DESC"
        );
        $BFetch->execute();
        $I = 0;
        while ($Fetch = $BFetch->fetch(\PDO::FETCH_ASSOC)) {
            $ArrayList[$I] = [
                'COD' => $Fetch['id'],
                'REG' => $Fetch['dt_registro'],
                'VAL' => $Fetch['volume']

            ];
            $I++;
        }


        return $ArrayList;
    }

    protected function DeletarAlcool($ID)
    {
        $this->db = $this->connectionMysql()
            ->prepare("DELETE FROM est_alcool WHERE id=:ID");
        $this->db->bindParam(":ID", $ID, \PDO::PARAM_INT);
        $this->db->execute();
        echo "<script>alert('Registro Excluido com Sucesso!')</script>";
    }
}
