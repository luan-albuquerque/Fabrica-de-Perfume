

<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="pt-BR">
<!--<![endif]-->
<head><title>
	Fabrica de Perfume
</title>
    <!-- Meta -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><meta http-equiv="X-UA-Compatible" content="IE=edge" /><meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0" /><meta name="apple-mobile-web-app-capable" content="yes" /><meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <!-- Bootstrap -->
    <link href="<?php echo DIRBOOTSTRAP?>/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Bootstrap Extended -->
    <link href="<?php echo DIRBOOTSTRAP?>/extend/jasny-bootstrap/css/jasny-bootstrap.min.css" rel="stylesheet" /><link href="../bootstrap/extend/jasny-bootstrap/css/jasny-bootstrap-responsive.min.css" rel="stylesheet" /><link href="../bootstrap/extend/bootstrap-wysihtml5/css/bootstrap-wysihtml5-0.0.2.css" rel="stylesheet" />
    <!-- JQueryUI v1.9.2 -->
   <link rel="stylesheet" href="<?php echo DIRTHEME?>/scripts/jquery-ui-1.9.2.custom/css/smoothness/jquery-ui-1.9.2.custom.min.css" />
    <!-- Glyphicons -->
    <link rel="stylesheet" href="<?php echo DIRTHEME?>/css/glyphicons.css" />
    <!-- Bootstrap Extended -->
    <link rel="stylesheet" href="<?php echo DIRBOOTSTRAP?>/extend/bootstrap-select/bootstrap-select.css" /><link rel="stylesheet" href="../bootstrap/extend/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" />
    <!-- Uniform -->
    <link rel="stylesheet" media="screen" href="<?php echo DIRTHEME?>/scripts/pixelmatrix-uniform/css/uniform.default.css" />
    <!-- JQuery v1.8.2 -->
    <script src="<?php echo DIRTHEME?>/scripts/jquery-1.8.2.min.js"></script>
    <!-- Modernizr -->
    <script src="<?php echo DIRTHEME?>/scripts/modernizr.custom.76094.js"></script>
    <!-- MiniColors -->
    <link rel="stylesheet" media="screen" href="<?php echo DIRTHEME?>/scripts/jquery-miniColors/jquery.miniColors.css" />
    <!-- Theme -->
    <link rel="stylesheet" href="<?php echo DIRTHEME?>/css/style.min.css?1361377780" />
    <!-- LESS 2 CSS -->
    <script src="<?php echo DIRTHEME?>/scripts/less-1.3.3.min.js"></script>

    
    <!-- DataTables -->
    <script src="<?php echo DIRTHEME?>/scripts/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo DIRTHEME?>/scripts/DataTables/media/js/DT_bootstrap.js"></script>

    <!-- Custom Onload Script -->
    <script src="<?php echo DIRTHEME?>/scripts/load.js"></script>
    <?php $this->addHeader()?>

</head>
<body>
    <div class="navbar main">
        <div class="container">
            <div class="row">
                <div class="span12 relativeWrap">
                    <button type="button" class="btn btn-navbar visible-phone">
                        <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar">
                        </span>
                    </button>
                    
                    <ul id="menu" class="hidden-phone">
                        <li class="active">
                        <a href="" class="menuToggle">Home</a>
                        </li>
                        
                        <li>

                            <a class="menuToggle">Cadastrar</a>
                              <ul class="menu hide">
                                  <li><a href="<?php echo DIRPAGE?>fragancia"><span>Fragância</span></a></li>
                                  <li><a href="<?php echo DIRPAGE?>alcool"><span>Alcool</span></a></li>
                                  <li><a href="<?php echo DIRPAGE?>agua"><span>Agua</span></a></li>
                           
                                </ul>
                        </li>
                        <li> 
                            
                          <a class="menuToggle">Estoques</a>
                          <ul class="menu hide">
                                  <li><a href="<?php echo DIRPAGE?>estoque-fragancia"><span>Fragância</span></a></li>
                                  <li><a href="<?php echo DIRPAGE?>estoque-alcool"><span>Alcool</span></a></li>
                                  <li><a href="<?php echo DIRPAGE?>estoque-agua"><span>Agua</span></a></li>
                              </ul>
                             
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
        
    <!-- Main -->
    <div class="container-fluid fixed">
    
       <?php $this->addMain(); ?>
    
      <hr/>      
     </div>

        
    </form>

    <!-- JQueryUI v1.9.2 -->
    <script src="<?php echo DIRTHEME?>/scripts/jquery-ui-1.9.2.custom/js/jquery-ui-1.9.2.custom.min.js"></script>
    <!-- JQueryUI Touch Punch -->
    <!-- small hack that enables the use of touch events on sites using the jQuery UI user interface library -->
    <script src="<?php echo DIRTHEME?>/scripts/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
    <!-- MiniColors -->
    <script src="<?php echo DIRTHEME?>/scripts/jquery-miniColors/jquery.miniColors.js"></script>
    <!-- Themer -->
    <script>
        var themerPrimaryColor = '#71c39a';
    </script>
    <script src="<?php echo DIRTHEME?>/scripts/jquery.cookie.js"></script>
    <script src="<?php echo DIRTHEME?>/scripts/themer.js"></script>
    <!-- Resize Script -->
    <script src="<?php echo DIRTHEME?>/scripts/jquery.ba-resize.js"></script>
    <!-- Uniform -->
    <script src="<?php echo DIRTHEME?>/scripts/pixelmatrix-uniform/jquery.uniform.min.js"></script>
    <!-- Bootstrap Script -->
    <script src="<?php echo DIRBOOTSTRAP?>/js/bootstrap.min.js"></script>
    <!-- Bootstrap Extended -->
    <script src="<?php echo DIRBOOTSTRAP?>/extend/bootstrap-select/bootstrap-select.js"></script>
    <script src="<?php echo DIRBOOTSTRAP?>/extend/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"></script>
    <script src="<?php echo DIRBOOTSTRAP?>/extend/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js"></script>
    <script src="<?php echo DIRBOOTSTRAP?>/extend/jasny-bootstrap/js/jasny-bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo DIRBOOTSTRAP?>/extend/jasny-bootstrap/js/bootstrap-fileupload.js" type="text/javascript"></script>
    <script src="<?php echo DIRBOOTSTRAP?>/extend/bootbox.js" type="text/javascript"></script>
    <script src="<?php echo DIRBOOTSTRAP?>/extend/bootstrap-wysihtml5/js/wysihtml5-0.3.0_rc2.min.js" type="text/javascript"></script>
    <script src="<?php echo DIRBOOTSTRAP?>/extend/bootstrap-wysihtml5/js/bootstrap-wysihtml5-0.0.2.js"   type="text/javascript"></script>
    
</body>

</html>