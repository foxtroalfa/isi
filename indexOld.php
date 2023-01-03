<?php 
	require "_sys/init.php";
	$banner = Banner::get("curso_id IN(0,999)", "banner_orden ASC");
	$cursos = Curso::get("","curso_orden ASC");
?>
<!DOCTYPE html>
<html>
<head>
	<?php include "inc/head.php"; ?>
    <meta name="title" content="ISI.EDU.PY Cursos de Excel Onilne de cero conocimiento a Experto">
    <meta name="description" content="Tu primera lección ¡Totalmente GRATIS!">
    <meta name="keywords" content="Excel Básico Intermedio, Excel Administrativo, Excel Financiero, PowerPivot, PowerBi. Empezá HOY, tu 1ra lección GRATIS. Clases 100% prácticas, instructores expertos en línea">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="Spanish">
    <meta name="author" content="ISI.edu.py">
    <meta name="robots" content="NOODP">

    

    <title>Cursos de Excel Online | de CERO conocimiento a EXPERTO</title>
</head>
<body>
	<?php 
		// include "inc/header-inn.php";  
		include "inc/header-new.php"; 
		if(haveRows($banner)):
	?>
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<?php if(count($banner) > 1): ?>
			<ol class="carousel-indicators">
				<?php for($x=0;$x<count($banner); $x++): ?>
					<li data-target="#myCarousel" data-slide-to="<?php echo $x; ?>" class="<?php echo $x == 0 ? "active" : ""; ?>"></li>
				<?php endfor; ?>
			</ol>
		<?php endif; ?>
		<div class="carousel-inner" role="listbox">
			<?php foreach ($banner as $i => $rs): ?>
                <div class="item <?php echo $i == 0 ? 'active' : ''; ?>" data-duration="15000" style="<?php echo $rs['curso_id'] == "999" ? 'cursor:  pointer;' : ''; ?>"> 
                    <span>
                        <div 
                            class="text-center item <?php echo strlen($rs['banner_enlace']) > 0 ? 'bannerLink' : ''; ?> 
                        <?php echo $i == 0 ? 'active' : ''; ?>" <?php if($rs['curso_id'] == "999"){echo 'onclick="empezarCompraBanner(\''.$rs['curso_id'].'\',\'payment\');return!1;"';}else if(strlen($rs['banner_enlace']) > 0){ ?> onclick="empezar('<?php echo $rs['banner_enlace']; ?>');return!1;" <?php } ?>
                        > 
                            <img src="<?php echo $rs['banner_image_big_url'] ?>" style="max-width: 100%;">
                        </div>
                    </span>
                </div>
            <?php endforeach; ?>
		</div>

		<?php if(count($banner) > 1): ?>
			<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Anterior</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Siguiente</span>
			</a>
		<?php endif; ?>
		<!-- The Modal -->
    </div> 
