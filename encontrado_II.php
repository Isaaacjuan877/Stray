<?php
include 'conexion.php';

$message ='';
$Ubicacion=$_REQUEST['ubicacion'];
$NombreImg=$_FILES['image']['name'];
$archivo=$_FILES['image']['tmp_name'];
$ruta="IMGS";
$ruta=$ruta."/".$NombreImg;
$estado=$_POST['estado'];
move_uploaded_file($archivo, $ruta);
$ins = $conn -> query("INSERT INTO encontrados (id,ubicacion,estado,foto) values ('','$Ubicacion','$estado','$ruta')" );
if ($ins) {
	$message ='<li>Insertado correctamente</li>';
}else {
	$message ='<li>Error al insertar</li>';
}

require 'cargar.php';
?>