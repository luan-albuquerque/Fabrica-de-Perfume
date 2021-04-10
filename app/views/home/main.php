<div id="content">
    <h3 class="glyphicons notes_2"><i></i>Fabricação de Perfumes</h3>
   
    <div class="row-fluid">
        <div class="row-fluid">
        <form onsubmit="req_p()" method="POST" action="<?PHP echo DIRPAGE?>home/Cadastrar-Perfume" id="perfform" name="perfform">
       
            <div class="span4">

                <div class="control-group">
                    <label class="control-label">Fragância</label>

                    <div class="controls">
                        <select name="select_idfrag" id="select_idfrag" class="span8">
                            <option selected="selected" value="sel">Selecione</option>
                            <?php $OBJ_FRAG = new App\controllers\ControllerFragancia;
                            $FRAG_SEL = $OBJ_FRAG->ListarSelectFrag();
                            foreach ($FRAG_SEL as $dados) {
                            ?>
                                <option value="<?PHP echo $dados['COD']?>">
                                    <?php echo $dados['DESC'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>




            <div class="span4">
                <div class="control-group">
                    <label class="control-label">Quantidade do Perfume</label>
                    <div class="controls">
                        <div class="input-append">
                            <input name="perfume" type="number" id="perfume" class="span8" placeholder="Ex: 1000" style="width:85%;">

                        </div>


                    </div>
                </div>
            </div>

            <div class="span1">

                <div class="control-group">
                    <label class="control-label">Tipo</label>

                    <div class="controls">
                        <select name="tipo_v" id="tipo_v" class="span8" style="width:100%;">
                            <option selected="selected" value="0">ML</option>
                            <option value="1">L</option>

                        </select>
                    </div>
                </div>
            </div>



        </div>


        <div class="row-fluid">
            <!-- BUTÃO DO MODAL -->
            <div class="span12">
                <button id="preparar" name="preparar" type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg"> Preparar </button>
            </div>
        </div>



    </div>
</div>

<div class="row-fluid">
    <div class="span12">
        <div>

            <?php
            $home = new App\controllers\ControllerHome;
            $home->CarregarTabelaPerfume();
            ?>
        </div>
    </div>
</div>
<!--MODAL-->

<div id="modalperfume" class="modal fade bd-example-modal-lg" tabindex="0" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="padding: 15px 15px;">

            
              
                <div class="row-fluid">

                    <div class="span4">
                        <div class="control-group">
                            <label class="control-label">Quantidade Fragancia </label>
                            <div class="controls">
                                <div class="input-append">
                                    <input name="frag" type="text" id="frag" class="span8" value="" style="width:85%;">

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="span4">
                        <div class="control-group">
                            <label class="control-label">Quantidade Agua</label>
                            <div class="controls">
                                <div class="input-append">
                                    <input name="agua" type="text" id="agua" class="span8" value="" style="width:85%;">

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="span4">
                        <div class="control-group">
                            <label class="control-label">Quantidade Alcool</label>
                            <div class="controls">
                                <div class="input-append">
                                    <input name="alcool" type="text" id="alcool" class="span8" placeholder="" style="width:85%;">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <input class="redirect btn btn-primary" value="Cadastrar" type="submit">

            </form>


        </div>
    </div>
</div> <!-- FIM DO MODAL-->