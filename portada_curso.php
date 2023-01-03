<?php 
	require "_sys/init.php";
	$curso_id = numParam("id");
	$curso = Curso::select($curso_id);
	$banner = Banner::get("curso_id = '{$curso_id}'","banner_id DESC");
	$portada = Curso_portada::get("curso_id = '{$curso_id}'");
?>
<!DOCTYPE html>
<html>
<head>
	<?php include "inc/head.php"; ?>
    <link rel="stylesheet" href="css/magnific-popup.css">
    <?php 
        if(strlen($curso[0]['curso_meta'])>0): 
            echo strpos($curso[0]['curso_meta'], "<meta") !== false ? $curso[0]['curso_meta'] : '';
        endif;
    ?>
</head>
<body id="portada_curso">
	<?php 
		include "inc/header-inn.php"; 
		if(haveRows($banner)):
	?>
	<div id="myCarousel" class="carousel slide bannerPortadaInn" data-ride="carousel">
		<!-- Indicators -->
		<div class="carousel-inner" role="listbox">
			<?php foreach ($banner as $i => $rs): ?>
				<div class="item <?php echo $i == 0 ? 'active' : ''; ?>"> 
                    <span style="float: left; width: 100%; background: white;">
                        <img src="<?php echo $rs['banner_image_big_url'] ?>"class="img-responsive">
                    </span>
					<div class="internaBanner" style="position: absolute; width: 100%; top:  0;">
                        <div class="container">
    						<div class="carousel-caption pt0">
    							<div class="col-md-6 mt0">
                                    <h4 class="text-left hidden-xs hidden-sm txtbienvenida"><small style="color: <?php echo $curso_id == 19 ? '#2e5da1' : '#28834E'; ?>">Bienvenido/a al curso de</small></h4>
    								<div class="col-md-12 col-xs-12 titulobannercurso text-left pl0 mt0 pr0">
                                        <big <?php echo $curso_id == 19 ? 'style="color:#2e5da1"' : ''; ?>><?php echo $curso[0]['curso_titulo'];?></big>
                                        <?php $gratis = Curso_clase::get("curso_id = '{$curso_id}' AND clase_gratis = 1","clase_orden asc");?>

                                        <div id="nvideo" class="mb10">
                                            <video width="100%" id="video001" controls poster="<?php echo $gratis[0]['clase_image_big_url']; ?>" >
                                                <source rel="<?php echo $gratis[0]['clase_id']?>" src="<?php echo $gratis[0]['clase_file_url']; ?>" type="video/mp4">
                                            </video>
                                        </div>

                                        <?php 
                                            $col = count($gratis) == 2 ? 6 : 12;
                                            $pr0 = count($gratis) == 2 ? '' : 'pr0';
                                            foreach($gratis as $i => $rs):
                                                $act = $i == 0 ? 'active' : '';
                                                echo '
                                                    <div id="url_cl'.$rs['clase_id'].'" class="btnClasesGratis col-md-'.$col.' '.$pr0.' col-xs-12 pl0">
                                                        <a class="btn col-xs-12 col-md-12 btnvermas forma1 '.$act.' text-center" onclick="loadVideo(\''.$rs['clase_id'].'\');return!1;" >
                                                            Ver lección '.$rs['clase_orden'].' 
                                                            <br><big>Gratis</big>
                                                        </a>
                                                    </div>
                                                ';
                                            endforeach;
                                        ?>

                                        <div class="col-md-12 col-xs-12 pl0 pr0">

                                            <?php   
                                                $ahref = 'empezar();';
                                                $pago = 0;
                                                if(Alumno::login()){
                                                    $alumno_id = Alumno::login('alumno_id');
                                                    $datoCurso = Alumno_curso::get("curso_id = '{$curso_id}' AND alumno_id = '{$alumno_id}'");
                                                    if(haveRows($datoCurso)){
                                                        $ahref = 'cursoDetail(\''.$curso_id.'\');';
                                                        if($datoCurso[0]['ac_pago'] == 1){
                                                            $pago = 1;
                                                        }
                                                    }
                                                }
                                            ?>

                                            <a onclick="<?php echo $ahref;?>return!1;" class="btn col-xs-12 col-md-12 btnvermas forma1 letternormal active text-center">
                                                PARA IR A LA PLATAFORMA<br>
                                                <big>Y VER TODAS LAS LECCIONES</big><br>
                                                ¡Hace click aquí y empezá ya!
                                            </a>
                                        </div>
                                        <?php if($pago == 0): ?>
                                            <div class="col-md-6 col-xs-12">
                                                <a href="" onclick="empezar('payment');return!1;" class="btn btn-comprar">
                                                    <i class="fa fa-shopping-cart"></i>
                                                    Comprar ahora
                                                </a>
                                            </div>

                                            <div class="col-md-3 col-xs-6 mt10">
                                                <img src="images/formas-pago.png" class="img-responsive" alt="Formas de Pago">
                                            </div>

                                            <div class="col-md-3 col-xs-6 mt10">
                                                <img src="images/cobranzas.png" class="img-responsive" alt="Formas de Pago">
                                            </div>
                                        <?php endif; ?>
    								</div>
    							</div>
    						</div>
                            <div class="clearfix"></div>
                        </div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
		<!-- The Modal -->
    </div> 
