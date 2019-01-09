<?php
require 'conexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>Categorias</title>
	<?php
	  	include "../Componentes/estilos.php";
	?>
	<script src="../../asset/js/activoFijo.js"></script>
	<script language="javascript">
	  function sele(){
	  var cond= $("#condi").val();
	     ajax_act('','categoria',cond);
	}
    window.onload = function() {
        $("#condi").val('1');
        $("#condi").change();
    };
	</script>
</head>
<body>  
	<!--Preloader-->
	<div class="preloader-it"><div class="la-anim-1"></div></div>
	<!--/Preloader-->
    <div class="wrapper theme-1-active box-layout pimary-color-red">
	<?php
	include "../Componentes/menu.php";
	?>  
		<!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid">
            <div class="panel panel-primary card-view " style="margin-top: 20px;">
            <div class="panel-heading text-center">
                <div class="pull-center">
                    <h3 class="panel-title panel-center txt-light"><i class="fa fa-wrench"></i>  Gestionar  Categorias</h3>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-5">
								 	<div class="form-group">
								 	<button class="btn btn-primary btn-lable-wrap left-label" data-toggle="modal" data-target="#ModalRegistarProveedor"> <span class="btn-label"><i class="fa fa-plus"></i> </span><span class="btn-text">Ingresar Categoria</span></button>
								 	</div>
								</div>
                                
                                <div class="col-md-1">
                                    <button class="btn  btn-default btn-outline">Estado</button>
                                </div>
							  	<div class="col-md-2">
									<div class="form-group">                                     
							 			<select class="form-control SEstado" data-live-search="true" id="condi" name="condi" onchange="sele()">
											<option value="1" >Activo</option>											 
											<option value="0">Inactivo </option>
										</select>
									</div>
								</div> 
                    </div>
                </div>
                </div>
                </div>
								
										<?php $cont=0;			?>
										<!-- Row -->
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="table-responsive" id="actualizar">
											
										</div>
									</div>
								</div>
							</div>
						</div>	
					</div>
				</div>
				<!-- /Row -->
			
 
				<!--Modal  Registrar-->
				<div id="ModalRegistarProveedor" class="modal fade" role="dialog">
				  	<div class="modal-dialog modal-lg">

				    <!-- Modal content-->
						<form  action="insert.php" method="post" class="form-register" > 
				    		<div class="modal-content">
				    			<div class="color-moduloInventario">
				       					<div class="modal-body">
				       					<div class="panel panel-success card-view">
<div class="panel-heading text-center">
    <div class="pull-center" >
    <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="panel-title panel-center txt-light">Registrar Categoria</h2>
    </div>
    <div class="clearfix"></div>
</div>
<div class="panel-wrapper collapse in">
    <div class="panel-body">
				 							<div class="row">
				  								<div class="col-md-12">
													<div class="col-md-3 ">
														<img src="../Imagen/categoria.jpg" class="img-rounded" alt="Cinque Terre" width="300" height="250">
													</div>

													<div class="col-md-7 col-md-offset-2">

														<div class="col-md-6 ">
															<div class="input-group">
															  	<label for="nombcat" >Nombre:</label>
															  	<div class="input-group">
															  		<input type="text" class="form-control" id="nombcat" name="nombcat" placeholder="Nombre" required>
															  		<div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
																</div>
															</div>


															<div class="input-group">
															  	<label for="cod" >Código:</label>
															  	<div class="input-group">
															  		<input type="text" class="form-control" id="cod" name="cod" placeholder="Ejemplo : H001" required>
															  		<div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
																</div>
															</div>


															<div class="input-group">
															  	<label for="val">Valor residual(%):</label>
															  	<div class="input-group">
															  		<input type="text" class="form-control" id="val" name="val" required> 
															  		<div class="input-group-addon"><span class="glyphicon glyphicon-briefcase"></span></div>
															  	</div>
															</div>
														</div>
														
														<div class="col-md-6">
															<div class="input-group">

																<label for="vidU" >Vida Util:</label>
																<div class="input-group">
																  <input type="text" class="form-control" id="vidU" name="vidU" required>
																  <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
																</div>
															</div>


															<div class="input-group">
															  	<label for="vidE">Vida economica:</label>
															  	<div class="input-group">
															  		<input type="text" class="form-control" id="vidE" name="vidE" required>
															  		<div class="input-group-addon"><span class="glyphicon glyphicon-briefcase"></span></div>
															  	</div>
															</div>


														</div>
													</div>

												</div>
											</div> 
    </div>
                                            </div>
                                            </div>
										</div>
													  
										<div class="modal-footer">
                                            <?php include '../Componentes/BtnGuardarCancelar.php'; ?>
										</div>
									</div>
							</div>
						</form>
                    </div>
                </div>

				<!--Fin modal Registrar Proveedor-->

			</div>
    <!-- /#wrapper -->
				<!-- Footer -->
				<?php include '../Componentes/footer.php'; ?>
				<!-- /Footer -->
			</div>
		</div>
        <!-- /Main Content -->

	
	<?php
include "../Componentes/scripts.php";
?>
	<script>
        $(function () {
            $('.SEstado').select2()
        });
    </script>
</body>

</html>


		
				
				