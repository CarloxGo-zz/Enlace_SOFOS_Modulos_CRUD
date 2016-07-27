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

<title>Sistema S3. Sofos Corp - Solicitudes Pre-ventas</title>
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
</head>
<body>
<!--This is the START of the header-->
<div id="wrap">
<div id="topcontrol" style="position: fixed; bottom: 5px; left: 960px; opacity: 1; cursor: pointer;" title="Go to Top"></div>
<div id="header-wrapper">
	<div id="header">
		<div id="logo"> <a href="index.php"><img src="images/logo2.png" width="190"alt="logo" /></a> </div>
		<div id="header-text">
			<br /><br />
			<h4>SAP®: Líder Mundial de Software de Gestión de Empresas</h4>
			<h6><a href="index.php">Inicio</a></h6>
		</div>
	</div>
</div>
<!--END of header-->
<!--This is the START of the menu-->
<div id="menu-wrapper">
	<div id="main-menu" style="position: auto; z-index: 9998;">
	<div id="cssmenu"> 
	<ul>
	   <li><a href="index.php">Inicio</a></li>
	   <?php
	   $nivel=$_SESSION['nivel'];

	   if($nivel==1 || $nivel==3){
	   	?>
	   <li class='active has-sub'><a href="#">Registro</a>
	      <ul>
	         <li class='active has-sub'><a href="#">Solicitud</a>
	            <ul>
	                <li><a href="index.php?pag=1">Pre-Venta</a></li>
	                <li><a href="index.php?pag=2">Prospecto</a></li>
	            </ul>
	         </li>
	      </ul>
	   </li>
	    <?php
	   }
	   
	   if($nivel==1 || $nivel==2){
	   ?>
	   <li class='active has-sub'> <a href="#">Asignar</a>
	         <ul>
	            <li><a href="index.php?pag=3">Ejecutivo Responsable</a></li>
	            <li><a href="index.php?pag=4">Fecha de asignaci&oacute;n</a></li>
				<li><a href="index.php?pag=5">Fecha de Confirmaci&oacute;n</a></li>
	         </ul>
	   	</li>
	    <?php 
		}
	    ?>
	   	<li class='active has-sub'><a href="#">Estado</a>
	      <ul>
	      <?php
			if($nivel==1 || $nivel==3){
		      	?>
	        	<li><a href="index.php?pag=6">Por Nº de Solicitud</a></li>
	        	<?php 
	     	}

	     	if($nivel==1 || $nivel==2){
		        ?>
				<li><a href="index.php?pag=7">Por Período</a></li>
				<?php 
			}
	    ?>
	      </ul>
	   </li>
	   <li class='active has-sub'><a href="#">Reportes</a>
	    	<ul>
		        <li><a href="index.php?pag=8">Por n&uacute;mero de Pre-venta</a></li>
				<?php
					if($nivel==1 || $nivel==2){
		      	?>
		        <li><a href="reporte_general.php" target="_blank">Por Per&iacute;odo</a></li>
		         <?php
		         }
	   			
	   			if($nivel==1 || $nivel==2){
				?>
		        	<li><a href="reporte_estatus.php" target="_blank">Por Estatus</a></li>

		        	<li><a href="reporte_pais.php" target="_blank">Por Pa&iacute;s</a></li>
		        <?php 
		        }
		        ?>
	      </ul>
	   </li>
	   <li class='active has-sub'><a href="#">Contacto</a>
	      <ul>
	         <li><a href="#venezuela" class='active has-sub'>Contacto Venezuela</a>
	         	<ul>
	                <li><a href="">Venezuela
									Valencia
									Teléf.: +58(241) 824.59.38 / +58 (241) 825.46.72
									Fax: +58 (241) 8254672
									Correo electrónico: ventas.ve@sofoscorp.com</a></li>
	            </ul>
	         </li>
	         <li><a href="#mexico" >Contacto Mexico</a>
	         <ul>
	                <li><a href="">Mexico
									Distrito Federal
									Teléf.: +52 (55) 5250.0709
									Guadalajara
									Teléf.: +52 (33) 3678.9139
									Correo electrónico: ventas.mx@sofoscorp.com</a></li>
	            </ul>
	        </li>
	         <li><a href="#argentina" class='active has-sub'>Contacto Argentina</a>
	         <ul>
	                <li><a href="">	Argentina
									Buenos Aires
									Teléf.: +54-11-5244-1286
									Correo electrónico: ventas.ar@sofoscorp.com</a></li>
	            </ul>
	        </li>
	      </ul>
	   	</li>
		<li><a href="http://www.blogdesap.com/" target="_blank">Blog</a>
		<?php
		if($nivel==1){
		?>
		<li><a href="index.php?pag=11">Respaldar BD</a>
		<?php
		}
		?>
		<li><a href="seguridad/finalizar.php">Finalizar Sesi&oacute;n</a>
	</ul>
	</div>

