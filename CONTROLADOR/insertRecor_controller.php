<?php
  $dia=$_POST['dia'];
  $mes=$_POST['mes'];
  $anio=$_POST['anio'];
  $observacion=$_POST['observacion'];
  
 
//Llamada al modelo
require_once("../MODELO/modelo.php");
$per=new Modelo();
$per->insert_recordatorio($dia,$mes,$anio,$observacion);
	header("Location: registro:view.php");
?>