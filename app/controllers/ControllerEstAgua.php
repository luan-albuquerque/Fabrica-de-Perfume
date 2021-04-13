<?php

namespace App\controllers;

use App\models\ModelAgua;
use DateTime;
use Src\Classes\ClassRender;

class ControllerEstAgua extends ModelAgua
{
    private $codEx, $VA;
    public function __construct()
    {
        $render = new ClassRender();
        $render->setKeyWords('');
        $render->setDescription('');
        $render->setTitle('');
        $render->setDir('est_agua');
        $render->renderLayout();
    }

    private function recValores()
    {
        if (isset($_POST['id_cod'])) {
            $this->codEx = $_POST['id_cod'];
        }
        if (isset($_POST['Vagua'])) {
            $this->VA = filter_input(INPUT_POST, 'Vagua', FILTER_SANITIZE_SPECIAL_CHARS);
        }

        if ($_POST['tipo_v'] == 1) {
            $this->VA = $this->VA * 1000;
        }
    }

    public function Cadastrar()
    {
        $this->recValores();
        $this->CadastrarEstAgua($this->VA);
    }

    public function Excluir()
    {
        $this->recValores();
        if ($this->codEx != null) {
            foreach ($this->codEx as $dadosdel) {
                $this->DeletarAgua($dadosdel);
            }
        } else {
            echo "<script>alert('Opção Inválida!!!')</script>";
        }
    }

    public function TabelaDeEstAgua()
    {

        $result = $this->ListarEstAgua();
        echo "
     <table cellspacing='0' cellpadding='4' border='0' id='' style='color:#333333;width:100%;border-collapse:collapse;'>
     <tr style='color:White;background-color:#71C39A;font-weight:bold;'>
  
         <th scope='col'>Ultimo Registro</th>
         <th scope='col'>Volume Total</th>
         
         </tr>
         ";
        foreach ($result as $dado) {

            $this->SOMA += $dado['VAT'];
            $this->DT = new DateTime($dado['REG']);
            $this->DT = $this->DT->format('d/m/Y');
        }
        echo "

     <tr align='center' style='background-color:#E3EAEB;'>
     <td>$this->DT</td>
     <td>$this->SOMA ml</td>
     </tr>
  </table>
     <hr>
     <form id='' method='POST' action='" . DIRPAGE . "estoque-agua/Deletar-Agua'>  
  <table cellspacing='0' cellpadding='4' border='0' id='' style='color:#333333;width:100%;border-collapse:collapse;'>
   
     <!--DEF DE COLUNAS -->
        <tr style='color:White;background-color:#71C39A;font-weight:bold;'>
   <th scope='col'>ID</th>
         <th scope='col'>Registro</th>
         <th scope='col'>Volume</th>
         <th></th>
         </tr>

     <!--FIM DEF DE COLUNAS-->
     <!-- TR DE VALORES ACRESCENTA -->
 ";

        foreach ($result as $dados) {

            $dataC = new DateTime($dados['REG']);
            $dt = $dataC->format('d/m/Y');
            echo "
     <tr align='center' style='background-color:#E3EAEB;'>
   
         <td><STRONG>$dados[COD]</STRONG></td>
         <td>$dt</td>
         <td>$dados[VA] ml</td>
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
