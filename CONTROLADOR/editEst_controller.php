<?php
	 $id=$_POST['id'];
	 $nota=$_POST['nota'];
	 $egreso=$_POST['egreso'];
	 $fecha=$_POST['fecha'];
	 $p_actual=$_POST['p_actual'];
	 

//Llamada al modelo

require_once("../MODELO/modelo.php");
$per=new Modelo();

$per->edit_registro($id,$nota,$egreso,$fecha,$p_actual);

	header("Location: registro_view.php");
?>