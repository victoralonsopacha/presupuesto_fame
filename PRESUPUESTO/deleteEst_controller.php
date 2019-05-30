<?php
  $id=$_POST['id'];
  $id_producto=$_POST['id_producto'];
 
//Llamada al modelo
require_once("modelo.php");
$per=new Modelo();
$per->delete_registro($id);
//$per->get_resul_search($id_producto);

//require_once("iniciar_insert.php");
header("Location:iniciar_insert.php?id_producto='$id_producto'");
?>