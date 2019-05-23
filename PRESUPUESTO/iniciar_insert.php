<?php
$id_producto=$_POST['id_producto'];
$id=$_POST['id'];

require_once("registro_view.php");

require_once("modelo.php");
//instanciar a la clase modelo
//tambien instancio al constructor
//por el __construct
$per=new Modelo();

//ahora datos ya es un array de registros
//cargar la lista de los ultimos registros de cada producto
$datos=$per->get_resul_search($id_producto);

?>
        
        <input type="text" name="id_producto" value="<?php echo $id_producto ?>" class="form-control"/>
    
    <table class="table">
        <thead class="thead-dark">
            <tr>
                
                <th scope="col">CPC</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Nota</th>
                <th scope="col">Presupuesto Inicial</th>
                <th scope="col">Presupuesto Actual</th>
                <th scope="col">Fecha</th>
                <th scope="col">Egreso</th>
                <th scope="col">Ingreso</th>
                <th scope="col"></th>
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
        <!-----------------------------------FORMULARIO PARA EDITAR Y ELIMINAR-------------------------------------------->
                
        <form id="frm-registro" action="editEst_controller.php" method="post" enctype="multipart/form-data">
        <td><input type="text" name="cpc" value="<?php echo $ver['cpc']; ?>" class="form-control"/></td>
        <td><input type="text" name="descripcion" value="<?php echo $ver['descripcion']; ?>" class="form-control" /></td>
        <td><input type="text" name="nota" value="<?php echo $ver['nota']; ?>" class="form-control" require /></td>
        <td><input type="text" name="p_inicial" value="<?php echo $ver['p_inicial']; ?>" class="form-control" require /></td>
        <td><input type="text" name="p_actual" value="<?php echo $ver['p_actual']; ?>" class="form-control" require /></td>
        <td><input type="date" name="fecha" value="<?php echo $ver['fecha']; ?>" class="form-control"/></td>
        <td><input type="text" name="egreso" value="<?php echo $ver['egreso']; ?>" class="form-control" require /></td>
        <td><input type="text" name="ingreso" value="<?php echo $ver['ingreso']; ?>" class="form-control" placeholder="Ingrese una cantidad" require /></td>
        <td><input type="text" name="id" value="<?php echo $ver['id']; ?>" class="form-control"/></td>
        <td><input type="hidden" name="id_producto" value="<?php echo $ver['id_producto']; ?>" class="form-control"/></td>
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


<!----------------------------------------FORMULARIO PARA INGRESAR-------------------------------------------------------->
<h2>INGRESO</h2>

<div id="f">

    <table class="table">
            <thead class="thead-dark">
                <tr> 
                    <th scope="col">CPC</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Nota</th>
                    <th scope="col">Presupuesto Inicial</th>
                    <th scope="col">Presupuesto Actual</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Ingreso</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
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

            <td><input type="text" name="cpc" value="<?php echo $ver['cpc']; ?>" class="form-control"/></td>
            <td><input type="text" name="descripcion" value="<?php echo $ver['descripcion']; ?>" class="form-control" /></td>
            <td><input type="text" name="nota" value="<?php echo $ver['nota']; ?>" class="form-control" require /></td>
            <td><input type="text" name="p_inicial" value="<?php echo $ver['p_inicial']; ?>" class="form-control" require /></td>
            <td><input type="text" name="p_actual" value="<?php echo $ver['p_actual']; ?>" class="form-control" placeholder="Ingrese una cantidad" require /></td>
            <td><input type="date" name="fecha" value="<?php echo $ver['fecha']; ?>" class="form-control"/></td>
            <td><input type="text" name="ingreso" value="<?php echo $ver['ingreso']; ?>" class="form-control" placeholder="Ingrese una cantidad" require /></td>
            <td><input type="text" name="id_producto" value="<?php echo $ver['id_producto']; ?>" class="form-control"/></td>
            <td><input type="text" name="egreso" value="<?php echo $ver['egreso']; ?>" class="form-control" placeholder="Ingrese una cantidad" require /></td>
            
            <td><button Type="Submit" class="btn btn-success">Insertar</button></td>
            
            </form>
        <?php
            echo "</tr>";   
        }
        ?>
        </tbody>
    </table>
</div>




<!--------------------------------------------FORMULARIO PARA EL EGRESO------------------------------------------------------>

    <h2>EGRESO</h2>

<table class="table">
        <thead class="thead-dark">
            <tr>
                
                <th scope="col">CPC</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Nota</th>
                <th scope="col">Presupuesto Inicial</th>
                <th scope="col">Presupuesto Actual</th>
                <th scope="col">Fecha</th>
                <th scope="col">Egreso</th>
                <th scope="col"></th>
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
        <td><input type="text" name="cpc" value="<?php echo $ver['cpc']; ?>" class="form-control"/></td>
        <td><input type="text" name="descripcion" value="<?php echo $ver['descripcion']; ?>" class="form-control" /></td>
        <td><input type="text" name="nota" value="<?php echo $ver['nota']; ?>" class="form-control" require /></td>
        <td><input type="text" name="p_inicial" value="<?php echo $ver['p_inicial']; ?>" class="form-control" require /></td>
        <td><input type="text" name="p_actual" value="<?php echo $ver['p_actual']; ?>" class="form-control" placeholder="Ingrese una cantidad" require /></td>
        <td><input type="date" name="fecha" value="<?php echo $ver['fecha']; ?>" class="form-control"/></td>
        <td><input type="text" name="egreso" value="<?php echo $ver['egreso']; ?>" class="form-control" require /></td>
        <td><input type="hidden" name="id_producto" value="<?php echo $ver['id_producto']; ?>" class="form-control"/></td>
        <td><button Type="Submit" class="btn btn-success">Insertar</button></td>
        </form>
    <?php
        echo "</tr>";   
	}
	?>
    </tbody>
    </table>



    <div>
    <br>
</div>


