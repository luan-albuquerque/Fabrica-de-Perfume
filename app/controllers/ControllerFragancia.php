<?php

namespace App\controllers;

use App\models\ModelFragancia;
use DateTime;
use Src\Classes\ClassRender;

class ControllerFragancia extends ModelFragancia
{
    private $NF,$DF,$codEx;

    public function __construct()
    {
        $render = new ClassRender();
        $render->setKeyWords('');
        $render->setDescription('');
        $render->setTitle('');
        $render->setDir('fragancia');
        $render->renderLayout();
    }
   
    public function ListarSelectFrag()
    {

        return $this->ListarFrag();
    }

    private function recValores()
    {
      if (isset($_POST['id_cod'])) {
        $this->codEx = $_POST['id_cod'];
      }
    
    if (isset($_POST['NameFrag'])) {
        $this->NF = filter_input(INPUT_POST, 'NameFrag', FILTER_SANITIZE_SPECIAL_CHARS);
    }
    if (isset($_POST['DescFrag'])) {
        $this->DF = filter_input(INPUT_POST, 'DescFrag', FILTER_SANITIZE_SPECIAL_CHARS);
    }
    
      
    }

    public function CadastrarTPF(){
       $this->recValores();
       $this->CadastrarTipoDeFrag($this->NF,$this->DF);
                
    }

    public function Excluir(){
        $this->recValores();
        if ($this->codEx != null) {
          foreach ($this->codEx as $dadosdel) {
            $this->DeletarTpFragancia($dadosdel);
          }
        } else {
          echo "<script>alert('Opção Inválida!!!')</script>";
        }
    }

    public function CarregarTabelaDeFragancias()
    {
        $result = $this->ListarFrag();
        echo "
        <form id='' method='POST' action='".DIRPAGE."fragancia/Deletar-Tpo-Fragancia'>
        <table cellspacing='0' cellpadding='4' border='0' id='' style='color:#333333;width:100%;border-collapse:collapse;'>
	
        <!--DEF DE COLUNAS -->
         	<tr style='color:White;background-color:#71C39A;font-weight:bold;'>
			<th scope='col'>ID</th>
            <th scope='col'>Registro</th>
            <th scope='col'>Nome</th>
            <th scope='col'>Descrição/th>
            <th></th>
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
            <td>$dados[NAME]</td>
            <td>$dados[DESC]</td>
            <td><a href='" . DIRPAGE . "home/Formulario-/$dados[COD]' target='blank'  class='btn-action glyphicons pencil btn-info'><i></i></a></td>
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
