<?php
require('_sys/init.php');
$response = file_get_contents('php://input');


pr($response);
exit;

/*

if(!empty($response)) {
    $response = json_decode($response); 
    if(isset($response->operation->shop_process_id) && $response->operation->shop_process_id > 0) {
        if($response->operation->response_code == '00') {
            ExecuteReader("UPDATE a_bancard SET estado = 'PAGADO', respuesta = '*?*' WHERE id = *?*;", array(
                serialize($response),
                $response->operation->shop_process_id
            ));
        } else {
            ExecuteReader("UPDATE a_bancard SET estado = 'ERROR', respuesta = '*?*' WHERE id = *?*;", array(
                serialize($response),
                $response->operation->shop_process_id
            ));
        }
        $response = array('status' => 'success');
        echo json_encode($response);
    } else {
        ExecuteReader("UPDATE a_bancard SET estado = 'ERROR', respuesta = '*?*' WHERE id = *?*;", array(
            serialize($response),
            $response->operation->shop_process_id
        ));
        $response = array('status' => 'error');
        echo json_encode($response);
    }
}
*/
?>