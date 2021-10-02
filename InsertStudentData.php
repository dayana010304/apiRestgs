<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');

// Importar la conexion
include 'ParametrosDB.php';
 
// Conectar a la base de datos
 $con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
 
 // Obteniendo los datos en la variable $json.
 $json = file_get_contents('php://input');
 
 // Decodificando los datos en formato JSON en la variables $obj.
 $obj = json_decode($json,true);
 
 // Crear variables por cada campo.
 $S_Name = $obj['nombres_completos'];
 
 $S_Class = $obj['clase_a_cursar'];
 
 $S_Phone_Num = $obj['numero_telefono'];
 
 $S_Email = $obj['correo_electronico'];
 
 // Instrucción SQL para agregar el estudiante.
 $Sql_Query = "insert into tblestudiantes (nombres_completos,clase_a_cursar,numero_telefono,correo_electronico) values ('$S_Name','$S_Class','$S_Phone_Num','$S_Email')";
 
 
 if(mysqli_query($con,$Sql_Query)){
 
$MSG = 'Estudiante registrado correctamente...' ;
 
$json = json_encode($MSG);
 

 echo $json ;
 
 }
 else{
 
 echo 'Inténtelo de nuevo...';
 
 }
 mysqli_close($con);
?>