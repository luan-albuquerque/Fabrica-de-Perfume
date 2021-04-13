<?php

namespace App\Models;

use App\models\ClassConexao;
use Exception;

class ModelPerfume extends ClassConexao
{

    private $db, $UPdb;

    protected function cadastrarPerfume($VF, $VA, $VAL, $IDF, $VT)
    {
        if(
            $this->BaixaDeVolumeFrag($VF, $IDF,$VA,$VAL) == "Negado"
        ) {
            echo "<script>alert('Estoque Indisponivel')</script>";
     
        }else{
                
            $this->db = $this->connectionMysql()
            ->prepare("INSERT INTO perfume VALUES(null,:dtreg,:key_frag,$VF,$VA,$VAL,$VT)");
        $this->db->bindParam(":dtreg", date("Y-m-d"), \PDO::PARAM_STR);
        $this->db->bindParam(":key_frag", $IDF, \PDO::PARAM_INT);
        $this->db->execute();
           

        }
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
            echo "<script>alert('Perfume Excluido com Sucesso!')</script>";
        }
    }


    private function BaixaDeVolumeAlcool($VALOR)
    {

        $volume = $this->connectionMysql()->prepare("select sum(volume) from est_alcool");
        $volume->execute();
        $teste = $volume->fetch();


        if ($VALOR > $teste[0]) {
            return "Negado";
        } else {
            while ($VALOR > 0) {

                $MAXID = $this->connectionMysql()->prepare("select max(id_est) from est_alcool where volume > 0");
                $MAXID->execute();
                $IDMAX = $MAXID->fetch()[0];
                $MAXVOL = $this->connectionMysql()->prepare("select max(volume) from est_alcool where id_est =" . $IDMAX);
                $MAXVOL->execute();
                $VMAX = $MAXVOL->fetch()[0];

                if ($VALOR > $VMAX) {

                    $this->UPdb = $this->connectionMysql()->prepare("UPDATE est_alcool set volume=0 where id_est =" . $IDMAX);
                    $this->UPdb->execute();
                    $VALOR = $VALOR - $VMAX;
                } else {

                    $this->UPdb = $this->connectionMysql()->prepare("UPDATE est_alcool set volume=(volume-$VALOR) where id_est =" . $IDMAX);
                    $this->UPdb->execute();
                    $VALOR = 0;


                    return "Baixado";
                }
            }
        }
    }

    private function BaixaDeVolumeAgua($VALOR,$VAL)
    {

        $volume = $this->connectionMysql()->prepare("select sum(volume) from est_agua");
        $volume->execute();
        $teste = $volume->fetch();


        if ($VALOR > $teste[0] or $this->BaixaDeVolumeAlcool($VAL)== "Negado" ) {
            return "Negado";
        } else {
            while ($VALOR > 0) {

                $MAXID = $this->connectionMysql()->prepare("select max(id_est) from est_agua where volume > 0");
                $MAXID->execute();
                $IDMAX = $MAXID->fetch()[0];
                $MAXVOL = $this->connectionMysql()->prepare("select max(volume) from est_agua where id_est =" . $IDMAX);
                $MAXVOL->execute();
                $VMAX = $MAXVOL->fetch()[0];

                if ($VALOR > $VMAX) {

                    $this->UPdb = $this->connectionMysql()->prepare("UPDATE est_agua set volume=0 where id_est =" . $IDMAX);
                    $this->UPdb->execute();
                    $VALOR = $VALOR - $VMAX;
                } else {

                    $this->UPdb = $this->connectionMysql()->prepare("UPDATE est_agua set volume=(volume-$VALOR) where id_est =" . $IDMAX);
                    $this->UPdb->execute();
                    $VALOR = 0;


                    return "Baixado";
                }
            }
        }
    }

    private function BaixaDeVolumeFrag($VALOR, $ID,$VA,$VAL)
    {

        $volume = $this->connectionMysql()->prepare("select sum(volume) from est_fragancia where id_frag=" . $ID);
        $volume->execute();
        $teste = $volume->fetch();


        if ($VALOR > $teste[0] or $this->BaixaDeVolumeAgua($VA,$VAL) == "Negado" ) {
            return "Negado";
        } else {
            while ($VALOR > 0) {

                $MAXID = $this->connectionMysql()->prepare("select max(id_est) from est_fragancia where volume > 0 and id_frag=" . $ID);
                $MAXID->execute();
                $IDMAX = $MAXID->fetch()[0];
                $MAXVOL = $this->connectionMysql()->prepare("select max(volume) from est_fragancia where id_est =" . $IDMAX);
                $MAXVOL->execute();
                $VMAX = $MAXVOL->fetch()[0];

                if ($VALOR > $VMAX) {

                    $this->UPdb = $this->connectionMysql()->prepare("UPDATE est_fragancia set volume=0 where id_est =" . $IDMAX);
                    $this->UPdb->execute();
                    $VALOR = $VALOR - $VMAX;
                } else {

                    $this->UPdb = $this->connectionMysql()->prepare("UPDATE est_fragancia set volume=(volume-$VALOR) where id_est =" . $IDMAX);
                    $this->UPdb->execute();
                    $VALOR = 0;


                    return "Baixado";
                }
            }
        }
    }
}
