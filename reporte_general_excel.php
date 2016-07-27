<!doctype html>
<html>
<head>
</head>
<body>
<?php
error_reporting(E_ALL ^ E_NOTICE);
$fechainicio=$_REQUEST['fechainicio'];
$fechafin=$_REQUEST['fechafin'];

include('includes/cnx.php');

$contenido='<!doctype html>
<html>
<head>
</head>
<body>

<table>
			<thead>
				<tr>
					<th>Nº Solicitud</th><th>F.Solicitud</th><th>F.Preventa</th><th>F.Actividad</th>
					<th>F.Asignaci&oacute;</th><th>Vendedor</th><th>Actividad</th><th>Ejecutivo</th>
					<th>Apoyo</th><th>Pa&iacute;s</th><th>Cliente</th><th>Tipo</th><th>Estatus</th>
					<th>Asignar</th><th>Descripci&oacute;n</th>
				</tr>
			</thead><tbody>



';

				$Ssql=mysqli_query($link, "SELECT * FROM `registro` WHERE `fsolicitud` BETWEEN '$fechainicio' AND '$fechafin' ORDER BY `fsolicitud` ASC") or die("Error al leer entre las dos fechas");
				while($row=mysqli_fetch_array($Ssql)){
					$contenido.='<tr>
											<td>'.$row['nrosolicitud'].'</td>
											<td>'.$row['fsolicitud'].'</td>
											<td>'.$row['fpreventa'].'</td>
											<td>'.$row['factividad'].'</td>
											<td>'.$row['fasignacion'].'</td>
											<td>'.$row['vendedor'].'</td>
											<td>'.$row['actividad'].'</td>
											<td>'.$row['ejecutivo'].'</td>
											<td>'.$row['apoyo'].'</td>
											<td>'.$row['pais'].'</td>
											<td>'.$row['cliente'].'</td>
											<td>'.$row['tipo'].'</td>
											<td>'.$row['status'].'</td>
											<td>'.$row['asignar'].'</td>
											<td>'.$row['desc'].'</td>
										</tr>';
				}
$contenido.='</tbody></table></body></html>';

$f=str_replace(':','',str_replace(' ','',date("Y-m-d H:i:s")));
echo $archivo='archivos/'.$f.'.xls';
$fp=fopen($archivo,"x");
fwrite($fp,$contenido);
fclose($fp);
header("Location: $archivo");
?>



				<?php
				/*
				if(isset($_GET)){
					$fechainicio=$_REQUEST['fechainicio'];
					$fechafin=$_REQUEST['fechafin'];
					include('includes/cnx.php');
				$Ssql=mysqli_query($link, "SELECT * FROM `registro` WHERE `fsolicitud` BETWEEN '$fechainicio' AND '$fechafin'") or die("Error al leer entre las dos fechas");
				
						if(mysqli_num_rows($Ssql)){$numero=0;
							while($row=mysqli_fetch_array($Ssql)){
								
								if ($numero%2==0){
								   echo '<tr class="alt">
											<td>'.$row['nrosolicitud'].'</td>
											<td>'.$row['fsolicitud'].'</td>
											<td>'.$row['fpreventa'].'</td>
											<td>'.$row['factividad'].'</td>
											<td>'.$row['fasignacion'].'</td>
											<td>'.$row['vendedor'].'</td>
											<td>'.$row['actividad'].'</td>
											<td>'.$row['ejecutivo'].'</td>
											<td>'.$row['apoyo'].'</td>
											<td>'.$row['pais'].'</td>
											<td>'.$row['cliente'].'/td>
											<td>'.$row['tipo'].'/td>
											<td>'.$row['status'].'/td>
											<td>'.$row['asignar'].'/td>
											<td>'.$row['desc'].'/td>
										</tr>';
								}else{
								  echo '
								}
								$numero++;
							}
						}else{
							echo '<script> alert("No hay Preventas en el período solicitado"'.$codhx.');</script>';
						}
					}
					*/?>	
</body>
</html>