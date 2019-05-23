<?php
	 $id=$_POST['id'];
	 $id_producto=$_POST['id_producto'];
	 $nota=$_POST['nota'];
	 $egreso=$_POST['egreso'];
	 $fecha=$_POST['fecha'];
	 $p_actual=$_POST['p_actual'];
	 

//Llamada al modelo

require_once("modelo.php");
$per=new Modelo();

$per->edit_registro($id,$nota,$egreso,$fecha,$p_actual);

	require_once("iniciar_insert.php");
?>