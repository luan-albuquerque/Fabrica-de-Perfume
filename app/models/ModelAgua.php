<?php

namespace App\Models;

use App\models\ClassConexao;

class ModelAgua extends ClassConexao
{


    private $db;

    protected function CadastrarEstAgua($VA){

        $this->db = $this->connectionMysql()
            ->prepare("INSERT INTO est_agua VALUES(null,:dtreg,$VA,$VA)");
        $this->db->bindParam(":dtreg", date("Y-m-d"), \PDO::PARAM_STR);
        $this->db->execute();
        echo "<script>alert('Volume de Agua registrado com Sucesso!')</script>";

}

    protected function ListarEstAgua()
    {

        $BFetch = $this->db = $this->connectionMysql()->prepare(
            "SELECT * FROM est_agua ORDER BY id_est DESC"
        );
        $BFetch->execute();
        $I = 0;
        while ($Fetch = $BFetch->fetch(\PDO::FETCH_ASSOC)) {

            $ArrayList[$I] = [
                'COD' => $Fetch['id_est'],
                'REG' => $Fetch['dt_registro'],
                'VA' => $Fetch['volumeInicial'],
                'VAT' => $Fetch['volume']

            ];

            $I++;
        }
        return $ArrayList;
    }



    protected function DeletarAgua($ID)
    {
        $this->db = $this->connectionMysql()
            ->prepare("DELETE FROM est_agua WHERE id=:ID");
        $this->db->bindParam(":ID", $ID, \PDO::PARAM_INT);
        $this->db->execute();
        echo "<script>alert('Registro Excluido com Sucesso!')</script>";
    }
}
