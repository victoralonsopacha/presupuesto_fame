<?php
	
	$palabra=$_POST['palabra'];
	$tipo=$_POST['tipo'];
	$db=Conexionbdd::Conectar();
	$query="SELECT id,id_producto,cpc,egreso,ingreso,fecha,p_inicial,p_actual,descripcion,tipo,nota
			FROM presupuesto_total,producto 
			WHERE producto.descripcion LIKE '%$palabra%'
			AND producto.tipo LIKE '%$tipo%'
			AND presupuesto_total.cpcFk=producto.id_producto
			ORDER BY presupuesto_total.id DESC LIMIT 1";
	$consulta=$db->query($query);
	if($consulta->num_rows>=1){
		echo "<table>
		<thead>
			<tr>
				<th class='text-center'></th>
				<th class='text-center'>CPC</th>
				<th class='text-center'>Decripcion</th>
				<th class='text-center'>Tipo</th>
				<th class='text-center'>Fecha</th>
				<th class='text-center'>P Inicial</th>
				<th class='text-center'>P Actual</th>
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
				<td><input type='text' name='cpc' value=".$fila['cpc']." class='form-control'/></td>
				<td><input type='text' name='descripcion' value=".$fila['descripcion']." class='form-control'/></td>
				<td><input type='text' name='tipo' value=".$fila['tipo']." class='form-control'/></td>
				<td><input type='date' name='fecha' value=".$fila['fecha']." class='form-control'/></td>
				<td><input type='text' name='p_inicial' value=".$fila['p_inicial']." class='form-control'/></td>
				<td><input type='text' name='p_actual' value=".$fila['p_actual']." class='form-control'/></td>
				<td><input type='text' name='id' value=".$fila['id']." class='form-control'/></td>
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