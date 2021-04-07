<div id="content">
    <h3 class="glyphicons notes_2"><i></i>Fabricação de Perfumes</h3>

    <div class="row-fluid">
        <div class="row-fluid">


            <div class="span4">
                <div class="control-group">
                    <label class="control-label">Quantidade do Perfume</label>
                    <div class="controls">
                        <div class="input-append">
                            <input name="perfume" type="text" id="perfume" class="span8" placeholder="ml" style="width:85%;">

                        </div>
                    </div>
                </div>
            </div>

            <div class="span4">

                <div class="control-group">
                    <label class="control-label">Fragância</label>

                    <div class="controls">
                        <select name="" id="" class="span8" style="width:85%;">
                            <option selected="selected" value="0">Selecione</option>
                            <?php $OBJ_FRAG = new App\controllers\ControllerFragancia;
                            $FRAG_SEL = $OBJ_FRAG->ListarSelectFrag();
                            foreach ($FRAG_SEL as $dados) {
                            ?>
                                <option value="<?PHP echo $dados['ID'] ?>">
                                    <?php echo $dados['DESC'] ?>
                                </option>
                            <?php } ?>
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



<div class="modal fade bd-example-modal-lg" tabindex="0" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="padding: 15px 15px;">

            <form action="<?php echo DIRPAGE ?>" method="post">
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

                <button class="redirect btn btn-primary" type="submit">Cadastrar</button>
            </form>


        </div>
    </div>
</div> <!-- FIM DO MODAL-->