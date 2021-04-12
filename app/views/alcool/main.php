<div id="content">
    <h3 class="glyphicons notes_2"><i></i>Registrar Novo Volume de Alcool</h3>

    <div class="row-fluid">
       
            <form method="POST" action="<?PHP echo DIRPAGE ?>alcool/Cadastrar-Alcool" >

            <div class="row-fluid">
                <div class="span4">
                    <div class="control-group">
                        <label class="control-label">Volume de Alcool</label>
                        <div class="controls">
                            <div class="input-append">
                                <input name="Valcool" type="number" id="perfume" class="span8" placeholder="Ex: 800" style="width:85%;">

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
                <input class="redirect btn btn-primary" value="Registrar" type="submit">
                   </div>
            </form>
     
    </div>
</div>