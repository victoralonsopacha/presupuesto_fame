<?php
	
	$palabra=$_POST['palabra'];
	$tipo=$_POST['tipo'];
	$db=Conexionbdd::Conectar();
	$query="SELECT id_producto,cpc,descripcion,tipo,fecha
	FROM presupuesto_total,producto 
	WHERE producto.tipo LIKE '%$tipo%'
	AND producto.descripcion LIKE '%$palabra%'
	GROUP BY producto.id_producto DESC";
	$consulta=$db->query($query);
	if($consulta->num_rows>=1){
		echo "<table class='table table-hover'>
		<thead class='thead-dark'>
			<tr>
				<th class='text-center' scope='col'></th>
				<th class='text-center' scope='col'>CPC</th>
				<th class='text-center' scope='col'>Decripcion</th>
				<th class='text-center' scope='col'>Fecha</th>
				<th class='text-center' scope='col'>Tipo</th>
				<th></th>
				<th class='text-center'>Seleccionar</th>
			</tr>
		</thead>
		<tbody>";
		while($fila=$consulta->fetch_array(MYSQLI_ASSOC)){
			echo "
			<tr>
			<form id='frm-registro' action='iniciar_insert.php' method='post' enctype='multipart/form-data'>
				<td><input type='hidden' name='id_producto' value=".$fila['id_producto']." class='form-control'/></td>
				
				<td>".$fila['cpc']."</td>
				<td>".$fila['descripcion']."</td>
				<td>".$fila['fecha']."</td>
				<td>".$fila['tipo']."</td>

				<td><button Type='Submit' class='btn btn-success'>Seleccionar</button></td>
			</form>
			</tr>
			";
		}
		echo "</tbody>
	</table>
	<br/>
	<br/>";
	}else{
		echo "No hemos encotrado ningun registro con la palabra ".$palabra." y el tipo ".$tipo;
	}
?>