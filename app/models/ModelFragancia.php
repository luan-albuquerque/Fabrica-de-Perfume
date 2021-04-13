<?php
namespace App\models;

use App\models\ClassConexao;

class ModelFragancia extends ClassConexao{

    protected function CadastrarEstFrag($VF, $ID){

        $this->db = $this->connectionMysql()
            ->prepare("INSERT INTO est_fragancia VALUES(null,:dtreg,$VF,$VF,:ID)");
        $this->db->bindParam(":dtreg", date("Y-m-d"), \PDO::PARAM_STR);
        $this->db->bindParam(":ID", $ID, \PDO::PARAM_INT);
        $this->db->execute();
        echo "<script>alert('Fragancia registrada com Sucesso!')</script>";

}

protected function ListarFrag(){

   $BFetch = $this->connectionMysql()
   ->prepare("SELECT * FROM fragancia");
   $BFetch->execute();
   $I =0;
   while($Fetch = $BFetch->Fetch(\PDO::FETCH_ASSOC)){
   $ArrayList[$I] = [
       'COD' => $Fetch['id'],
       "REG" => $Fetch['dtreg'],
       'NAME' => $Fetch['name'],
       'DESC' => $Fetch['descricao']
    ]; 
    $I++;
}
       return $ArrayList;
}

protected function  ListarEstFrag(){

    $BFetch = $this->connectionMysql()
    ->prepare("SELECT  * FROM  est_fragancia 
    inner join fragancia on est_fragancia.id_frag=fragancia.id");
    $BFetch->execute();
    $I =0;
    while($Fetch = $BFetch->Fetch(\PDO::FETCH_ASSOC)){
    $ArrayList[$I] = [
        'COD' => $Fetch['id_est'],
        "REG" => $Fetch['dt_registro'],
        'NAME' => $Fetch['name'],
        'VF' => $Fetch['volume'],
        'VI' => $Fetch['volumeInicial'],
        'CODFRAG' => $Fetch['id']
        
     ]; 

     $I++;
 }
 
        return $ArrayList;
  
 
 }
 protected function  ListarResumoEstFrag(){

    $BFetch = $this->connectionMysql()
    ->prepare("SELECT  name, sum(volume) as volT FROM  est_fragancia 
    inner join fragancia on est_fragancia.id_frag=fragancia.id GROUP  BY  id;");
    $BFetch->execute();
    $I =0;
    while($Fetch = $BFetch->Fetch(\PDO::FETCH_ASSOC)){
    $ArrayList[$I] = [
        'NAME' => $Fetch['name'],
        'VF' => $Fetch['volT']
        
     ]; 

     $I++;
 }
 
        return $ArrayList;
  
 
 }

 protected function DeletarTpFragancia($ID){

    try{
        $this->db = $this->connectionMysql()
            ->prepare("DELETE FROM fragancia WHERE id=:ID");
        $this->db->bindParam(":ID", $ID, \PDO::PARAM_INT);
        $this->db->execute();
          echo "<script>alert('Registro Excluido com Sucesso!')</script>";
    } catch(\PDOException $e){

        echo "<script>alert('Fragancia não pode ser deletada porque está sendo utilizada!')</script>";
    
    }
    

}

protected function CadastrarTipoDeFrag($NAME, $DESC){

        $this->db = $this->connectionMysql()
            ->prepare("INSERT INTO fragancia VALUES(null,:dtreg,:nome,:descr)");
        $this->db->bindParam(":dtreg", date("Y-m-d"), \PDO::PARAM_STR);
        $this->db->bindParam(":nome", $NAME, \PDO::PARAM_STR);
        $this->db->bindParam(":descr", $DESC, \PDO::PARAM_STR);
        $this->db->execute();
        echo "<script>alert('Nova Fragancia cadastrado com Sucesso!')</script>";
      

}

protected function UpdateFragancia($ID,$NAME,$DESC)
{
    if($ID != null){
    $this->db = $this->connectionMysql()
 ->prepare("UPDATE  fragancia  SET name='$NAME',descricao='$DESC' WHERE id=$ID");
    $this->db->execute();
    echo "<script>alert('Alterado com sucesso!')</script>";
    
}else{
echo "<script>alert('Campos Vazios')</script>";
}

}

protected function DeletarEstFragancia($ID){


        $this->db = $this->connectionMysql()
            ->prepare("DELETE FROM est_fragancia WHERE id_est=:ID");
        $this->db->bindParam(":ID", $ID, \PDO::PARAM_INT);
        $this->db->execute();
          echo "<script>alert('Registro Excluido com Sucesso!')</script>";
 
    

}



}

?>