<?php

namespace App\controllers;


use App\models\ModelFragancia;
use DateTime;
use Src\Classes\ClassRender;

class ControllerEstFrag extends ModelFragancia
{
  private $codEx;

  public function __construct()
  {
    $render = new ClassRender();
    $render->setKeyWords('');
    $render->setDescription('');
    $render->setTitle('');
    $render->setDir('est_frag');
    $render->renderLayout();
  }


  private function recValores()
  {
    if (isset($_POST['id_cod'])) {
      $this->codEx = $_POST['id_cod'];
    }
    
  }
  public function Excluir()
  {
    $this->recValores();
    if ($this->codEx != null) {
      foreach ($this->codEx as $dadosdel) {
        $this->DeletarTpFragancia($dadosdel);
      }
    } else {
      echo "<script>alert('Opção Inválida!!!')</script>";
    }
  }

  public function TabelaDeEstFrag()
  {
    echo "
      <table cellspacing='0' cellpadding='4' border='0' id='' style='color:#333333;width:100%;border-collapse:collapse;'>
      ";
    $result1 = $this->ListarResumoEstFrag();
    foreach ($result1 as $dados) {

      echo " 
       <tr style='color:White;background-color:#71C39A;font-weight:bold;'>
         <th scope='col'>Fragancia</th>
         <th scope='col'>Volume Total</th>
         </tr>
     <tr align='center' style='background-color:#E3EAEB;'>     
     <td>$dados[NAME]</td>
    <td>$dados[VF] ml</td>
     </tr> ";
    }
    echo "
   </table>

     <hr>
     <form  method='POST' action='" . DIRPAGE . "estoque-fragancia/Deletar-Fragancia'>  
  <table cellspacing='0' cellpadding='4' border='0' id='' style='color:#333333;width:100%;border-collapse:collapse;'>
   
     <!--DEF DE COLUNAS -->
        <tr style='color:White;background-color:#71C39A;font-weight:bold;'>
        <th scope='col'>ID</th>
        <th scope='col'>Registro</th>
         <th scope='col'>Fragancia</th>
         <th scope='col'>Volume</th>
         <th></th>
         
         </tr>

     <!--FIM DEF DE COLUNAS-->
     <!-- TR DE VALORES ACRESCENTA -->
 ";

    $result = $this->ListarEstFrag();
    foreach ($result as $dados) {
      echo "
     <tr align='center' style='background-color:#E3EAEB;'>
         <td>$dados[COD]</td>
         <td>$dados[REG]</td>
         <td>$dados[NAME]</td>
         <td>$dados[VF] ml</td>
         <td>
         <label class='lix' id='l1' for='$dados[COD]'>
         <a id=''class=' btn-action glyphicons bin btn-info'> 
         <i></i></a></label>
         <input class='offCheckbox' type='checkbox' id='$dados[COD]' name='id_cod[]' value='$dados[COD]'>
        

</td>
      </tr>

         ";
    }
    echo "
     <!--FIM DO TR DE ADIÇÃO-->
      </table>
       <hr>
        <input class='redirect btn btn-primary' value='Excluir' for='formexcluir' type='submit'>
        </form>";
  }
}
