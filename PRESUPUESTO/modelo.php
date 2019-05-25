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
    private $insertar;
    private $mensaje;
    private $id;
    private $llenar_busqueda;
    
    public function __construct()
    {
        //invoca y almacena en db a la clase Conexionbdd y lo que tenga la funcion Conectar
        $this->db=Conexionbdd::Conectar();
        
        //vamos a declarar las variables como un array
        $this->registro=array(); 

        $this->recordatorios=array();

        $this->busqueda=array();

        $this->cpc=array();

        $this->resultado=array();

        $this->insertar;

        $this->mensaje;

        $this->id=array();

        $this->llenar_busqueda=array();

    }
    
//-------------------------------------------FUNCIONES UTILIZADAS----------------------------------------------------------

    //FUNCION PARA OBTENER EL ULTIMO REGISTRO CON EL RESULTADO DE LA BUSQUEDA Y EMPEZAR LA INSERCION

    public function get_resul_search($id_producto){
        $consulta=$this->db->query("SELECT id,id_producto,cpc,descripcion,nota,p_inicial,p_actual,fecha,egreso,ingreso
                                    FROM presupuesto_total,producto
                                    WHERE cpcFk= '$id_producto'
                                    AND cpcFk=id_producto
                                    ORDER BY id DESC LIMIT 1");
        while($filas=$consulta->fetch_assoc()){
            $this->registro[]=$filas;
        }
        return $this->registro;
    }

    //FUNCION PARA OBTENER EL ULTIMO id DE LOS PRODUCTOS, SERVIRA PARA LA INSERCION DOBLE DE UN NUEVO CPC 
    public function get_id(){
        $consulta=$this->db->query('SELECT id_producto FROM producto
        ORDER BY id_producto DESC LIMIT 1 ');
        while($filas=$consulta->fetch_assoc()){
            $this->id[]=$filas;
        }
        return $this->id;
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

    //FUNCION PARA INSERTAR UN PRODUCTO CON EL ID DEL PRODUCTO QUE LE CORRESPONDE 
    public function insert_product($cpc,$descripcion,$p_actual,$tipo,$fecha,$nota,$id_producto){
        $id_producto2=$id_producto + 1;
        $consulta = $this->db->query("INSERT INTO producto (cpc, descripcion,p_inicial,tipo) VALUES ('$cpc','$descripcion','$p_actual','$tipo'); ");   
        $consulta = $this->db->query("INSERT INTO presupuesto_total(fecha,p_actual,nota,cpcFk) VALUES ('$fecha','$p_actual','$nota','$id_producto2');");        
    }

    //FUNCION PARA REGISTRAR UN NUEVO INGRESO
    public function insert_ingreso($id_producto,$nota,$ingreso,$p_actual,$fecha){            
        $a = $p_actual;
        $b = $ingreso;
        $p_total = $a + $b;
        $consulta=$this->db->query("INSERT INTO presupuesto_total (fecha,ingreso,p_actual,nota,cpcFk) VALUES ('$fecha','$ingreso','$p_total','$nota','$id_producto');");         
    }
    
    //FUNCION PARA REGISTRAR UN EGRESO
    public function insert_egreso($id_producto, $nota, $egreso,$fecha,$p_actual){
        if($egreso>$p_actual){
            //FALTA IMPLEMENTAR UN MENSAJE EN EL CASO DE SOBREPASARSE EN EL PRESUPUESTO
            echo "<h1>No tienes suficiente dinero</h1>";
            //return false;
        }else{
            $a = $p_actual;
            $b = $egreso;
            $p_total = $a - $b;
            $consulta=$this->db->query("INSERT INTO presupuesto_total (fecha,egreso,p_actual,nota,cpcFk) VALUES ('$fecha','$egreso','$p_total','$nota','$id_producto');");          
        }     
    }















//---------------------------------------------------FUNCIONES DE RESERVA-------------------------------------------------- 
    

    //FUNCION PARA OBTENER LOS ULTIMOS REGISTROS DE CADA PRODUCTO

    public function get_all_register()
    {
        $consulta = $this->db->query('SELECT id,id_producto,descripcion,p_actual,p_inicial,fecha,nota,cpc,ingreso,egreso 
        FROM presupuesto_total,producto 
        WHERE id = ANY (SELECT MAX(id) FROM presupuesto_total,producto
        WHERE presupuesto_total.cpcFk=producto.id_producto
        GROUP by producto.id_producto)
        AND
        presupuesto_total.cpcFk=producto.id_producto');

        while($filas=$consulta->fetch_assoc())
        {
            $this->registro[]=$filas;
        }

        return  $this->registro;
    }


    public function get_cpc(){
        $consulta=$this->db->query('SELECT cpc FROM producto');

        while($filas=$consulta->fetch_assoc()){
            $this->cpc[]=$filas;
        }
        return $this->cpc;
    }


    public function get_tipo(){
        $consulta=$this->db->query('SELECT tipo FROM producto');

        while($filas=$consulta->fetch_assoc()){
            $this->cpc[]=$filas;
        }
        return $this->cpc;
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