<?php endif; ?>
	<!-- The Modal -->
        <div class="row">
            <div class="container introduccion">
                <h3 class="text-center mb30 short-title"><i></i><span>CURSOS ONLINE</span></h3>
                <div class="" id="intro-cursos">
                    <?php
                        foreach($cursos as $i => $rs): 
                            $oferta = number($rs['curso_oferta']);
                            $precio_oferta = $oferta ? $rs['curso_preciooferta'] : 0;
                            $precio_lista = $rs['curso_precio'];
                            echo (($i%4) == 0) ? '<div class="clearfix"></div>' : '';
                            $link = array(
                                "url" => ($rs['curso_proximamente'] == 0) ? slugit($rs['curso_titulo']) : '',
                                "txt" => ($rs['curso_proximamente'] == 0) ? (($i == 0) ? '<small>TU 1ra Y 2da. LECCIÓN GRATIS</small><br>EMPEZAR AHORA<br><small>CLICK AQUI</small><br>' : '<small>TU PRIMERA LECCIÓN GRATIS</small><br>EMPEZAR AHORA<br><small>CLICK AQUI</small><br>' ) : '<br>PRÓXIMAMENTE',
                                "class" => ($rs['curso_proximamente'] == 0) ? 'btn col-md-12 col-xs-12 btn btnVermas active' : 'btn col-md-12 col-xs-12 btn btnVermas disabled',
                                "style" => ($rs['curso_proximamente'] == 0) ? '' : 'style="color: #333; background: #999;"',
                                "onclick" => ($rs['curso_proximamente'] == 0) ? '' : 'onclick="return!1;"'
                            );
                    ?>
                                <div class="cursosIntro item">
                                    <div class="col-xs-12 mt10 mb50 col-md-3 positionrelative">
                                        <div class="col-xs-12 col-md-12 p0">
                                            <?php if($rs['curso_proximamente'] == 1): echo '<span class="nextTime"></span>';  endif; ?>
                                            <a class="col-xs-12" style="padding: 0 !important;" href="<?php echo $link['url'] ?>" <?php echo $link['onclick'] ?>>
                                                <img class="img-responsive" src="<?php echo $rs['curso_image_small_url']; ?>">
                                            </a>
                                            <!-- <h4><?php echo $rs["curso_titulointroduccion"] ?></h4> -->
                                            <div class="col-md-12 col-xs-12">
                                                <p><?php echo $rs["curso_intro"] ?></p>
                                            </div>
                                            <div class="col-xs-12 col-md-12">
                                                
                                                <a class="<?php echo $link['class'] ?>" href="<?php echo $link['url'];?>" <?php echo $link['style'];?> <?php echo $link['onclick'] ?>>
                                                    <?php echo $link['txt']; ?>
                                                </a>    

                                                <?php /*if($rs['curso_proximamente'] == 0): ?>
                                                    <a class="btn col-md-12 col-xs-12 btn btnVermas active" href="<?php echo slugit($rs['curso_titulo']);?>">
                                                        <small><?php echo  $i == 0 ? 'TU 1ra Y 2da. LECCIÓN GRATIS' : 'TU PRIMERA LECCIÓN GRATIS';?></small><br>EMPEZAR AHORA
                                                    </a>
                                                <?php else: ?>
                                                    <a class="btn col-md-12 col-xs-12 btn btnVermas disabled" style="color: #333; background: #999;" href="" onclick="return!1;">                                                    
                                                        <br>PRÓXIMAMENTE
                                                    </a>
                                                <?php endif;*/ ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div> 
    

    <div class="row mt0 mb50">
        <div class="container p0">
            <div class="col-md-12 col-xs-12 banInf">
                <p class="col-xs-12 col-md-12 text-center">
                    Somos expertos, <b>¡sabemos lo que hacemos!</b><br>
                    Con <b>20 años de experiencia</b> y con más de <b>40.000<br>
                    alumnos egresados</b>, te garantizamos <b>calidad</b><br>
                    y un <b>excelente aprendizaje</b>
                </p>
            </div>
        </div>
    </div>

    <?php 
    	include "inc/footer.php"; 
    	include "inc/scripts.php"; 
    ?>

    <script type="text/javascript">

    	altoIntro_img = alto_title = alto_intro = alto_precio = altoPrecio2 = 0;
    	function verAlturaItems(){
    		$(".cursosIntro").each(function(){
    			if(altoIntro_img < $(this).find('img').height()){
    				altoIntro_img = $(this).find('img').height();
    			}
    			if(alto_title < $(this).find('h4').height()){
    				alto_title = $(this).find('h4').height();
    			}
    			if(alto_intro < $(this).find('p').height()){
    				alto_intro = $(this).find('p').height();
    			}
    			if(alto_precio < $(this).find('div.info-product-price').height()){
    				alto_precio = $(this).find('div.info-product-price').height();
    			}
    		})

    		//$(".cursosIntro img").height(altoIntro_img);
    		$(".cursosIntro h4").height(alto_title);
    		$(".cursosIntro p").height(alto_intro);
    		$(".cursosIntro .info-product-price").height(alto_precio);
    	}

    	function altura_empezaya(){
    		$("#cursos-list .item").each(function(){
    			if(altoPrecio2 < $(this).find('div.info-product-price').height()){
    				altoPrecio2 = $(this).find('div.info-product-price').height();
    			}
    		})
    		$("#cursos-list .info-product-price").height(altoPrecio2);
    	}

    	$(document).ready(function(){
    		setTimeout('verAlturaItems(); altura_empezaya();',200);
    	})

    	inivideo = null;

    	$("#primeraClaseVideo").validate({
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
    	})


    	$("#iniciaya, #primeraClase").validate({
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
    	})

    	$("#primeraClaseVideo").on('submit',function(e){
    		e.preventDefault();
    		if($(this).valid()){
    			 $.ajax({
    			 	url: 'ajax/registra',
    			 	data: $(this).serialize(),
    			 	type: 'post',
    			 	success: function(res){
    			 		$("#clasevideo-content").empty();
    			 		$("#clasevideo-content").html(res);
    			 	}
    			 })
    		}
    	})

		function cargaForm(){
			$("#viewModal #video_content").addClass('hidden');
			$("#formIniciar").removeClass('hidden');
		}

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

    	function iniciaCursoLogin(id){
    		$.ajax({
    			url: 'ajax/carga',
    			data: {"accion":'logincurso',"curso_id":id},
    			type: 'post',
    			success: function(res){
    				location.href = 'portal/curso?curso_id='+id; 
    			}
    		})
    	}

    	$("#primeraClase").on('submit',function(e){
    		e.preventDefault();
    		if($(this).valid()){
    			console.log($(this).serialize());
    		}
    	})

    	$("#iniciaya").on('submit',function(e){
    		e.preventDefault();
    		var curso_id = $("#iniciaya #curso_id").val();   		
    		if($(this).valid()){
    			$.ajax({
    				url: 'ajax/registra',
    				data: $(this).serialize(),
    				type: 'post',
    				success: function(res){
    					$("#modalInicia .modal-body").html(res);
    				}
    			})
    		}
    	})

    	function viewModal(id, curso){
    		var accion = "muestracurso";
    		if(!curso){
    			accion = "introduccion";
    		}
    		$.ajax({
    			url: 'ajax/carga', 
    			data: {"accion": accion,"id":id},
    			type: 'post',
    			dataType: 'json',
    			success: function(res){
    				clearTimeout(inivideo);
    				$("#viewModal #video_content").removeClass('hidden');
    				$("#formIniciar").addClass('hidden');
					$("#viewModal .modal-body #video_content").html(res.video);
    	 			$("#viewModal .tit_cursov").html(res.titulo);
					$("#viewModal #curso_id").val(res.id);
					$("#viewModal #btn_IniciarVideo").html(res.logueado);
    				$("#viewModal").modal({
		    			'show': true,
		    			'onEscape': true,
		    			"backdrop": 'static', 
		    			"keyboard": false
		    		});
		    		$('#viewModal video').trigger('play');
    			}
    		})
    	}


    	$("#viewModal button").click(function(){
	        $('#viewModal video').get(0).pause();
	    });

    	$(document).ready(function(){
    		var alto = $(".banInf").height();
    		$(".banInf span").height(alto); 
    	})

        $('#intro-cursos-md').owlCarousel({
            loop:false,
            margin:10,
            nav:true,
            dots: false,
            autoplay: true,
            responsive:{
                0:{items:1 },
                600:{items:<?php echo count($cursos) == 1 ? '1' : '2' ?> },
                1000:{items:<?php echo count($cursos) == 1 ? '1' : '4' ?> }
            }
        })

		$('#cursos-list').owlCarousel({
		    loop:true,
		    margin:10,
		    nav:true,
		    dots: false,
		    responsive:{
		        0:{items:1},
		        900:{items:2}
		    }
		})

        function empezar(curso_id){
            $.ajax({
                url: 'ajax/carga',
                type: 'post',
                dataType: "json",
                data: {'accion':'empezarCurso','curso_id':curso_id},
                success: function(res){
                    if(res){
                        location.href = res.url;
                    }
                }
            })
        }

        function empezarCompraBanner(curso_id, pay){
            var p = false;
            if(pay == "payment"){
                p = true;
            }
            $.ajax({
                url: 'ajax/carga',
                type: 'post',
                dataType: 'json',
                data: {'accion':'iniciaya','curso_id':curso_id, 'p': p},
                success: function(res){
                    var p = '';
                    if(res.payment != false){
                        p = '&p='+res.payment;
                    }
                    location.href= "portal/curso?t="+res.auth+p;
                }
            })
        }

    </script>
</body>
</html>