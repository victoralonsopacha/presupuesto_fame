<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <title>FORMULARIO</title>
    </head>
    <body>
        <h1 style="text-align: center">Presupuesto</h1>




        <div class="container">
            <div class="row" >
                <div class="col-sm" >
                </div>
                <div class="col-sm" >			
		</div>
            <div class="col-md-14">
                <div > 
                    <div class="table-responsive-sm">
    

    
                    </div>
                    </div>
                </div>
                <div class="col-sm">

                </div>
            </div>
        </div>

<?php
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
?>
        
    
    
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">id</th>
                <th scope="col">CPC</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Nota</th>
                <th scope="col">Presupuesto Actual</th>
                <th scope="col">Fecha</th>
                <th scope="col" >Egreso</th>
                <th scope="col" >Ingreso</th>
            </tr>
        </thead>    
    <tbody>
    <?php
            echo "</tr>";   		
    ?>	
	<?php
    foreach ($datos as $ver) 
    {
    ?>
                
        <form id="frm-registro" action="editEst_controller.php" method="post" enctype="multipart/form-data">
        <td><input type="text" name="id" value="<?php echo $ver['id']; ?>" class="form-control"/></td>
        <td><input type="text" name="id_producto" value="<?php echo $ver['id_producto']; ?>" class="form-control"/></td>
        <td><input type="text" name="descripcion" value="<?php echo $ver['descripcion']; ?>" class="form-control" /></td>
        <td><input type="text" name="nota" value="<?php echo $ver['nota']; ?>" class="form-control" require /></td>
        <td><input type="text" name="p_actual" value="<?php echo $ver['p_actual']; ?>" class="form-control" placeholder="Ingrese una cantidad" require /></td>
        <td><input type="date" name="fecha" value="<?php echo $ver['fecha']; ?>" class="form-control"/></td>
        <td><input type="text" name="egreso" value="<?php echo $ver['egreso']; ?>" class="form-control" require /></td>
        <td><input type="text" name="ingreso" value="<?php echo $ver['ingreso']; ?>" class="form-control" placeholder="Ingrese una cantidad" require /></td>
        <td><button Type="Submit" class="btn btn-success">Editar</button></td>
        </form>
        <td>
        <form id="frm-registro" action="deleteEst_controller.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $ver['id']; ?>" />
            <button Type="Submit" class="btn btn-danger">Eliminar</button>
        </form>
        </td>

    <?php
        echo "</tr>";   
	}
	?>
    </tbody>
    </table>



<h2>INGRESO</h2>

<table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">id</th>
                <th scope="col">CPC</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Nota</th>
                <th scope="col">Presupuesto Actual</th>
                <th scope="col">Fecha</th>
                <th scope="col" >Ingreso</th>
            </tr>
        </thead>    
    <tbody>
    <?php
            echo "</tr>";   		
    ?>	
	<?php
    foreach ($datos as $ver) 
    {
    ?>
                
        <form id="frm-registro" action="insertEst_controller.php" method="post" enctype="multipart/form-data">
        <td><input type="text" name="id" value="<?php echo $ver['id']; ?>" class="form-control"/></td>
        <td><input type="text" name="id_producto" value="<?php echo $ver['id_producto']; ?>" class="form-control"/></td>
        <td><input type="text" name="descripcion" value="<?php echo $ver['descripcion']; ?>" class="form-control" /></td>
        <td><input type="text" name="nota" value="<?php echo $ver['nota']; ?>" class="form-control" require /></td>
        <td><input type="text" name="p_actual" value="<?php echo $ver['p_actual']; ?>" class="form-control" placeholder="Ingrese una cantidad" require /></td>
        <td><input type="date" name="fecha" value="<?php echo $ver['fecha']; ?>" class="form-control"/></td>
        <td><input type="text" name="ingreso" value="<?php echo $ver['ingreso']; ?>" class="form-control" placeholder="Ingrese una cantidad" require /></td>
        <td><button Type="Submit" class="btn btn-success">Insertar</button></td>
        </form>
    <?php
        echo "</tr>";   
	}
	?>
    </tbody>
    </table>


    <h2>EGRESO</h2>

