<?php

//llamada al MODELO
require_once("../MODELO/modelo.php");

//instanciar a la clase modelo
//tambien instancio al constructor
//por el __construct
$per=new Modelo();

//ahora datos ya es un array de registros
//cargar la lista de los ultimos registros de cada producto
$datos=$per->get_all_register();
//carga los regcordatorios
$recordatories=$per->get_all_recordatorios();



//$per->load_cpc1($cpc_ingreso);



//llamada a la VISTA
require_once("../VISTA/registro_view.php");


?>

