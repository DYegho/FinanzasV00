<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="<?php echo SERVERURL;?>Archivos/fonts/iconic/css/material-design-iconic-font.min.css">
	<title><?php echo COMPANY; ?></title>
    <?php include "./Vistas/Includes/Link.php"; ?>
</head>
<body>
	<?php
		//variable
		$peticionAjax=false;
		require_once "./Controladores/vistasControlador.php";
		$vi= new vistasControlador();
		// result view
		$vistas=$vi->obtener_vistas_controlador();
		// validate
		if($vistas=="login" || $vistas=="404"){
			require_once "./Vistas/Contenidos/".$vistas."-view.php";
		}else{
	?>
	<!-- Main container -->
	<main class="full-box main-container">
		<!-- nav -->
		<?php include "./Vistas/Includes/Nav.php";?>
		<!-- Page content -->
		<section class="full-box page-content">
			<?php
				include "./Vistas/Includes/navUp.php";
				include $vistas
			?>
		</section>
	</main>
	<?php
	}
	include "./Vistas/Includes/Script.php";
	?>
</body>
</html>
