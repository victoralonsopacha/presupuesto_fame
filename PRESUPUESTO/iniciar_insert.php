<?php
$id_producto=$_POST['id_producto'];
//$id=$_POST['id'];

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














<!--------------------------------------------FORMULARIO PARA REGISTRAR UN EGRESO------------------------------------------------------>
<div>
    <h5 class="text-center">EGRESO</h5>

    <table class="table my-0">
        <thead class="thead-dark">
            <tr>
                <th class="text-center py-0"  scope="col">CPC</th>
                <th class="text-center py-0"  scope="col">Descripcion</th>
                <th class="text-center py-0"  scope="col">Nota</th>
                <th class="text-center py-0"  scope="col">P Inicial</th>
                <th class="text-center py-0"  scope="col">P Actual</th>
                <th class="text-center py-0"  scope="col">Fecha</th>
                <th class="text-center py-0"  scope="col">Egreso</th>
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
                <form id="frm-registro" action="insertEst_controller2.php" method="post" enctype="multipart/form-data">
                    <td class="py-1 px-1 mx-0"><input type="text" name="cpc" value="<?php echo $ver['cpc']; ?>" class="form-control"/></td>
                    <td class="py-1 px-0 mx-0 text-center"><?php echo $ver['descripcion']; ?></td>
                    <td class="py-1 px-1 mx-0"><input type="text" name="nota" value="<?php echo $ver['nota']; ?>" class="form-control" require /></td>
                    <td class="py-1 px-1 mx-0"><input type="text" name="p_inicial" value="<?php echo $ver['p_inicial']; ?>" class="form-control" require disabled /></td>
                    <td class="py-1 px-1 mx-0"><input type="text" name="p_actual" value="<?php echo $ver['p_actual']; ?>" class="form-control" placeholder="Ingrese una cantidad" require /></td>
                    <td class="py-1 px-1 mx-0"><input type="date" name="fecha" value="<?php echo $ver['fecha']; ?>" class="form-control"/></td>
                    <td class="py-1 px-1 mx-0"><input type="text" name="egreso" value="<?php echo $ver['egreso']; ?>" class="form-control" require /></td>
                    <td class="py-1 px-1 mx-0"><input type="hidden" name="id_producto" value="<?php echo $ver['id_producto']; ?>" class="form-control"/></td>
                    <td class="py-1 px-1 mx-0"><input type="hidden" name="ingreso" value="<?php echo $ver['ingreso']; ?>" class="form-control" disable /></td>
                    <td><button Type="Submit" class="btn btn-success">Insertar</button></td>
                </form>
            <?php
                echo "</tr>";   
            }
            ?>
        </tbody>
    </table>
</div>
<!------------------------------------------FORMULARIO PARA EDITAR UN EGRESO-------------------------..------------------->
     

