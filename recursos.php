<?php 
	require "_sys/init.php"; 
	$recursos = Recurso::get();
?>
<!DOCTYPE html>
<html>
<head>
	<?php include "inc/head.php"; ?>
	<meta name="title" content="ISI.edu.py estudiá Online hoy">
    <meta name="description" content="Dominá las herramientas que Microsfot Excel te ofrece, estudiando online desde tu casa u oficina, paso a paso, La primera lección es GRATIS!">
    <meta name="keywords" content="excel,cursos,microsoft,avanzado,instituto,certificado,certificación,online,curso,pdf,trucos,enseñanza,microsotf excel, curso de excel,curso online, cursos online,excel online,excel instituto,excel financiero,excel avanzado,excel administrativo,excel básico,básico,financiero,administrativo,pago online,pago">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="Spanish">
    <meta name="author" content="ISI.edu.py">
</head>
<body id="pagestaff">
	<?php include "inc/header-inn.php"; ?>
	
		<div class="row">
			<div class="container">
				<h2 class="text-center mt40 mb40 mainTitle">Recursos</h2>
			</div>
		</div>
    </div> 

    <div class="row mb40">
    	<div class="container">
    		<div class="team-wrap mt30">
    			<?php if(haveRows($recursos)):
                    foreach($recursos as $rs):
                        $imagen = strlen( $rs["recurso_file_name"]) > 0 ? $rs["recurso_image_small_url"]  : 'images/no-picture.jpg';
                        $categoria = Recurso_categoria::select($rs["categoria_id"]);
                ?>
                    <div class="col-md-3 col-xs-12 col-sm-6">
                        <div class="boxrecursosList col-xs-12 col-md-12 text-center">
                            <a href="detalle.php?r=<?php echo $rs["recurso_id"]?>-<?php echo slugit($rs['recurso_titulo']);?>">
                                <picture><img style="width: 100%" src="<?php echo $imagen; ?>"></picture>
                            </a>
                            <h4 class="mt20"><?php echo $rs["recurso_titulo"] ?></h4>
                            <h6><?php echo $categoria[0]["categoria_titulo"] ?></h6>
                            <!--
                                <p class="mt30 mb20">
                                    <?php echo cropWords(strip_tags($rs["recurso_descripcion"]),30); ?>
                                </p>
                            -->
                            <a href="detalle.php?r=<?php echo $rs["recurso_id"]?>-<?php echo slugit($rs['recurso_titulo']);?>" class="btn col-md-12 col-xs-12 mt20 btn-success btnVermas"><i class="fa fa-plus"></i> Ver detalles</a>
                        </div>
                    </div>
                <?php
                    endforeach;

                    if(strlen($listing['navigation']) > 0):
                        echo    '<div class="separator top form-inline small">
                                    <div class="pagination pull-right" style="margin: 0;">
                                        '.$listing['navigation'].'
                                    </div>
                                    <div class="clearfix"></div>
                                </div>';
                    endif;
                else: 
                    ?>

                <?php endif; ?>
           </div>
    	</div>
    </div>

    <?php include "inc/footer.php"; ?>
    <?php include "inc/scripts.php"; ?>

    <script type="text/javascript">
        $(document).ready(function(){
            var altoTitulo = 0;
            $(".boxrecursosList").each(function(){
                if(altoTitulo < $(this).find("h4").height()){
                    altoTitulo = $(this).find("h4").height();
                }
            })
            $('.boxrecursosList h4').height(altoTitulo);
        })
    </script>
</body>
</html>