<?php
require "_sys/init.php";

$json = file_get_contents('php://input');

$dataH = json_decode($json, true);

$email = $dataH['data']['buyer']['email'] ?? null;

// file_put_contents('./log_'.date("j.n.Y").'.log', json_encode($data), FILE_APPEND);
$idHotmart = $dataH['data']['product']['id'] ?? null;

$alumno = Alumno::get("alumno_email = '{$email}'");
$curso = Curso::get("boton_hotmart = '{$idHotmart}'");

//$curso = Curso::select(21);
//$hotmartId = $curso[0]["boton_hotmart"];

$alumno_id = haveRows($alumno) ? $alumno[0]['alumno_id'] : null;
$curso_id = haveRows($curso) ? $curso[0]['curso_id'] : null;

// si pago el curso completo
alumno_curso::set('ac_pago',1,"alumno_id = '{$alumno_id}' AND  curso_id = '{$curso_id}'");
alumno_curso::set('ac_estado',"En curso","alumno_id = '{$alumno_id}' AND curso_id = '{$curso_id}'");
alumno_cursoclase::set("acc_estado", 'Pagado',"alumno_id = '{$alumno_id}' AND curso_id = '{$curso_id}'");
$sql = "UPDATE ac_vence = now() ".TIEMPO_VENCIMIENTO." FROM alumno_curso WHERE alumno_id = '{$alumno_id}' AND curso_id = '{$curso_id}'";
DB::execute($sql);

//if(!Alumno::login()){
    //$existe = Alumno::get("alumno_email = '{$_POST['alumno_email']}' OR alumno_cedula = '{$_POST['alumno_cedula']}'");
    /* if(haveRows($existe)){
         Alumno::set("alumno_status",1,"alumno_id = '{$existe[0]['alumno_id']}'");
         Alumno::set("alumno_hidden",0,"alumno_id = '{$existe[0]['alumno_id']}'");
         $_POST["alumno_id"] = $existe[0]['alumno_id'];
         $email = $existe[0]['alumno_email'];
         $pass = $existe[0]['alumno_password'];
         $status = false;
    }else{ */
         $_POST["alumno_password"] = uniqcode($minLen=4,$maxLen=6,$sym=false);
         $nombre = $_POST['alumno_nombre'].' '.$_POST['alumno_apellido'];
         
         $data['logo'] = baseURL."images/logo_isi_footer_2x.png";
         $data['title'] = "Registro en aula virtual ISI";
         $data['contact_subject'] = "Alumno registrado Portal ISI";
         $data['send_date'] = date('d/m/Y H:i:s');
         $data["content"] = '<p style="text-align:center">
                               <strong>'.$nombre.'</strong> te damos la bienvenida al portal virtual ISI, 
                                tus datos de acceso a la plataforma son: 
                              </p>
                              <p>Email: <strong>'.$_POST['alumno_email'].'</strong></p>
                              <p>Clave de acceso: <strong>'.$_POST['alumno_password'].'</strong></p>
                              <p>Puedes ingresar a la seccion "Mi perfil" para modificar la clave generada por una de tu preferencia.</p>
                              <hr>
                              <p style="text-aling:center">
                                  <a href="'.baseURL.'" target="_blank">Ingresar al portal</a>
                              </p>
                              <hr>';

              $from = array("noresponder@isi.edu.py" => "Isi Virtual");
              $to   = array($_POST['alumno_email'] => $nombre);
              $subject = "Registro :: Isi Virtual";
              $template = "alert_template.html";
             // if($_POST['alumno_email'] != 'dennisbareiro@gmail.com'):
                   Mail::send($from, $to, $subject, $template, $data);
              //endif;
         $_POST["alumno_status"] = 1;
         $_POST["alumno_id"] = alumno::save(0);

         $email = $_POST['alumno_email'];
         $pass = $_POST['alumno_password'];
         $status = true;
    //}
    Alumno::setLogin($email, $pass, $status);
//}else{
    $_POST['alumno_id'] = Alumno::login("alumno_id");
//}

file_put_contents('./log_'.date("j.n.Y").'.log', json_encode($data), FILE_APPEND);



