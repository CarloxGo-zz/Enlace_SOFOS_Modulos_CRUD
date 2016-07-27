<?php 
error_reporting(E_ALL ^ E_NOTICE);
if($_SERVER['HTTP_REFERER']==""){
	session_start();
	session_destroy();
	header("location: seguridad/session.php");
}
include("seguridad/security_system.php");
?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="css/estilomenu.css">

<title>Sistema S3. Sofos Corp - Reporte</title>
<link rel="shortcut icon" href="favicon.ico" />
<!-- Load CSS -->
<link href="css/style.css" rel="stylesheet" type="text/css" />
<!-- Load Fonts -->
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Droid+Serif:regular,italic,bold,bolditalic" type="text/css" />
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Droid+Sans:regular,bold" type="text/css" />
<link rel="stylesheet" href="css/popup.css" type="text/css" />
<!-- Load jQuery iframe box -->
<script language="javascript" type="text/javascript">
  function resizeIframe(obj) {
    obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
  }
</script>
<!-- Load jQuery library -->
<script type="text/javascript" src="scripts/jquery-1.6.2.min.js"></script>
<!-- Load custom js -->
<script type="text/javascript" src="scripts/panelslide.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>
<!-- Load topcontrol js -->
<script type="text/javascript" src="scripts/scrolltopcontrol.js"></script>
<!-- Load NIVO Slider -->
<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/nivo-theme.css" type="text/css" media="screen" />
<script src="scripts/jquery.nivo.slider.pack.js" type="text/javascript"></script>
<script src="scripts/nivo-options.js" type="text/javascript"></script>
<!-- Load fancybox -->
<script type="text/javascript" src="scripts/jquery.fancybox-1.3.4.pack.js"></script>
<script type="text/javascript" src="scripts/jquery.easing-1.3.pack.js"></script>
<script type="text/javascript" src="scripts/jquery.mousewheel-3.0.4.pack.js"></script>

<link rel="stylesheet" href="css/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/tabla.css">
</head>
<body>
	<div class="datagrid">
	<form action="reporte_estatus.php" method="get" accept-charset="utf-8" align="left">
	
		<table width="50%">
			<tr>
				<td>Fecha Inicio</td>
				<td><input class='date' type="date" name="fechainicio" placeholder="DD/MM/AAAA" required="required" /></td>
			</tr>
			<tr>
				<td>Fecha Fin</td>
				<td><input class='date' type="date" name="fechafin" placeholder="DD/MM/AAAA" required="required" /></td>

			</tr>
			<tr>
				<td>Estatus</td>
				<td><select class="required" name="status" required="required">
              <option value="Iniciada">Iniciada</option>
                          <option value="Pendiente">Pendiente</option>
                          <option value="Proceso">Proceso</option>
                          <option value="Stand-By">Stand-By</option>
                          <option value="Terminada">Terminada</option>
                          <option value="Anulada">Anulada</option>
            </select></td>
				
			</tr>
			<tr colspan="2">
				<td ><input type="submit" value="Buscar"></button></td>
			</tr>
		</table>


	</form>

		<table>
			<thead>
				<tr>
					<th>Nº Solicitud</th><th>F.Solicitud</th><th>F.Preventa</th><th>F.Actividad</th>
					<th>F.Asignaci&oacute;</th><th>Vendedor</th><th>Actividad</th><th>Ejecutivo</th>
					<th>Apoyo</th><th>Pa&iacute;s</th><th>Cliente</th><th>Tipo</th><th>Estatus</th>
					<th>Asignar</th><th>Descripci&oacute;n/th>
				</tr>
			</thead>

																				

			<tfoot>
				<tr><td colspan="15">
					<div id="paging">
						<ul>
							<li>
							<?php
							if($_REQUEST['fechainicio']!="" and $_REQUEST['fechafin']!="" and $_REQUEST['status']!=""){
							?>
							<span style="font-size:16px;font-weight:300" >Per&iacute;odo: <?php echo '<span style="font-size:20px;color:red";><input type="date" value="'.$_REQUEST['fechainicio'].'" disabled />
							</span> al <span style="color:red";><input type="date" value="'.$_REQUEST['fechafin'].'" disabled />
							</span> &nbsp;&nbsp;&nbsp;&nbsp; ';?></span><a target="_blank" href="pdf/ezpdf/reporte_estatus_pdf.php?fechainicio=<?php echo $_REQUEST['fechainicio'];?>&fechafin=<?php echo $_REQUEST['fechafin'];?>&status=<?php echo $_REQUEST['status'];?>"><span>Exportar a PDF</span></a>
							<?php
							}
							?>
							</li>
						</ul>
					</div>
				</tr>
			</tfoot>
			<tbody>
				<?php
				error_reporting(E_ALL ^ E_NOTICE);
				if(isset($_GET['fechainicio']) and isset($_GET['fechafin'])){
					$fechainicio=$_REQUEST['fechainicio'];
					$fechafin=$_REQUEST['fechafin'];
					$status=$_REQUEST['status'];
					include('includes/cnx.php');
					if($fechainicio > $fechafin){
						header("location: reporte_estatus.php?error=1");
					}else{
						if($fechafin > date("Y-m-j") || $fechafin > date("Y-m-j")){
							header("location: reporte_estatus.php?error=3");
						}else{
							$Ssql=mysqli_query($link, "SELECT * FROM `registro` WHERE  `status` = '$status' AND `fsolicitud` BETWEEN '$fechainicio' AND '$fechafin' ORDER BY `fsolicitud` ASC") or die("Error al leer entre las dos fechas");
				
						if(mysqli_num_rows($Ssql)==0){
							echo "<script>alert('No hay Pre-ventas en el período seleccionado');</script>";
						}
							$numero=0;
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
											<td>'.$row['cliente'].'</td>
											<td>'.$row['tipo'].'</td>
											<td>'.$row['status'].'</td>
											<td>'.$row['asignar'].'</td>
											<td>'.$row['desc'].'</td>
										</tr>';
								}else{
								  echo '<tr>
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
								$numero++;
							}
						}
					}
				}
					?>	
			</tbody>
		</table>
	</div>
	<?php
	switch($_GET['error']){
		case 1:
			echo "<script>alert('`Fecha Fin` no puede ser menor  que `Fecha Inicio`, por favor verificar');</script>";
		break;
		case 3:
			echo "<script>alert('Las fechas seleccionadas no pueden ser mayores que la fecha del día de hoy');</script>";
		break;
	}
	?>
</body>
</html>