<table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">id</th>
                <th scope="col">CPC</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Nota</th>
                <th scope="col">Presupuesto Actual</th>
                <th scope="col">Fecha</th>
                <th scope="col" >Egreso</th>
            </tr>
        </thead>    
    <tbody>
    <?php
            echo "</tr>";   		
    ?>	
	<?php
    foreach ($datos as $ver) 
    {
    ?>
                
        <form id="frm-registro" action="insertEst_controller.php" method="post" enctype="multipart/form-data">
        <td><input type="text" name="id" value="<?php echo $ver['id']; ?>" class="form-control"/></td>
        <td><input type="text" name="id_producto" value="<?php echo $ver['id_producto']; ?>" class="form-control"/></td>
        <td><input type="text" name="descripcion" value="<?php echo $ver['descripcion']; ?>" class="form-control" /></td>
        <td><input type="text" name="nota" value="<?php echo $ver['nota']; ?>" class="form-control" require /></td>
        <td><input type="text" name="p_actual" value="<?php echo $ver['p_actual']; ?>" class="form-control" placeholder="Ingrese una cantidad" require /></td>
        <td><input type="date" name="fecha" value="<?php echo $ver['fecha']; ?>" class="form-control"/></td>
        <td><input type="text" name="egreso" value="<?php echo $ver['egreso']; ?>" class="form-control" require /></td>
        <td><button Type="Submit" class="btn btn-success">Insertar</button></td>
        </form>
    <?php
        echo "</tr>";   
	}
	?>
    </tbody>
    </table>









    <form action="registro_view.php" method="POST" autocomplete="off">
		<input type="text" name="palabra" placeholder="¿Qué esta buscando?">
		<input type="submit" value="Buscar">
	</form>
	<?php
		if(isset($_POST['palabra'])){
			require_once "../MODELO/conexion.php";
			require_once "../MODELO/buscar.php";
        }
        
        require_once("registro_view.php");
	?>








    <table class="table table-striped">
    <h3>INGRESO</h3>
    <thead class="thead-dark">
        <tr>
            
            <th scope="col">CPC</th>
            <th scope="col">Descripcion</th>    
            <th scope="col">presupuesto</th>
            <th scope="col">Nota</th>
            <th scope="col">Fecha</th>
            <th scope="col">Ingreso</th>
            
        </tr>
    </thead>
    <form id="frm-ingreso" action="insertEst_controller.php" method="post" enctype="multipart/form-data">

    <td> 
        <select name="cpc1" class="form-control" onchange="this.form.submit()">
            <?php          
                require_once("../MODELO/modelo.php");

                $per=new Modelo();

                $datos=$per->get_cpc();
                foreach ($datos as $ver){
                    echo "<option>";
                    echo $ver["cpc"];
                    echo "</option>";
                }    
            ?>
        </select>
    </td>

    <td><input type="text" name="descripcion"  class="form-control" require /></td>
    <td><input type="text" name="p_actual" value="<?php echo $ver['p_actual']; ?>" /></td>
    <td><input type="text" name="nota"  class="form-control" placeholder="Ingrese una nota" require /></td>    
    <td><input type="date" name="fecha"  class="form-control"require /></td>
    <td><input type="text" name="ingreso" class="form-control" placeholder="Ingrese una cantidad" require /></td>
    <td><input type="hidden" name="egreso" class="form-control" /></td>
    <td><button Type="Submit" name="Submit" class="btn btn-success">Ingresar</button></td>  
    </form>
    </table>

    <table class="table table-striped">
    <h3>EGRESO</h3>
    <thead class="thead-dark">
        <tr>
            
            <th scope="col">CPC</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Nota</th>
            <th scope="col">Fecha</th>
            <th scope="col" >Egreso</th>
        </tr>
    </thead>
    <form id="frm-egreso" action="insertEst_controller.php" method="post" enctype="multipart/form-data">
    <td> 
        <select name="cpc2" class="form-control">
            <?php          
                require_once("../MODELO/modelo.php");

                $per=new Modelo();

                $datos=$per->get_cpc();
                foreach ($datos as $ver){
                    echo "<option>";
                    echo $ver["cpc"];
                    echo "</option>";
                }    
            ?>
        </select>
    </td>

    <td><input type="text" name="descripcion"  class="form-control" require /></td>
    <td><input type="text" name="nota"  class="form-control" placeholder="Ingrese una nota" require /></td> 
    <td><input type="date" name="fecha"  class="form-control" require /></td>
    <td><input type="text" name="egreso" class="form-control" placeholder="Ingrese una cantidad" require /></td>
    <td><input type="hidden" name="p_actual" value="<?php echo $ver['p_actual']; ?>" />
    <td><button Type="Submit" name="Submit" class="btn btn-success">Ingresar</button></td>  
    <?php
        include "validaciones.php";
    ?>
    </form>
    </table>




    <?php
        date_default_timezone_set("America/Guayaquil");
        //dia
        if(date("j")=="3"){
            echo "hoy es el dia ".date("j")." / ".date("n")." / ".date("Y");
            
        }
        
    ?>
    
<form id="form_recordatorio" action="insertRecor_controller.php" method="post">
    <input type="text" name="dia" class="form-control" placeholder="Ingrese el dia">
    <input type="text" name="mes" class="form-control" placeholder="Ingrese el mes ">
    <input type="text" name="anio" class="form-control" placeholder="Ingrese el año">
    <input type="text" name="observacion" class="form-control" placeholder="Ingrese el recordatorio">
    <button Type="Submit" name="Submit" class="btn btn-success">Ingresar</button>
    
    <?php
        date_default_timezone_set("America/Guayaquil");
        foreach($recordatories as $ver){
            if(date("j")==$ver['dia'] && date("n")==$ver['mes'] && date("Y")==$ver['anio']){
                echo $ver['observacion'];
            }
        }
    ?>

</form>
<br/>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        
    </body>
</html>
