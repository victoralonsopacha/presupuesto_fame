<?php
  $id=$_POST['id'];
 
//Llamada al modelo
require_once("modelo.php");
$per=new Modelo();
$per->delete_registro($id);
	header("Location: registro_view.php");
?>