<?php endif; ?>
		<!-- The Modal -->
		<?php 
			$cant = $ancho = 0;
			if(strlen($portada[0]['p_cuadro1'])> 0) $cant++;
			if(strlen($portada[0]['p_cuadro2'])> 0) $cant++;
			if(strlen($portada[0]['p_cuadro3'])> 0) $cant++;
            if(strlen($portada[0]['p_cuadro4'])> 0) $cant++;

			if($cant == 1) $ancho = 12;
			if($cant == 2) $ancho = 6;
			if($cant == 3) $ancho = 4;
            if($cant == 4) $ancho = 3;

			if($cant > 0):
		?>
		<div class="row mt30">
			<div class="container mt30">
					<?php 
						if(strlen($portada[0]['p_cuadro1']) > 0):
					?>
					<div class="col-md-<?php echo $ancho;?> box-reference col-xs-12 text-center">
                        <div class="col-xs-12">
    						<i class="fa fa-check"></i>
    						<?php echo $portada[0]['p_cuadro1']; ?>
                        </div>
					</div>
					<?php 
						endif;
						if(strlen($portada[0]['p_cuadro2']) > 0): 
					?>
						<div class="col-md-<?php echo $ancho;?> box-reference col-xs-12 text-center">
                            <div class="col-xs-12">
    							<i class="fa fa-check"></i>
    							<?php echo $portada[0]['p_cuadro2']; ?>
                            </div>
						</div>
					<?php 
						endif;
						if(strlen($portada[0]['p_cuadro3']) > 0):
					?>
						<div class="col-md-<?php echo $ancho;?> box-reference col-xs-12 text-center">
                            <div class="col-xs-12">
    							<i class="fa fa-check"></i>
    							<?php echo $portada[0]['p_cuadro3']; ?>
                            </div>
						</div>
					<?php 
                        endif;
                        if(strlen($portada[0]['p_cuadro4']) > 0):
                    ?>
                        <div class="col-md-<?php echo $ancho;?> box-reference col-xs-12 text-center">
                            <div class="col-xs-12">
                                <i class="fa fa-check"></i>
                                <?php echo $portada[0]['p_cuadro4']; ?>
                            </div>
                        </div>
                    <?php endif; ?>
			</div>
		</div>
		<?php endif; ?>
    </div> 

    <?php 
        //ancho si tiene banner lateral
        $ancho = strlen($portada[0]['p_image_big_url']) > 0 ? 8 : 12 ;
    ?>
    <div class="row mt20 mb50">
        <div class="container">
    		<div class="col-md-12">
                <div class="panel-group">                
                    <?php 
                        if(strlen($portada[0]['p_descripcion'])>0):
                            echo '
                                <div class="panel panel-default listaDetalleCurso">
                                    <div class="panel-collapse collapse in">
                                        <h4 class="panelHeaderH4 text-center mt20">
                                            ¿Qué aprenderás en el curso?
                                        </h4>
                                        <div class="panel-body-inn">
                                            <div class="mt10 text-center">
                                                '.$portada[0]['p_descripcion'].'
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            ';
                        endif;

                        if(strlen($portada[0]['p_dirigido'])>0):
                            echo '
                                <div class="panel panel-default listaDetalleCurso">
                                    <div class="panel-collapse collapse in">
                                        <h4 class="panelHeaderH4 text-center">
                                            ¿A quién va dirigido el curso y cómo funciona?
                                        </h4>
                                        <div class="panel-body-inn">
                                            <div class="mt10 text-left">
                                                '.$portada[0]['p_dirigido'].'
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            ';
                        endif;
                    ?>

                    <div class="row mt50 mb0 contenidoprogramatico">
				    	<div class="container"> 
				            <h3 class="text-center mb20 short-title"><i></i><span>Contenido Programático</span></h3>
				        </div>
				    </div>
                    
                    <?php 
                        $clases = Curso_clase::get("curso_id = '{$curso_id}'","clase_orden asc");
                        if($curso_id != '21'){
                            if(haveRows($clases)):
                    ?>
                                <div class="panel panel-default listaDetalleCurso">
                                    <div class="panel-collapse collapse in">
                                        <h4 class="panelHeaderH4 text-left">
                                            <i class="fa fa-play"></i> <?php echo $curso[0]['curso_titulo'];?>
                                        </h4>
                                        <div class="panel-body-inn">
                                            <div class="mt10">
                                                <ul class="clasesList">
                                                    <?php foreach($clases as $cl): ?>
                                                        <li class=""><b>Lección <?php echo $cl['clase_orden'].'</b> - '.$cl['clase_descripcion']; ?></li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    <?php 

                            endif;
                        }else{
                        $lecciones = Curso_clase::get("curso_id = '{$curso_id}'");

                            if(haveRows($lecciones)){
                    ?>
                            <div class="panel panel-default listaDetalleCurso">
                                <div class="panel-collapse collapse in">
                                    <h4 class="panelHeaderH4 text-left">
                                        <i class="fa fa-play"></i> <?php echo $curso[0]['curso_titulo'];?>
                                    </h4>
                                    <div class="panel-body-inn">
                                        <div class="mt10">
                                            <ul class="clasesList">
                                                <?php foreach($lecciones as $le): ?>
                                                    <li class=""><b>Lección <?php echo $le['clase_orden'].'</b> - '.$le['clase_introduccion']; ?></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    <?php 
                            }
                        }
                    ?>


                <?php 
                    $ventaja = 0;
                    if(strlen($portada[0]['p_ventaja1']) > 0){
                        $ventaja++;
                    }
                    if(strlen($portada[0]['p_ventaja1']) > 0){
                        $ventaja++;
                    }
                    if(strlen($portada[0]['p_ventaja1']) > 0){
                        $ventaja++;
                    }
                    
                    switch ($ventaja) {
                        case '1':
                            $title = "VENTAJA";
                            $w = 12;
                            break;
                        case '2':
                            $title = "DOS VENTAJAS";
                            $w = 6;
                            break;
                        case '3':
                            $title = "TRES VENTAJAS";
                            $w = 4;
                            break;
                        
                        default:
                            // code...
                            break;
                    }
                ?>

                <?php  if($ventaja > 0): ?>
                    <div class="row mt50 mb0 contenidoprogramatico">
                        <div class="container"> 
                            <h3 class="text-center mb20 short-title"><i></i><span><?php echo $title; ?> DE APRENDER <?php  echo $curso[0]['curso_titulo'];?></span></h3>
                        </div>
                    </div>
                <?php endif; ?>
                
                <!-- ventajas -->

                <?php if(strlen($portada[0]['p_ventaja1']) > 0): ?>
                    <div class="col-md-<?php echo $w; ?> col-xs-12 text-center mt30 fadeInLeft">
                        <div class="item col-md-12 col-xs-12 text-center box-ventaja">
                            <picture class="scrolly mb20">
                                <img style="width: 70px" src="images/ico-ventaja1.png">
                            </picture>
                            <p class="mt20"><?php echo $portada[0]['p_ventaja1'] ?></p>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if(strlen($portada[0]['p_ventaja2']) > 0): ?>
                <div class="col-md-<?php echo $w; ?> col-xs-12 text-center mt30 fadeInLeft">
                    <div class="item col-md-12 col-xs-12 text-center box-ventaja">
                        <picture class="scrolly mb20">
                            <img style="width: 70px" src="images/ico-ventaja2.png">
                        </picture>
                        <p class="mt20"><?php echo $portada[0]['p_ventaja2'] ?></p>
                    </div>
                </div>
                <?php endif; ?>
                <?php if(strlen($portada[0]['p_ventaja3']) > 0): ?>
                <div class="col-xs-12 col-md-<?php echo $w; ?> text-center mt30 fadeInLeft">
                    <div class="item col-md-12 col-xs-12 text-center box-ventaja">
                        <picture class="scrolly mb20">
                            <img style="width: 70px" src="images/ico-ventaja3.png">
                        </picture>
                        <p class="mt20"><?php echo $portada[0]['p_ventaja3'] ?></p>
                    </div>
                </div>
                <?php endif; ?>
                <!-- ventajas -->
                </div>
    		</div>
    	</div>
    </div>

    <div class="row mt50 mb20" id="portadaFlagPlataforma">
        <div class="container p0">
            <div class="col-md-12 col-xs-12 p0">
                <a href="" onclick="empezar();return!1;" class="btn col-xs-12 col-md-12 btnvermas forma1 letternormal active text-center">
                    PARA IR A LA PLATAFORMA<br>
                    <big>Y VER TODAS LAS LECCIONES</big><br>
                    ¡Hace click aquí y empezá ya!
                </a>
            </div>
        </div>
    </div>

    <div class="row mt30 mb80" id="portadaFlag">
        <div class="container p0">
            <div class="col-md-12 col-xs-12 banInf">
                <p class="col-xs-12 col-md-12 text-center">
                    ¿Todavía tienes dudas para adquirir el mejor curso de <br>
                    <?php echo $curso[0]['curso_titulo'] ?>? <br><br>
                    Contáctanos y responderemos personalmente a todas tus consultas <br>
                    RECUERDA QUE: <br>¡<big><b>TU FUTURO ES HOY</b></big>!
                </p>

                <div class="col-md-8 col-xs-12 col-md-offset-2 mt40 lineContactos">
                    <div class="col-md-6 col-xs-12 text-center">
                        <div class="col-md-12 col-xs-12">
                            <i class="fa fa-phone"></i><br>
                            <a target="_blank" class="link-contactenos" href="https://api.whatsapp.com/send?phone=595981501007&text=Bienvenido%20al%20chat%20del%20Centro%20de%20Formaci%C3%B3n%20y%20Capacitaci%C3%B3n%20Laboral,%20en%20que%20podemos%20ayudarte?">+595 981 501 007</a>
                        </div>
                    </div>

                    <div class="col-md-6 col-xs-12 text-center">
                        <div class="col-md-12 col-xs-12">
                            <i class="fa fa-envelope"></i><br>
                            <a target="_blank" class="link-contactenos" href="mailto:isionline@isi.edu.py">isionline@isi.edu.py</a>
                        </div>
                    </div>
                </div>
                <div class="WhatsApp col-xs-12 col-md-12 mt30 hidden">
                    <div class="col-md-6  col-xs-12 col-md-offset-3 bg-white">
                        <img class="ico-whatsapp" src="<?php echo baseURL; ?>images/ico-whatsapp.png">
                        <div class="col-md-12 text-center">
                            <p><a target="whatsapp" style="border:none;" href="https://api.whatsapp.com/send?phone=595983200252&text=Bienvenido al chat del Centro de Formación y Capacitación Laboral, en que podemos ayudarte?">INICIAR CHAT WHATSAPP</a></p>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <?php 
    	include "inc/footer.php"; 
    	include "inc/scripts.php"; 
    ?>
    <script src="js/jquery.magnific-popup.js"></script>
     <script type="text/javascript">

        function cursoDetail(cid){
            location.href = 'portal/curso?curso_id='+cid;
        }

        $(document).ready(function() {
          $('.image-link').magnificPopup({type:'image'});
        });

        alto_empezaya = alto_descripcion = 0;
        function verAlturaItems(){
            $(".listaDetalleCurso").each(function(){
                if(alto_descripcion < $('.listaDetalleCurso div').height()){
                    alto_descripcion = $('.listaDetalleCurso div').height();
                }
            })

            $(".listaDetalleCurso div").height(alto_descripcion);
        }

        clase_gratis = '<?php echo $gratis[0]['clase_id'];?>';
        function loadVideo(clase_id){

            var alto =  $("#nvideo video").height();
            $("#nvideo").css({"height":alto+'px'});

            $(".btnClasesGratis a").removeClass('active');
            if(clase_gratis == clase_id){
                $("#video001")[0].play();
            }else{
                $("#video001")[0].pause();
                $.ajax({
                    url: 'ajax/carga',
                    data: {'clase_id':clase_id,"accion":"cargaVideo"},
                    type: 'post',
                    dataType: 'json',
                    success: function(res){
                        $("#nvideo").html(res.video);
                    }
                });
                clase_gratis = clase_id;
            }
            $("#url_cl"+clase_id+" a").addClass('active');
        }

        function altura_empezaya(){
            $(".box-reference").each(function(){
                if(alto_empezaya < $(this).find('div').height()){
                    alto_empezaya = $(this).find('div').height();
                }
            })
            $(".box-reference > div").height(alto_empezaya);
        }

        $(document).ready(function(){
            //setTimeout('verAlturaItems(); altura_empezaya();',200);
            setTimeout(' altura_empezaya();',200);
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
                    //location.href = 'portal/curso?curso_id='+id;
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
            setTimeout("videoTop()",500);
        })


        function videoTop(){
            //var altBanner = $(".carousel-inner span").height();
            var altImg = $("#myCarousel span > img").height();
            var altinternaBanner = $("#myCarousel .internaBanner").height();

            var h = altImg;
            if(altinternaBanner > altImg){
                h = altinternaBanner-altImg;
                //$("#myCarousel span > img").css({"margin-top":(h+10)+'px'});
                $("#myCarousel span").css({"padding-bottom":(h+10)+'px'});
            }
            
            //$("#myCarousel .carousel-inner").height(altBanner+10);
            /*
            $(".carousel-inner .container").css({
                'margin-top':'-'+altBanner+'px',
                'margin-bottom': (altBanner/4)+'px'
            });
            */
        }

        function empezar(pay){
            var p = false;
            if(pay == "payment"){
                p = true;
            }
            $.ajax({
                url: 'ajax/carga',
                type: 'post',
                dataType: 'json',
                data: {'accion':'iniciaya','curso_id':'<?php echo $curso_id;?>', 'p': p},
                success: function(res){
                    if(res){
                        var p = '';
                        if(res.payment != false){
                            p = '&p='+res.payment;
                        }
                        location.href= "portal/curso?t="+res.auth+p;
                    }
                }
            })

        }

        $('#intro-cursos').owlCarousel({
            loop:false,
            margin:10,
            nav:true,
            dots: false,
            autoplay: true,
            responsive:{
                0:{items:1 },
                600:{items:2 },
                1000:{items:2 }
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

    </script>
</body>
</html>