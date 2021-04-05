<?php

namespace App\models;

Class ClassConexao{

    public function connectionMysql()
    { 
        
        try {
        
         $con = new \PDO('mysql:host=localhost;dbname=F_PERFUME','luans', '123');
           echo "<script>alert('BANCO CONECTADO')</script>";
             return $con;
            
        }catch(\PDOException $e) {
         
           echo "<script>alert('ERRO NO BANCO')</script>";

           return  $e->getMessage();

        }
    }


}
