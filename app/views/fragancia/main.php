<div id="content">
    <h3 class="glyphicons notes_2"><i></i>Registrar Nova Fragancia</h3>

    <div class="row-fluid">
       
            <form method="POST" action="<?PHP echo DIRPAGE ?>alcool/" >

            <div class="row-fluid">
                <div class="span4">
                    <div class="control-group">
                        <label class="control-label">Nome da  Fragancia</label>
                        <div class="controls">
                            <div class="input-append">
                                <input name="Namefrag" type="number" id="perfume" class="span8" placeholder="Ex: 800" style="width:85%;">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                <div class="span4">
                    <div class="control-group">
                        <label class="control-label">Nome da  Fragancia</label>
                        <div class="controls">
                            <div class="input-append">
                            <textarea name="fragdescricao" rows="6" cols="20" id="txtConteudo" style="width: 523px; margin: 0px 0px 10px; height: 70px;"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                </div>
            
                   <div class="row-fluid">
                <input class="redirect btn btn-primary" value="Cadastrar" type="submit">
                   </div>
            </form>
     
    </div>
</div>
<hr>

<div id="content">
    <h3 class="glyphicons notes_2"><i></i>Registrar Novo Volume Fragancia</h3>

    <div class="row-fluid">
       
            <form method="POST" action="<?PHP echo DIRPAGE ?>alcool/" >

            <div class="row-fluid">
                <div class="span4">
                    <div class="control-group">
                        <label class="control-label">Volume da  Fragancia</label>
                        <div class="controls">
                            <div class="input-append">
                                <input name="Nfrag" type="number" id="perfume" class="span8" placeholder="Ex: 800" style="width:85%;">

                            </div>
                        </div>
                    </div>
                </div>

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
                                    <?php echo $dados['NAME'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            </div>
            
                   <div class="row-fluid">
                <input class="redirect btn btn-primary" value="Registrar" type="submit">
                   </div>
            </form>
     
    </div>
</div>
<hr>
<h3 class="glyphicons table"><i></i>Tipos de Fragancias</h3>
<?php
$home = new App\controllers\ControllerFragancia;
            $home->CarregarTabelaDeFragancias();
