<div id="content">
            <h3 class="glyphicons notes_2"><i></i>Fabricação de Perfumes</h3>

             <div class="row-fluid">
                 <div class="row-fluid">

  
                 <div class="span4">                
				            <div class="control-group">
					            <label class="control-label">Quantidade do Perfume</label>
					            <div class="controls">
                                    <div class="input-append">
                                    <input name="" type="text" id="" class="span8" placeholder="ml" style="width:85%;">
                                     <span class="add-on glyphicons calendar"><i></i></span>
						            </div>
                                </div>
				            </div>   
                        </div>
                 </div>
                        <div class="row-fluid">
                     <div class="span4">
                            <div class="control-group">
					            <label class="control-label">Fragância</label>
					            
                                    <div class="controls">
                                    <select name="" id="" class="span8" style="width:85%;">
	                                <option selected="selected" value="0">Selecione</option>
                                 	<option  value="1">Aguardando T.I</option>
	                                <option value="2">Aguardando Usu </option>
	                                <option value="3">Aguardando Fornecedor</option>
	                                <option value="4">Encerrado</option>
                                    </select>
					                </div>
				            </div>
			            </div> 

                      

                        <div class="span4">                
				            <div class="control-group">
					            <label class="control-label">Quantidade Agua</label>
					            <div class="controls">
                                    <div class="input-append">
                                    <input name="" type="text" id="" class="span8" placeholder="ml" style="width:85%;">
                                     <span class="add-on glyphicons calendar"><i></i></span>
						            </div>
                                </div>
				            </div>   
                        </div>

    		            
                  
                  
                   
                   <div class="span4">                
				            <div class="control-group">
					            <label class="control-label">Quantidade Alcool</label>
					            <div class="controls">
                                    <div class="input-append">
                                    <input name="" type="text" id="" class="span8" placeholder="ml" style="width:85%;">
                                     <span class="add-on glyphicons calendar"><i></i></span>
						            </div>
                                </div>
				            </div>   
                        </div>
                    
                    </div>

                    <div class="row-fluid">
                        <div class="span12">
                            <div class="buttons pull-right" style="margin-top: 0;">
                                <input type="submit" name="" value="Filtrar" id="ctl00_Body_btnNovo" class="btn btn-large btn-primary pull-right" />
                            </div>
                        </div>
                    </div>



                </div>
            </div>
      
            <div class="row-fluid">
                <div class="span12">
                    <div>
                    
                    	<?php
                        $TABELA = new App\controllers\ControllerHome;
                        $TABELA->CarregarTabela(); ?>
          </div>
         </div>
        </div>   