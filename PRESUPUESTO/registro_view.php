<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <title>FORMULARIO</title>
    </head>
    <body>
        <h1 style="text-align: center">Presupuesto</h1>


        <!--FORULARIO PARA INGRESAR UN PRODUCTO-->

        <div class="container">
            <h3>Ingresar nuevo CPC</h3>

            <form name="frm_ingresar" action="insertar_producto.php" method="post">
                <div class="row">
                    <?php
                        /*trae el ultimo id de los registros de la tabla producto
                        para luego ingresar en la tabla presupuesto_producto con el id que 
                        le corresponde*/
                        require_once("modelo.php");
                        $id = new Modelo();
                        $recibir=$id->get_id();
                    ?>

                    <?php
                        foreach($recibir as $ver){
                    ?>
                    
                        <input type="hidden" name="id_producto" value="<?php echo $ver['id_producto']; ?>" class="form-control"/>
                    
                    <?php
                        }
                    ?>
                    <div class="col">
                        <input type="text" name="cpc" class="form-control" placeholder="Ingrese el CPC">
                    </div>
                    <div class="col">
                        <input type="text" name="descripcion" class="form-control" placeholder="Ingrese una descripcion">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <textarea name="nota" class="form-control" aria-label="With textarea" placeholder="Ingrese una nota"></textarea>
                    </div>
                    <div class="col">
                        <input type="text" name="p_actual" class="form-control" placeholder="Ingrese el presupuesto inicial"/>                            
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="date" name="fecha" class="form-control"/>
                    </div>
                    <div class="col">
                        <select name="tipo" class="form-control">
                            <option selected>Escoja un tipo...</option>
                            <<option>Infima</option>
                            <option>Subasta</option>
                            <option>Giro</option>
                            <option>Catalogo</option>
                            <option>Contrato</option>
                            <option>Bienes y Servicios Unicos</option>
                            <option>Regimen Especial</option>
                            <option>Cortizacion</option>
                        </select>
                    </div>

                    <input type="date" name="cumpleanios" step="1" min="2013-01-01" max="2013-12-31" value="<?php echo date("Y-m-d");?>">  
  


                </div>
                <br/> 
                <input type="submit"  class="btn btn-success" value="Ingresar"/>
            </form>
        </div>









































        <!--

        <div>
            <br>
            </div>

                <form action="registro_view.php" method="POST" autocomplete="off">
                    <input type="text" name="palabra" placeholder="¿Qué esta buscando?">

                    <select name="tipo" >

                    <option>Tipo1</option>
                    <option>Tipo2</option>
                    <option>Tipo3</option>
                    <option>Tipo4</option>
                    
                    </select>
                    
                    <input type="submit" value="Buscar" class="btn btn-primary">
                </form>
                
            <div>
            <br>
        </div>

        -->


        <!--FORMULARIO PARA BUSCADOR-->

        <br/>
        <div class="container">
            <form action="registro_view.php" method="POST">
                <div class="row">
                    <div class="col-sm">
                        <input type="text" name="palabra" class="form-control" placeholder="¿Qué esta buscando?">
                    </div>
                    <div class="col-sm">
                        <select class="form-control" id="tipo_proceso" name="tipo" aria-label="Example select with button addon">
                            <option selected>Escoja un tipo...</option>
                            <option>Infima</option>
                            <option>Subasta</option>
                            <option>Giro</option>
                            <option>Catalogo</option>
                            <option>Contrato</option>
                            <option>Bienes y Servicios Unicos</option>
                            <option>Regimen Especial</option>
                            <option>Cortizacion</option>
                        </select>
                    </div>
                    <div class="col-sm">
                        <input type="submit" value="Buscar" class="btn btn-primary"> 
                    </div>
                </div>
            </form>
        </div>


        
            
            
            
            

        
        
     
        <br/>
        <br/>
        <!--LLAMA A LA CONEXION Y LUEGO AL BUSCADOR LLEVANDO EL INPUT Y EL SELCT-->
        <?php
                    if(isset($_POST['palabra'],$_POST['tipo'])){
                        require_once "conexion.php";
                        require_once "buscar.php";
                        }
                    require_once("registro_view.php");
        ?>
  

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        
    </body>
</html>