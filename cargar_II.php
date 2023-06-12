<?php
include 'conexion.php';

$message ='';
$Tmascota=$_REQUEST['tm'];
$Imagen=addslashes(file_get_contents($_FILES['fotografia']['tmp_name']));

$descripcion=$_POST['descripcion'];

if ($Tmascota==='Felino') {
	# code...
}
$ins = $conn -> query("INSERT INTO perdidos (id,tipo,fotografia,descripcion) values ('','$Tmascota','$Imagen','$descripcion')" );
if ($ins) {
	$message ='<li>Insertado correctamente</li>';
}else {
	$message ='<li>Error al insertar</li>';
}

require 'cargar.php';
?>