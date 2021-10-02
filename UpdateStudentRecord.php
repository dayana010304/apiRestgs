<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');

include 'ParametrosDB.php';
 
$con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
 
$json = file_get_contents('php://input');
 
$obj = json_decode($json,true);
 
$S_ID = $obj['identificacion'];
 
$S_Name = $obj['nombres_completos'];
 
$S_Class = $obj['clase_a_cursar'];
 
$S_Phone_Num = $obj['numero_telefono'];
 
$S_Email = $obj['correo_electronico'];
 

$Sql_Query = "UPDATE tblestudiantes SET nombres_completos= '$S_Name', clase_a_cursar = '$S_Class', numero_telefono = '$S_Phone_Num', correo_electronico = '$S_Email' WHERE identificacion = $S_ID";
 
 if(mysqli_query($con,$Sql_Query)){
 
$MSG = 'El estudiante ha sido actualizado correctamente ...' ;
 
$json = json_encode($MSG);

 echo $json ;
 
 }
 else{
 
 echo 'Inténtelo de nuevo';
 
 }
 mysqli_close($con);
?>