<?php


//phpinfo();
exit;
$ip = $_SERVER['REMOTE_ADDR']; // Esto contendrá la ip de la solicitud.
 
// Puedes usar un método más sofisticado para recuperar el contenido de una página web con PHP usando una biblioteca o algo así
// Vamos a recuperar los datos rápidamente con file_get_contents
$dataArray = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));
 
//var_dump($dataArray);
 
//echo "Hola visitante desde: ".$dataArray["geoplugin_countryName"];

echo '<pre>';
print_r($dataArray->geoplugin_countryCode);
echo '</pre>';

exit;


// <?php if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
//     echo $ip = $_SERVER['HTTP_CLIENT_IP'];
// } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
//     echo $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
// } else {
//     echo $ip = $_SERVER['REMOTE_ADDR'];
// }