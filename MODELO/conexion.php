<?php

//trae las constantes de config.php
require "config.php";

class Conexionbdd
{
    public static function Conectar()
    {
        $conexiondb=new mysqli(DB_HOST,DB_USUARIO,DB_PASSWORD,DB_NOMBRE);
        
        if($conexiondb->connect_errno)
        {
            echo "COMPRUEBA LA CONEXION A LA BASE";
            return;
        }
        
        $conexiondb->set_charset(DB_CHARSET);
        return $conexiondb;
    }
        
    
}


?>