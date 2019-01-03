<?php
require 'conexion.php';
//$con=mysqli_connect('localhost','root','','finanzas');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>Doodle I Fast build Admin dashboard for any platform</title>
	<meta name="description" content="Doodle is a Dashboard & Admin Site Responsive Template by hencework." />
	<meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Doodle Admin, Doodleadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
	<meta name="author" content="hencework"/>
	
	<?php
	  	include "../Componentes/estilos.php";
	?>

	<script language="javascript">
 
		function limpia(){
			$('#nombI').val(" ");
			$('#nombCo').val(" ");
		}

		function envia(){
		   window.location="http://localhost/Financiero/vistas/ActivoFijo/IngresaInstitucion.php";
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
				<!-- Title -->
					<div class="row heading-bg">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						  <h5 align="center" class="txt-dark">Ingreso de Institución</h5>
						</div>
					</div>
					<!-- /Title -->
				

				<!-- Row -->
					<div class="row">
						<div class="col-sm-12">
							<div class="panel panel-default card-view">
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

									  				<div class="col-lg-12 col-md-offset-5">
														<br>
														<br> 
														<div class="button-group">
															<button type="submit" class="btn btn-success">Guardar</button>
															<button type="button"  class="btn btn-success" data-dismiss="modal" onclick="limpia()">Limpiar</button>
															<button type="button"  class="btn btn-success" data-dismiss="modal" onclick="envia()">Cancelar</button>
														</div>
													</div>

												</div>
											</form>
											<br>
											<br>
										</div>
									</div>
								</div>
					 		</div>
						</div>
					</div>
					
			
				<!-- Footer -->
				<footer class="footer container-fluid pl-30 pr-30">
					<div class="row">
						<div class="col-sm-12">
							<p>2017 &copy; Doodle. Pampered by Hencework</p>
						</div>
					</div>
				</footer>
				<!-- /Footer -->
			</div>
		</div>
        <!-- /Main Content -->

    </div>
    <!-- /#wrapper -->
	
	
	<?php
include "../Componentes/scripts.php";
?>
	
</body>

</html>
