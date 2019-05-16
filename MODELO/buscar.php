<?php
	
	$palabra=$_POST['palabra'];
	$db=Conexionbdd::Conectar();
	$query="SELECT id,id_producto,egreso,ingreso,fecha,p_actual,descripcion 
	FROM presupuesto_total,producto 
	WHERE id_producto LIKE '%$palabra%' 
	AND id_producto=cpc
	ORDER BY id ASC";
	$consulta3=$db->query($query);
	if($consulta3->num_rows>=1){
		echo "<table>
		<thead>
			<tr>
				<th>CPC</th>
				<th>Decripcion</th>
				<th>Fecha</th>
				<th>Egreso</th>
				<th>Ingreso</th>
				<th>P Actual</th>
				<th>Actualizar</th>
				<th>Eliminar</th>
			</tr>
		</thead>
		<tbody>";
		while($fila=$consulta3->fetch_array(MYSQLI_ASSOC)){
			echo "<tr>
				
				<td>".$fila['id_producto']."</td>
				<td>".$fila['descripcion']."</td>
				<td>".$fila['fecha']."</td>
				<td>".$fila['egreso']."</td>
				<td>".$fila['ingreso']."</td>
				<td>".$fila['p_actual']."</td>
				<td><a href='#!'>Actualizar</a></td>
				<td><a href='#!'>Eliminar</a></td>
			</tr>";
		}
		echo "</tbody>
	</table>";
	}else{
		echo "No hemos encotrado ningun registro con la palabra ".$palabra;
	}