<!-- FIN MENU INCUIDO -->
</div>

	<!--Inicio del footer-->
	<div id="footer">
		<div id="social-box">
			<ul>
				<li>
					<div class="facebook"><a href="https://www.facebook.com/Meche18?fref=ts" target="_blank"></a></div>
				</li>
				<li>
					<div class="twitter"><a href="https://twitter.com/@mercedesweffer" target="_blank"></a></div>
				</li>
				<li>
					<div class="rss"><a href="mailto:mercedesweffer@gmail.com" ></a></div>
				</li>
			</ul>
		</div>
		<h6>Copyright © 2015 - @MercedesWeffer <?php 
		
		switch ($nivel) {
			case 1:
				$lvl="Admin";
			break;
			case 2:
				$lvl="Coordinador";
			break;
			case 3:
				$lvl="Vendedor";
			break;
		}
		echo '
		<span style="background:#F1EFEF";>
			<span style="color: #01945B;>Nivel de usuario:</span>
			<span style="color: #EA2F21; font-weight:900">'.$lvl.'</span>
			<span style="color: #01945B; font-size:9;"> || Usuario: </span>
			<span style="color: #EA2F21; font-weight:900">'.$_SESSION['user'].'</span>
			<span style="color: #01945B; font-size:9;"> || Nombre: </span>
			<span style="color: #EA2F21; font-weight:900">'. $_SESSION['nombre'].'</span>
		</span>'; 

	?></h6>
	</div>
	<!--Fin del footer-->
</div>
<!--Fin del menu-->
<!--Inicio del content-->
<div id="content">
	<!-- Inicio del área a modificar para invocar las diferentes páginas
	********************************************************************
	-->
