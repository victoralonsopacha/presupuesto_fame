<?php

    $cpc=$_POST['cpc'];
    $descripcion=$_POST['descripcion'];
    $nota=$_POST['nota'];
    $p_actual=$_POST['p_actual'];
    $fecha=$_POST['fecha'];
    $tipo=$_POST['tipo'];
    $id_producto=$_POST['id_producto'];

    require_once("modelo.php");
    $per=new Modelo();
    
    $recibir=$per->insert_product($cpc,$descripcion,$p_actual,$tipo,$fecha,$nota,$id_producto);    
    
    header("Location: registro_view.php");

?>