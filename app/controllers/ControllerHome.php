<?php

namespace App\Controllers;


use App\models\ModelPerfume;
use DateTime;
use Src\Classes\ClassRender;

class ControllerHome extends ModelPerfume
{
    protected $VF, $VA, $VAL, $VT, $IDF, $ID, $codEx;


    public function __construct()
    {
        $Render = new ClassRender;
        $Render->setDir("home");
        $Render->setTitle("Pagina Inicial");
        $Render->setDescription("Pagina de Inicio");
        $Render->setKeyWords("PgInicial");
        $Render->renderLayout();
    }
    private function recValores()
    {
        if (isset($_POST['id_perf'])) {
            $this->ID = filter_input(INPUT_POST, 'id_perf', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['id_cod'])) {
            $this->codEx = $_POST['id_cod'];
        }
        if (isset($_POST['frag'])) {
            $this->VF = filter_input(INPUT_POST, 'frag', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['agua'])) {
            $this->VA = filter_input(INPUT_POST, 'agua', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['alcool'])) {
            $this->VAL = filter_input(INPUT_POST, 'alcool', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['select_idfrag'])) {
            $this->IDF = filter_input(INPUT_POST, 'select_idfrag', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['perfume'])) {
            $this->VT = filter_input(INPUT_POST, 'perfume', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if ($_POST['tipo_v'] == 1) {
            $this->VT = $this->VT * 1000;
        }
    }

    public function CarregarTabelaPerfume()
    {
        $result = $this->ListarPerfume();

        echo "
        
        <form id='formexcluir' method='POST' action='".DIRPAGE."home/Deletar-Perfume'>
        <table cellspacing='0' cellpadding='4' border='0' style='color:#333333;width:100%;border-collapse:collapse;'>
	
        <!--DEF DE COLUNAS -->
         	<tr style='color:White;background-color:#71C39A;font-weight:bold;'>
			<th scope='col'>ID</th>
            <th scope='col'>Registro</th>
            <th scope='col'>Fragancia</th>
            <th scope='col'>Volume Fragância</th>
            <th scope='col'>Volume Agua</th> 
            <th scope='col'>Volume Alcool</th>
            <th scope='col'>Volume Total</th> 
            <th></th>
            <th></th>
            </tr>

        <!--FIM DEF DE COLUNAS-->
        <!-- TR DE VALORES ACRESCENTA -->
    ";

        foreach ($result as $dados) {

            $dataC = new DateTime();
            $dt = $dataC->format('d/m/Y');
            echo "
        <tr align='center' style='background-color:#E3EAEB;'>
			
            <td><STRONG>$dados[COD]</STRONG></td>
            <td>$dt</td>
            <td>$dados[DESC]</td>
            <td>$dados[VF]ml</td>
            <td>$dados[VA]ml</td>
            <td>$dados[VAL]ml</td>
            <td><STRONG>$dados[VT]ml</sSTRONG></td>
            <td><a href='" . DIRPAGE . "home/Formulario-Update/$dados[COD]' target='blank'  class='btn-action glyphicons pencil btn-info'><i></i></a></td>
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
           <input n class='redirect btn btn-primary' value='Excluir' for='formexcluir' type='submit'>
           </form>";
    }


    public function Cadastrar()
    {

        $this->recValores();
        $this->cadastrarPerfume($this->VF, $this->VA, $this->VAL, $this->IDF, $this->VT);
    }

    public function Update()
    {

        $this->recValores();
        $this->UpdatePerfume($this->VF, $this->VA, $this->VAL, $this->ID, ($this->VF + $this->VA + $this->VAL));
    }

    public function Excluir()
    {
        $this->recValores();
        if ($this->codEx != null) {
            foreach ($this->codEx as $dadosdel) {
                $this->DeletarPerfume($dadosdel);
            }
        }else{
            echo "<script>alert('Opção Inválida!!!')</script>";
        }
    }

    public function FormUpdate($ID)
    {
        $this->recValores();
        $Lista = $this->ListarPerfume();
        foreach ($Lista as $dados) {
            if ($dados['COD'] == $ID) {
                $VA = $dados['VA'];
                $VAL = $dados['VAL'];
                $VF = $dados['VF'];
            }
        }

        echo "<!--MODAL UPDATE-->

<script>window.onload = function() { document.getElementById('modalshow').click(); };</script>
<input type='hidden' id='modalshow' class='btn btn-primary'  data-toggle='modal' data-target='.modal-alterar'>

    <div id='modalperfume' class='modal fade bd-example-modal-lg modal-alterar' tabindex='0' role='dialog' aria-labelledby='myLargeModalLabel' aria-hidden='true'>
    
        <div class='modal-dialog modal-lg' role='document'>
            <div class='modal-content' style='padding: 15px 15px;'>
                  <form method='POST' action='" . DIRPAGE . "home/Alterar-Dados-de-Perfume'>
                  <h4>Alteração de Ingredientes</h4>
                  <input type='hidden' name='id_perf' value='$dados[COD]'>
                    <div class='row-fluid'>
    
                        <div class='span4'>
                            <div class='control-group'>
                                <label class='control-label'>Quantidade Fragancia </label>
                                <div class='controls'>
                                    <div class='input-append'>
                                        <input name='frag' type='text' id='frag' class='span8' value='{$VF}' style='width:85%;'>
    
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <div class='span4'>
                            <div class='control-group'>
                                <label class='control-label'>Quantidade Agua</label>
                                <div class='controls'>
                                    <div class='input-append'>
                                        <input name='agua' type='text' id='agua' class='span8' value='{$VA}' style='width:85%;'>
    
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <div class='span4'>
                            <div class='control-group'>
                                <label class='control-label'>Quantidade Alcool</label>
                                <div class='controls'>
                                    <div class='input-append'>
                                        <input name='alcool' type='text' id='alcool' class='span8' value='{$VAL}' style='width:85%;'>
    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <input class='redirect btn btn-primary' value='Alterar' type='submit'>
    
                </form>
    
    
            </div>
        </div>
    </div> <!-- FIM DO MODAL-->";
    }
}
