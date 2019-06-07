<?php
	 $id=$_POST['id'];
	 $id_producto=$_POST['id_producto'];
	 $nota=$_POST['nota'];
	 
	 $ingreso=$_POST['ingreso'];
	 $fecha=$_POST['fecha'];
	 $p_actual=$_POST['p_actual'];
	 $p_inicial=$_POST['p_inicial'];
	 

	//Llamada al modelo

	require_once("modelo.php");
	$per=new Modelo();

	$per->edit_p_producto($id_producto,$fecha,$nota,$p_inicial,$p_actual,$ingreso);

		require_once("iniciar_insert.php");
?>