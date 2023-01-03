<?php 
	require "_sys/init.php"; 
	$cursos = Curso::get("","curso_orden ASC");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cursos :: ISI</title>
	<?php include "inc/head.php"; ?>
</head>
<body id="pagecursos">
	<?php include "inc/header-inn.php"; ?>
		<div class="row">
			<div class="container">
				<h2 class="text-center mt40 mb40 mainTitle">Que te gustaría aprender?</h2>
			</div>
		</div>
    </div> 

    <div class="row">
    	<div class="container" id="cursos-list">
    		<?php 
    			foreach($cursos as $rs): 
    				$oferta = number($rs['curso_oferta']);
					$precio_oferta = $oferta ? $rs['curso_preciooferta'] : 0;
					$precio_lista = $rs['curso_precio'];
    		?>
		    	<div class="item col-xs-12 col-md-4 ">
		    		<span></span>
		    		<div class="col-xs-12">
				    	<img src="<?php echo $rs["curso_image_small_url"] ?>" class="sfull">
				    	<h4 class="mt30"><?php echo $rs["curso_titulo"] ?></h4>
				    	<p class="mt20 descriptionTxt" ><?php echo cropwords($rs["curso_descripcion"],20); ?></p>
				    	
				    	<div class="col-md-6">
				    		<p class="mt20"><i class="fa fa-user"></i> <?php echo Curso::total_alumnos($rs["curso_id"]); ?></p>
				    	</div>

				    	<div class="info-product-price text-right mt10 col-xs-12 col-md-6 pr0">
							<?php if($oferta): ?>
								<p><div class="item_price">Gs. <?php echo number_format($precio_oferta,0,'','.'); ?></div> <del>Gs.<?php echo number_format($precio_lista,0,'','.'); ?></del></p>
							<?php else: ?>
								<div class="item_price">
									<?php echo "Gs. ".number_format($precio_lista,0,'','.'); ?>
								</div>
							<?php endif; ?>	
						</div>

						<div class="col-xs-12 p0">
				    		<a href=""  onclick="iniciar('<?php echo $rs["curso_id"];?>');return!1;" class="btn btn btnEmpreza mt20">Empeza Yá</a>
				    	</div>
			    	</div>
	    		</div>
    		<?php endforeach; ?>
    	</div>
    </div>

    <div class="row mt90 mb80">
    	<div class="container">
    		<div class="col-md-8 col-md-offset-2 banInf">
    			<span>
		    		<div class="col-md-6 text-center">
		    			<h3>No esperes más</h3>
						<h5 class="mt10">y suscríbete hoy mismo</h5>
		    		</div>
		    		<div class="col-md-6 text-center">
		    			<a class="btn btn-empezarahora mt10" href="./">Quiero empezar ahora!!!</a>
		    		</div>
		    	</span>
    		</div>
    	</div>
    </div>

    <div id="modalInicia" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  	<div class="modal-dialog">
	    	<div class="modal-content">
	      		<div class="modal-body">
	      			<h3 class="titleCurso text-center mt20">texto de titulo</h3>
	      			<p class="text-center mt20 txtDescripcion">Description</p>
	      			<hr class="separator">

	      			<?php if(!Alumno::login()): ?>
		      			<h4 class="text-center">Completa los datos y tendras la primera clase gratis. </h4>
			      		<form id="iniciaya" method="post" onsubmit="" autocomplete="off" action="">
			      			<fieldset class="mt20">
			      				<input type="" name="alumno_nombre" class="form-control" placeholder="Nombre">
			      			</fieldset>
			      			<fieldset class="mt20">
			      				<input type="" name="alumno_apellido" class="form-control" placeholder="Apellido">
			      			</fieldset>
			      			<fieldset class="mt20">
			      				<input type="" name="alumno_email" class="form-control" placeholder="Correo Electrónico">
			      			</fieldset>
			      			<fieldset class="mt20">
			      				<input type="" name="alumno_telefono" class="form-control" placeholder="Teléfono">
			      			</fieldset>
			      			<fieldset class="mt20">
			      				<input type="hidden" name="curso_id" id="curso_id" value="0">
			      				<button class="btn btn-danger text-center btn-lg sfull">Empezar mi primera clase. Gratis</button>
			      				<a href="portal/" class="btn btn-info mt10 text-center btn-lg sfull">Ya soy alumno. Iniciar el curso</a>
			      			</fieldset>
			      		</form>
			      	<?php  else: ?>
			      		<div id="btn_IniciarCurso" class="text-center">
			      			
			      		</div>
			      	<?php  endif; ?>
	      		</div>
	  		</div>
	  	</div>
	</div>

   
    <?php include "inc/footer.php"; ?>
    <?php include "inc/scripts.php"; ?>
    <script type="text/javascript">	
    	$(document).ready(function(){
    		var alto = $(".banInf").height();
    		$(".banInf span").height(alto); 

    		setTimeout('altura_empezaya();',200);
    	})


    	altoPrecio2 = alto_descripcion = 0;
    	function altura_empezaya(){
    		$("#cursos-list .item").each(function(){
    			if(alto_descripcion < $(this).find('.descriptionTxt').height()){
    				alto_descripcion = $(this).find('.descriptionTxt').height();
    			}
    			if(altoPrecio2 < $(this).find('div.info-product-price').height()){
    				altoPrecio2 = $(this).find('div.info-product-price').height();
    			}
    		})
    		$("#cursos-list .info-product-price").height(altoPrecio2);
    		$("#cursos-list .descriptionTxt").height(alto_descripcion);
    	}

    	$("#iniciaya").validate({
    		rules: {
                alumno_nombre: {required: true },
                alumno_apellido: {required: true },
                alumno_email: {
                    required: true,
                    email: true
                },
                alumno_telefono: {
                    required: true
                }
            },
            messages: {
                alumno_nombre: {required: "Campo obligatorio"}, 
                alumno_apellido: {required: "Campo obligatorio"},
                alumno_email: {required: "Indique su correo", email: "El email no es válido"},
                alumno_telefono: {required: "Numero de telefono obligatorio"}
            }
    	});


    	$("#iniciaya").on('submit',function(e){
    		e.preventDefault();
    		if($(this).valid()){
    			console.log("aprobado");
    		}
    	})


    	function iniciar(id){
    		$.ajax({
    			url: 'ajax/carga', 
    			data: {"accion": 'iniciacurso',"id":id},
    			type: 'post',
    			dataType: 'json',
    			success: function(res){
	    	 		$("#modalInicia .titleCurso").html(res.titulo);
    	 			$("#modalInicia .txtDescripcion").html(res.descripcion);
					$("#modalInicia #curso_id").val(res.id);
					$("#btn_IniciarCurso").html(res.button);
    				$("#modalInicia").modal({
		    			'show': true
		    		});
    			}
    		})
    	}
    </script>
</body>
</html>