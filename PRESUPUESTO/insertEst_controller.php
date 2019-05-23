<?php
	$id_producto=$_POST['id_producto'];
	$nota=$_POST['nota'];
	$egreso=$_POST['egreso'];
	$fecha=$_POST['fecha'];
	$p_actual = $_POST['p_actual'];
	$ingreso=$_POST['ingreso'];


	//Llamada al modelo

	require_once("modelo.php");
	$per=new Modelo();

	
	if($ingreso){
		$per->insert_ingreso($id_producto,$nota,$ingreso,$p_actual,$fecha);
	}else{
		$per->insert_egreso($id_producto,$nota,$egreso,$fecha,$p_actual);
	}
	

	header("Location: registro_view.php");
	//require_once("iniciar_insert.php");

 	//header("Location: iniciar_insert.php");


?>