<div class="py-0">
    <input type="hidden" name="id_producto" value="<?php echo $id_producto ?>" class="form-control"/>
    
    <table class="table my-0">
        <thead class="thead-dark">
            <tr>  
                <th class="text-center py-0" scope="col">CPC</th>
                <th class="text-center py-0" scope="col">Descripcion</th>
                <th class="text-center py-0" scope="col">Nota</th>
                <th class="text-center py-0" scope="col">P Inicial</th>
                <th class="text-center py-0" scope="col">P Actual</th>
                <th class="text-center py-0" scope="col">Fecha</th>
                <th class="text-center py-0" scope="col">Egreso</th>
                <th class="text-center py-0" scope="col">Ingreso</th>
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
                
        <form id="frm-registro" action="editEst_controller.php" method="post" enctype="multipart/form-data">
            <td class="py-1 px-1 mx-0"><input type="text" name="cpc" value="<?php echo $ver['cpc']; ?>" class="form-control" /></td>
            <td class="py-1 px-0 mx-0"><?php echo $ver['descripcion']; ?></td>
            <td class="py-1 px-1 mx-0"><input type="text" name="nota" value="<?php echo $ver['nota']; ?>" class="form-control" require /></td>
            <td class="py-1 px-1 mx-0"><input type="text" name="p_inicial" value="<?php echo $ver['p_inicial']; ?>" class="form-control" require disabled /></td>
            <td class="py-1 px-1 mx-0"><input type="text" name="p_actual" value="<?php echo $ver['p_actual']; ?>" class="form-control" require  /></td>
            <td class="py-1 px-1 mx-0"><input type="date" name="fecha" value="<?php echo $ver['fecha']; ?>" class="form-control"/></td>
            <td class="py-1 px-1 mx-0"><input type="text" name="egreso" value="<?php echo $ver['egreso']; ?>" class="form-control" require /></td>
            <td class="py-1 px-1 mx-0"><input type="text" name="ingreso" value="<?php echo $ver['ingreso']; ?>" class="form-control" placeholder="Ingrese una cantidad" require /></td>
            <td class="py-1 px-1 mx-0"><input type="hidden" name="id" value="<?php echo $ver['id']; ?>" class="form-control"/></td>
            <td class="py-1 px-1 mx-0"><input type="hidden" name="id_producto" value="<?php echo $ver['id_producto']; ?>" class="form-control"/></td>
            <td><button Type="Submit" class="btn btn-success">Editar</button></td>
        </form>
        <td>
        <!--
        <form id="frm-registro" action="deleteEst_controller.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $ver['id']; ?>"/>
            <input type="hidden" name="id_producto" value="<?php echo $ver['id_prodcuto']; ?>"/>
            
            <button Type="Submit" class="btn btn-danger">Eliminar</button>
        </form>
        -->
        </td>

    <?php
        echo "</tr>";   
	}
	?>
    </tbody>
    </table>
</div>

<!----------------------------------------FORMULARIO PARA INGRESAR MAS PRESUPUESTO---------------------------------------->

<div class="py-0">
    <h5 class="text-center">INGRESO</h5>
    <table class="table my-0">
            <thead class="thead-dark">
                <tr> 
                    <th class="text-center py-0"  scope="col">CPC</th>
                    <th class="text-center py-0"  scope="col">Descripcion</th>
                    <th class="text-center py-0"  scope="col">Nota</th>
                    <th class="text-center py-0"  scope="col">P Inicial</th>
                    <th class="text-center py-0"  scope="col">P Actual</th>
                    <th class="text-center py-0" scope="col">Fecha</th>
                    <th class="text-center py-0" scope="col">Ingreso</th>
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
                <td class="py-1 px-1 mx-0"><input type="text" name="cpc" value="<?php echo $ver['cpc']; ?>" class="form-control"/></td>
                <td class="py-1 px-0 mx-0 text-center"><?php echo $ver['descripcion']; ?></td>
                <td class="py-1 px-1 mx-0"><input type="text" name="nota" value="<?php echo $ver['nota']; ?>" class="form-control" require /></td>
                <td class="py-1 px-1 mx-0"><input type="text" name="p_inicial" value="<?php echo $ver['p_inicial']; ?>" class="form-control" require disabled /></td>
                <td class="py-1 px-1 mx-0"><input type="text" name="p_actual" value="<?php echo $ver['p_actual']; ?>" class="form-control" require  /></td>
                <td class="py-1 px-1 mx-0"><input type="date" name="fecha" value="<?php echo $ver['fecha']; ?>" class="form-control"/></td>
                <td class="py-1 px-1 mx-0"><input type="text" name="ingreso" value="<?php echo $ver['ingreso']; ?>" class="form-control" placeholder="Ingrese una cantidad" require /></td>
                <td class="py-1 px-1 mx-0"><input type="hidden" name="id_producto" value="<?php echo $ver['id_producto']; ?>" class="form-control"/></td>
                <td class="py-1 px-1 mx-0"><input type="hidden" name="egreso" value="<?php echo $ver['egreso']; ?>" class="form-control" placeholder="Ingrese una cantidad" require /></td>
                <td class="py-1 px-1 mx-0"><button Type="Submit" class="btn btn-success">Insertar</button></td>       
            </form>
        <?php
            echo "</tr>";   
        }
        ?>
        </tbody>
    </table>
</div>





