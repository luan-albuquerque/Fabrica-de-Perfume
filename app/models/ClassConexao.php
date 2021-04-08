<?php

namespace App\models;

Class ClassConexao{

    public function connectionMysql()
    { 
        
        try {
        
         $con = new \PDO('mysql:host='.HOST.';dbname='.DB, USER, PASS);
          // echo "<script>alert('BANCO CONECTADO')</script>";
             return $con;
            
        }catch(\PDOException $e) {
         
           echo "<script>alert('ERRO NO BANCO')</script>";

           return  $e->getMessage();

        }
    }


}