<?php
error_reporting (E_ALL ^ E_NOTICE);
$pag=$_GET['pag'];
switch($pag){
	case 1:
		echo '<iframe id="iframe" name="Stack" src="includes/formRegistroPreventa.php" width="702" height="489" frameborder="0" marginwidth="0" scrolling="no" onload="javascript:resizeIframe(this);"></iframe>';	
	break;
	case 2:
		echo '<iframe id="iframe" name="Stack" src="includes/formRegistroCliente.php" width="702" frameborder="0" marginwidth="0" scrolling="no" onload="javascript:resizeIframe(this);"></iframe>';
	break;
	case 3:
		echo '<iframe id="iframe" name="Stack" src="includes/asignar.php?opt=1" width="702" frameborder="0" marginwidth="0" scrolling="no" onload="javascript:resizeIframe(this);"></iframe>';
	break;
	case 4:
		echo '<iframe id="iframe" name="Stack" src="includes/asignar.php?opt=2" width="702" frameborder="0" marginwidth="0" scrolling="no" onload="javascript:resizeIframe(this);"></iframe>';
	break;
	case 5:
		echo '<iframe id="iframe" name="Stack" src="includes/asignar.php?opt=3" width="702" frameborder="0" marginwidth="0" scrolling="no" onload="javascript:resizeIframe(this);"></iframe>';
	break;
	case 6:
		echo '<iframe id="iframe" name="Stack" src="includes/asignar.php?opt=4" width="702" frameborder="0" marginwidth="0" scrolling="no" onload="javascript:resizeIframe(this);"></iframe>';
	break;
	case 7:
		echo '<iframe id="iframe" name="Stack" src="includes/preventasxperiodo.php" width="702" frameborder="0" marginwidth="0" scrolling="no" onload="javascript:resizeIframe(this);"></iframe>';
	break;
	case 8:
		echo '<iframe id="iframe" name="Stack" src="includes/asignar.php?opt=5" width="702" frameborder="0" marginwidth="0" scrolling="no" onload="javascript:resizeIframe(this);"></iframe>';
	break;
	case 9:
		echo '<iframe id="iframe" name="Stack" src="includes/asignar.php?opt=6" width="702" frameborder="0" marginwidth="0" scrolling="no" onload="javascript:resizeIframe(this);"></iframe>';
	break;
	case 10:
		echo '<iframe id="iframe" name="Stack" src="includes/asignar.php?opt=7" width="702" frameborder="0" marginwidth="0" scrolling="no" onload="javascript:resizeIframe(this);"></iframe>';
	break;
	case 11:
		echo '<iframe id="iframe" name="Stack" src="backup.php" width="702" frameborder="0" marginwidth="0" scrolling="no" onload="javascript:resizeIframe(this);"></iframe>';
	break;
	
	default:
		echo '<!--Inicio del slider-->
				<div class="slider-wrapper theme-effe">
					<div id="slider" class="nivoSlider">
						<img src="images/slider/slide1.jpg" alt="" title="#img1" />
						<img src="images/slider/slide2.jpg" alt="" title="#img2" />
						<img src="images/slider/slide3.jpg" alt="" title="#img3" />
						<img src="images/slider/slide4.jpg" alt="" title="#img4" />
					</div>
				</div>
				<!--Fin del Slider-->';
	break;

}
?>
	<!-- Fin del área a modificar para invocar las diferentes páginas
	********************************************
	-->
	
	<!--Inicio de las Noticias Recientes-->
	<div class="spacer"></div>
	<div id="recent-text">
		<h2>Estos son nuestros últimos artículos...</h2>
		<div class="star-divider"></div>
		<h5>Pueden ser chequeados en la sección del blog!</h5>
		<div class="spacer"></div>
	</div>
	<div id="recent-posts-container">
		<div class="section-description">
			<h5>Entradas Recientes</h5>
			<p>SAP devela plataforma SAP HANA® Cloud para internet de las cosas...</p>
		</div>
		<div class="recent-summary">
			<div class="recent-item"> <a class="single_image" href="images/blog/large/recent1.jpg"><img src="images/blog/thumbs/recent1.jpg" width="250" height="150" alt="recent1" /></a>
				<h6>NYSE: SAP</h6>
				<p>Análisis de datos con SAP Lumira®<a class="readmore" href="blog.html"> leer más →</a></p>
			</div>
			<div class="recent-item-last"> <a class="single_image" href="images/blog/large/recent2.jpg"><img src="images/blog/thumbs/recent2.jpg" width="250" height="150" alt="recent2" /></a>
				<h6>SofOS Comunicaciones</h6>
				<p>Internet de las Cosas<a class="readmore" href="blog.html"> leer más →</a></p>
			</div>
		</div>
		<!--Fin de las Noticias Recientes-->
		<!--This is the START of the recent projects-->
		<div id="recent-projects-container">
			<div class="section-description">
				<h5>Artículos de Nuestra Magazine</h5>
				<p>Para verdaderos fanáticos de la NBA...</p>
			</div>
			<div class="recent-summary">
				<div class="recent-item"><a class="single_image" href="images/portfolio/thumbs/recent1.jpg"><img src="images/portfolio/thumbs/recent1.jpg" width="250" height="150" alt="recent1" /></a>
					<h6>SAP® HANA®</h6>
					<p>Para verdaderos fanáticos de la NBA...HANA®<a class="readmore" href="portfolio.html"> leer más →</a></p>
				</div>
				<div class="recent-item-last"> <a class="single_image" href="images/portfolio/thumbs/recent2.jpg"><img src="images/portfolio/thumbs/recent2.jpg" width="250" height="150" alt="recent2" /></a>
					<h6>SAP® HANA®</h6>
					<p>SAP devela plataforma SAP® HANA® Cloud para internet de las cosas<a class="readmore" href="portfolio.html"> leer más →</a></p>
				</div>
			</div>
			<!--END of recent projects-->
			<div class="spacer"></div>
			<!--END of content-->
		</div>
	</div>
</div>
<!--END of content-->
<p class="slide"><a href="#" class="btn-slide"></a></p>
<div id="slide-panel" style="z-index: 9999;">
	<!--This is the START of the follow section-->
	<div id="follow" >
		<h3>Mant&eacute;ngase al d&iacute;a de nuestros nuevos productos & estrategias Corporativas!</h3>
		<h5>
			<p>Las características de los nuevos productos ayudarán a los clientes a acelerar la resolución de </p>
			<p>sus problemas asociados con las autorizaciones de seguridad sin necesidad de intervención manual...</p>
		</h5>
		<img class="star-divider" src="images/subscribe_divider.png" /> <a href="http://www.twitter.com/92_five">
		<div id="follow-twitter"><img src="images/tweet_top.png" />
			<h4>Síguenos en twitter</h4>
		</div>
		</a><a href="http://eepurl.com/dqtGj">
		<div id="follow-mail"><img src="images/mail_top.png" />
			<h4>Contáctanos</h4>
		</div>
		</a>
		<h1>SAP "Run Smart!"</h1>
	</div>
	<!--END of follow section-->
</div>
</div>

<!--<div class="overlay-container">
		<div class="window-container zoomin">
			<h3>Versión en Zoom in</h3> 
			Texto de la ventana emergente<br/>
			<br/>
			<span class="close" align="center">Cerrar</span>
		</div>
</div>-->


<?php
if ($_GET['res']==1){
	$codhx=$_GET['codhx'];
	echo '<script> alert("Datos registrados, Numero de solicitud de Preventa"'.$codhx.');</script>';
}
?>
</body>
</html>