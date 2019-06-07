<?php

    $buscador=$_POST["buscador"];

    require_once("../MODELO/modelo.php");
    $resultado= new Modelo();
    $resultado->search($buscador);
    
    
    //header("Location: registro_view.php");

?>