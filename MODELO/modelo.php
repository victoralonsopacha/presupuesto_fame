<?php

//se debe llamar a la conexion
require "conexion.php";

//aqui se definen las consultas a la base

class Modelo
{
    private $registro;
    private $db;
    private $recordatorios;
    private $busqueda;
    private $cpc;
    private $resultado;


    
    public function __construct()
    {
        //invoca y almacena en db a la clase Conexionbdd y lo que tenga la funcion Conectar
        $this->db=Conexionbdd::Conectar();
        
        //vamos a declarar a registro como un array
        $this->registro=array(); 

        $this->recordatorios=array();

        $this->busqueda=array();

        $this->cpc=array();

        $this->resultado=array();

    }
    

    //FUNCION PARA OBTENER LOS ULTIMOS REGISTROS DE CADA PRODUCTO

    public function get_all_register()
    {
        $consulta = $this->db->query('SELECT id,id_producto,descripcion,p_actual,fecha,nota,cpc,ingreso,egreso 
                                      FROM presupuesto_total,producto 
                                      WHERE id = ANY (SELECT MAX(id) FROM presupuesto_total,producto
                                      WHERE presupuesto_total.id_producto=producto.cpc
                                      GROUP by producto.cpc)
                                      AND
                                      presupuesto_total.id_producto=producto.cpc');

        while($filas=$consulta->fetch_assoc())
        {
            $this->registro[]=$filas;

        }

        return  $this->registro;
    }
    

    public function get_all_recordatorios(){
        $consulta=$this->db->query('select * from recordatorio');

        while($filas = $consulta->fetch_assoc()){
            $this->recordatorios[]=$filas;
        }
        return $this->recordatorios;
    }

    public function get_cpc(){
        $consulta=$this->db->query('SELECT cpc FROM producto');

        while($filas=$consulta->fetch_assoc()){
            $this->cpc[]=$filas;
        }
        return $this->cpc;
    }
    
    
    //FUNCION PARA EDITAR UN REGISTRO
    public function edit_registro($id,$nota,$egreso,$fecha,$p_actual){
        $a = $p_actual;
        $b = $egreso;
        $p_total = $a + $b;
        $consulta=$this->db->query("UPDATE presupuesto_total SET egreso='$egreso', nota='$nota', p_actual='$p_total', fecha='$fecha' WHERE id = $id;");
    }
    
    //FUNCION PARA BORRAR UN REGISTRO
    public function delete_registro($id){
        $consulta=$this->db->query("DELETE FROM presupuesto_total WHERE id='$id'");     
    }


    public function insert_ingreso($id_producto,$nota, $ingreso,$p_actual,$fecha){
            
        $a = $p_actual;
        $b = $ingreso;
        $p_total = $a + $b;
        $consulta=$this->db->query("INSERT INTO presupuesto_total (id_producto,nota,ingreso, p_actual, fecha) VALUES ('$id_producto','$nota', '$ingreso', '$p_total',  '$fecha');");         
        
       
    }
    
    public function insert_egreso($id_producto, $nota, $egreso,$fecha,$p_actual){
        if($egreso>$p_actual){
            echo "<h1>No tienes suficiente dinero</h1>";
            //return false;
        }else{
            $a = $p_actual;
            $b = $egreso;
            $p_total = $a - $b;
    
            $consulta=$this->db->query("INSERT INTO presupuesto_total (id_producto,nota, p_actual, egreso, fecha) VALUES ('$id_producto','$nota', '$p_total', '$egreso', '$fecha');");          
        }     
    }

    



    public function insert_recordatorio($dia,$mes,$anio,$observacion){
        $consulta=$this->db->query("INSERT INTO recordatorio (dia, mes, anio, observacion) VALUES('$dia','$mes','$anio','$observacion');");
    }


    //FUNCION DEL BUSCADOR
    public function search($buscador){
        $consulta=$this->db->query("SELECT id_producto,descripcion,nota,fecha,p_actual,egreso,ingreso
                                    from presupuesto_total,producto
                                    where presupuesto_total.id_producto='$buscador'
                                    ORDER by id DESC;");

        while($filas=$consulta->fetch_assoc())
        {
            $this->busqueda[]=$filas;

        }
        
        $this->resultado= $this->busqueda;  

        require_once("../VISTA/registro_view.php");
    }


    //FUNCION PARA CARGAR EL CAMPO DEL PRODUCTO
    public function load_cpc1($cpc1){
        $consulta=$this->db->query("SELECT p_actual,descripcion FROM presupuesto_total,producto WHERE id_producto='$cpc1' ORDER by id DESC LIMIT 1;");

        while($filas=$consulta->fetch_assoc())
        {
            $this->busqueda[]=$filas;
        }
        return $this->busqueda;
    }





}





                   
                    



                    



                
                

?>