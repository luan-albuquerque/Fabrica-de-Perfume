<?php
namespace App\Controllers;

use App\models\ClassConexao;
use App\models\ModelFragancia;
use Src\Classes\ClassRender;

class ControllerHome extends ModelFragancia{
    
public function __construct()
{   
       $Render = new ClassRender;
       $Render->setDir("home");
       $Render->setTitle("Pagina Inicial");
       $Render->setDescription("Pagina de Inicio");
       $Render->setKeyWords("PgInicial");
       $Render->renderLayout();
    
}

public function CarregarTabela(){
    $result = $this->ListarFrag();

    echo " <table cellspacing='0' cellpadding='4' border='0' id='ctl00_Body_grvChamados' style='color:#333333;width:100%;border-collapse:collapse;'>
	
        <!--DEF DE COLUNAS -->
         	<tr style='color:White;background-color:#71C39A;font-weight:bold;'>
			<th scope='col'>ID</th>
            <th scope='col'>Registro</th>
            <th scope='col'>Fragancia</th>
            <th scope='col'>Volume Fragância</th>
            <th scope='col'>Volume Agua</th> 
            <th scope='col'>Volume Alcool</th> 
            </tr>

        <!--FIM DEF DE COLUNAS-->
        <!-- TR DE VALORES ACRESCENTA -->
    ";

    foreach($result as $dados){
    echo "
        <tr align='center' style='background-color:#E3EAEB;'>
			
            <td>$dados[ID]</td>
            <td><STRONG>$dados[REG]</STRONG></td>
            <td>$dados[ID_F]</td>
            <td>$dados[VF]</td>
            <td>$dados[VA]</td>
            <td>$dados[VAL]</td>

            <td align='center' style='width:20px;'>
            <a href='easy.pdf' target='blank'  class='btn-action glyphicons eye_open btn-info'>
              <i></i>
             </a>
            </td>
	       </tr>

            ";
        }
           echo "
        <!--FIM DO TR DE ADIÇÃO-->


	       </table>";



}



}