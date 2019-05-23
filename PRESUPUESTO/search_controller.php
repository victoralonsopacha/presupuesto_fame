<?php

    $buscador=$_POST["buscador"];

    require_once("../MODELO/modelo.php");
    $resultado= new Modelo();
    $resultado->search($buscador);
    
    
    //require_once("../VISTA/registro_view.php");
    //header("Location: registro_view.php");

?>