<?php
	 $id=$_POST['id'];
	 $id_producto=$_POST['id_producto'];
	 $nota=$_POST['nota'];
	 $anterior_egreso=$_POST['anterior_egreso'];
	 $egreso=$_POST['egreso'];
	 $ingreso=$_POST['ingreso'];
	 $fecha=$_POST['fecha'];
	 $p_actual=$_POST['p_actual'];
	 $p_inicial=$_POST['p_inicial'];
	 

	//Llamada al modelo

	require_once("modelo.php");
	$per=new Modelo();

	$per->edit_registro($id,$nota,$anterior_egreso,$egreso,$ingreso,$fecha,$p_actual);

		require_once("iniciar_insert.php");
?>