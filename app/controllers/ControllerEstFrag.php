<?php

namespace App\controllers;


use App\models\ModelFragancia;
use DateTime;
use Src\Classes\ClassRender;

class ControllerEstFrag extends ModelFragancia
{
  private $codEx, $IDF, $VF;

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

    if (isset($_POST['Vfrag'])) {
      $this->VF = filter_input(INPUT_POST, 'Vfrag', FILTER_SANITIZE_SPECIAL_CHARS);
    }
    if (isset($_POST['select_idfrag'])) {
      $this->IDF = filter_input(INPUT_POST, 'select_idfrag', FILTER_SANITIZE_SPECIAL_CHARS);
    }
    if ($_POST['tipo_v'] == 1) {
      $this->VF = $this->VF * 1000;
    }
  }

  public function Cadastrar()
  {

    $this->recValores();
    $this->CadastrarEstFrag($this->VF, $this->IDF);
  }

  public function Excluir()
  {
    $this->recValores();
    if ($this->codEx != null) {
      foreach ($this->codEx as $dadosdel) {
        $this->DeletarEstFragancia($dadosdel);
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
         <th scope='col'>Volume Disponivel</th>
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
         <td>$dados[VI] ml</td>
         <td>
         <input class='offCheckbox' type='checkbox' id='$dados[COD]' name='id_cod[]' value='$dados[COD]'>
         <label class='btn-action glyphicons asel bin' id='l1' for='$dados[COD]'>
         <a> 
         <i></i></a></label> </td>
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
