<?php
require 'conexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>Nueva institución</title>
	
	<?php
	  	include "../Componentes/estilos.php";
	?>

	<script language="javascript">
		function limpia(){
			$('#nombI').val(" ");
			$('#nombCo').val(" ");
		}
	</script>
</head>
<body>  
	<?php
	include "../Componentes/menu.php";
	?>  
		<!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid">
            <div class="panel panel-primary card-view " style="margin-top: 20px;">
            <div class="panel-heading text-center">
                <div class="pull-center">
                    <h3 class="panel-title panel-center txt-light"><i class="fa fa-wrench"></i>  Nueva Institución</h3>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
										<div class="form-wrap">
											<?php 
											   $aux=1;
											   $sentencia = "SELECT * FROM institucion WHERE idIn=$aux"; 
											   $ejecutar=mysqli_query($mysqli,$sentencia);
											   $fila = mysqli_fetch_assoc($ejecutar);
										    ?>                                  
										    <form  action="editar.php" method="post" class="form-register" > 
									       		<div class="input-group">
									 				<div class="col-lg-8 col-md-offset-3">
									 					<label for="nombI" >Nombre:</label>
									  					<div class="input-group">
									  						<input type="text" class="form-control" id="nombI" name="nombI" placeholder="Nombre" value="<?php echo $fila['Nombre'];?>">
															<div class="input-group-addon">
																<span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
															</div>
														</div>
													</div>
													<div class="col-lg-8 col-md-offset-3">
													  	<label for="nombCo" >Codigo:</label>
													  	<div class="input-group">
													  		<input type="text" class="form-control" id="nombCo" name="nombCo" placeholder="Ej:1125" value="<?php echo $fila['codigo'];?>">
														  	<div class="input-group-addon">
														  		<span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
														  	</div>
														</div>
													</div>
												</div>
												<div class="row text-center" style="margin-top: 15px;">
									  				    <?php include '../Componentes/BtnGuardarCancelar.php'; ?>
									  				</div>
											</form>
											<br>
											<br>
										</div>
                </div>
                </div>
                </div>
				
			
				<!-- Footer -->
				<?php include '../Componentes/footer.php'; ?>
				<!-- /Footer -->
			</div>
		</div>
        <!-- /Main Content -->
	
	<?php
include "../Componentes/scripts.php";
?>
	
</body>

</html>
