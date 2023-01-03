<?php 
	require "_sys/init.php"; 
	$staff = Profesor::get();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Plantel de Profesores :: ISI</title>
	<?php include "inc/head.php"; ?>
</head>
<body id="pagestaff">
	<?php include "inc/header-inn.php"; ?>
	
		<div class="row">
			<div class="container">
				<h2 class="text-center mt40 mb40 mainTitle">Nuestra gente Clave</h2>
			</div>
		</div>
    </div> 

    <div class="row">
    	<div class="container">
    		<div class="team-wrap ">
    			<?php 
    				if(!haveRows($staff)):
    					echo '<p class="alert alert-info">No se enontraron registros.</p>';
    				else:
    					foreach($staff as $rs):
    			?>
			                <div class="col-md-4">
			                    <div class="team-single">
			                        <div class="team-member">
			                            <div class="team-img">
			                                <img src="<?php echo $rs['profesor_image_big_url'] ?>" class="attachment-people_index size-people_index wp-post-image" alt="<?php echo $rs['profesor_nombre'].' '.$rs["profesor_apellido"] ?>" width="360" height="240">
			                            </div>
			                        </div>
			                        <div class="team-title">
			                            <h5><?php echo $rs['profesor_nombre'].' '.$rs["profesor_apellido"] ?></h5>
			                            <span><?php echo $rs["profesor_cargo"] ?></span>
			                            <p class="mt20"><?php echo $rs["profesor_descripcion"] ?></p>
			                            <div class="t-s-link"></div>
			                        </div>  
			                    </div>
			                </div>
            <?php 
        				endforeach;
        			endif;
            ?>
           </div>
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

   
    <?php include "inc/footer.php"; ?>
    <?php include "inc/scripts.php"; ?>
    <script type="text/javascript">	
    	$(document).ready(function(){
    		var alto = $(".banInf").height();
    		$(".banInf span").height(alto); 
    	})    	
    </script>
</body>
</html>