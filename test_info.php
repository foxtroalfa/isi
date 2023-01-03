<?php 
    require "_sys/init.php";
    $data['logo'] = baseURL."images/logo_isi_footer_2x.png";
    $data['title'] = "Registro en aula virtual ISI";
    $data['contact_subject'] = "Alumno registrado Portal ISI";
    $data['send_date'] = date('d/m/Y H:i:s');

    $_POST['alumno_email'] = "dennisbareiro@gmail.com";
    $_POST['alumno_password'] = "12345";
    $nombre = "carga";
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
    //$to   = array($_POST['alumno_email'] => $nombre);
    $to   = array("dennisbareiro@gmail.com" => "Dennis prueba");
    $subject = "Registro :: Isi Virtual";
    $template = "alert_template.html";

    $d = Mail::send($from, $to, $subject, $template, $data);

    pr($d);
    exit;


    $_POST['contacto_status'] = 1;
      //$error = Contacto::save(0);

      $from = array("noresponder@tecnooffice.com.py" => "TecnoOffice");
      $to   = array(
        "dennisbareiro@gmail.com" => 'Dennis TecnoOffice'
      );
      $subject = "Contacto Recibido desde la web";
      $template = "contact_template.html";

      $data['contact_subject'] = "Mensaje recibido desde la Web";
      $data['send_date'] = date('Y-m-d H:i:s');
      $data['nombres'] = $_POST['contacto_nombre'].' '.$_POST['contacto_apellido'];
      $data['telefono'] = "{$_POST['contacto_telefono']}";
      $data['email'] = "{$_POST['contacto_email']}";
      $data['mensaje'] = "{$_POST['contacto_mensaje']}";

     //if(!is_array($error)){
        $para  = 'dennisbareiro@gmail.com';
        $título = 'Contacto desde la web de TecnoOffice';
        $mensaje = '
        <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Contacto</title>
        </head>

        <body>
        <table width="800" border="0" cellspacing="0" cellpadding="5">
          <tr>
            <td colspan="2"><h2>'.$data['contact_subject'].'</h2><hr /></td>
          </tr>
          <tr>
            <td colspan="2" bgcolor="#CCCCCC">Mensaje enviado en fecha: '.$data['send_date'].'</td>
          </tr>
          <tr>
            <td width="155" align="right"><strong>Nombre:</strong></td>
            <td align="left" width="625">'.$data['nombres'].'</td>
          </tr>
          <tr>
            <td align="right"><strong>Teléfono:</strong></td>
            <td align="left">'.$data['telefono'].'</td>
          </tr>
          
          <tr>
            <td align="right"><strong>E-mail:</strong></td>
            <td align="left">'.$data['email'].'</td>
          </tr>
            
          <tr>
            <td align="right" valign="top"><strong>Mensaje</strong></td>
            <td align="left" valign="top">'.$data['mensaje'].'</td>
          </tr>
          <tr align="left" valign="top">
            <td colspan="2" align="left" valign="top"><hr /></td>
          </tr>
        </table>
        </body>
        </html>
        ';

        // Para enviar un correo HTML, debe establecerse la cabecera Content-type
        $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
        $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        // Cabeceras adicionales
        $cabeceras .= 'To: TecnoOffice <dennisbareiro@gmail.com>' . "\r\n";
        $cabeceras .= 'From: Contacto desde la web de TecnoOffice <no-responder@tecnooffice.com.py>' . "\r\n";
        
        // Enviarlo
       // mail($para, $título, $mensaje, $cabeceras);
     //}




    echo "--";
    pr($d);
    echo "envio de mensaje";
?>