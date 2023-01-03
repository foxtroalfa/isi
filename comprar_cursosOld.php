<?php 
	require "_sys/init.php";
	$banner = Banner::get("curso_id = 0", "banner_orden ASC");
	$cursos = Curso::get("","curso_orden ASC");
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
<body>
	<?php include "inc/header-inn.php"; ?>
	<!-- The Modal -->
        <div class="row">
            <div class="container introduccion">
                <h3 class="text-center mb30 short-title"><i></i><span>CURSOS</span></h3>
                <div class="" id="intro-cursos">
                    <?php
                        foreach($cursos as $i => $rs): 
                            $oferta = number($rs['curso_oferta']);
                            $precio_oferta = $oferta ? $rs['curso_preciooferta'] : 0;
                            $precio_lista = $rs['curso_precio'];
                            
                            $alumno_id = Alumno::login("alumno_id");
                            $adquirido = Alumno_curso::get("alumno_id = '{$alumno_id}' AND curso_id = '{$rs['curso_id']}' AND ac_estado != 'Pendiente'");

                            $link = array(
                                "txt" => $adquirido  ? '<i class="fa fa-check"></i>Ver curso' :  '<i class="fa fa-shopping-cart"></i>Comprar ahora',
                                "class" => $adquirido ? 'btn btn-comprar btn-comprado' : 'btn btn-comprar',
                                "onclick" => $adquirido ? 'empezarCompra(\''.$rs['curso_id'].'\');return!1;' : 'empezarCompra(\''.$rs['curso_id'].'\',\'payment\');return!1;'
                            );
                    ?>
                            <?php if($rs['curso_proximamente'] == 0): ?>
                                <div class="cursosIntro item">
                                    <div class="col-xs-12 mt10 mb50 col-md-3 positionrelative">
                                        <div class="col-xs-12 col-md-12 p0">
                                            <a class="col-xs-12" style="padding: 0 !important;"  href="" <?php echo $link['onclick'] ?>>
                                                <img class="img-responsive" src="<?php echo $rs['curso_image_small_url']; ?>">
                                            </a>
                                            <!-- <h4><?php echo $rs["curso_titulointroduccion"] ?></h4> -->
                                            <div class="col-md-12 col-xs-12">
                                                <p><?php echo $rs["curso_intro"] ?></p>
                                            </div>
                                            <div class="col-xs-12 col-md-12">
                                                <div class="col-xs-12 pl0 pr0 mb30">
                                                    <a href="" onclick="<?php echo $link['onclick'] ?>" class="<?php echo $link['class'] ?>">
                                                        <?php echo $link['txt'] ?>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
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


    	$("#viewModal button").click(function(){ //agrego la funcion click a las etiquetas "button" para que al cerrar el modal pongan pausa al video, como vez utilice la etiqueta <video> y con el id del div utilizo la función pause();
	        $('#viewModal video').get(0).pause();
	    });

    	$(document).ready(function(){
    		var alto = $(".banInf").height();
    		$(".banInf span").height(alto); 

            // $('#myCarousel').carousel({
            //   interval: 12000
            // });
    	})

        /*
    	$('#intro-cursos').owlCarousel({
		    loop:false,
		    margin:10,
		    nav:true,
		    dots: false,
		    autoplay: false,
            loop: true,
		    responsive:{
		        0:{items:1 },
		        600:{items:<?php echo count($cursos) == 1 ? '1' : '2' ?> },
		        1000:{items:<?php echo count($cursos) == 1 ? '1' : '4' ?> }
		    }
		})
        */

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

        function empezarCompra(curso_id, pay){
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