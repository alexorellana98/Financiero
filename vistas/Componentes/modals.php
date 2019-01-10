<!--Modal  Registrar -->
<div id="ModalInstitucion" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
<form  action="insert.php" method="post" class="form-register" > 
    <div class="modal-content">
       <div class="modal-body">
<div class="panel panel-success card-view">
<div class="panel-heading text-center">
    <div class="pull-center" >
    <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="panel-title panel-center txt-light">Registrar Institución</h2>
    </div>
    <div class="clearfix"></div>
</div>
<div class="panel-wrapper collapse in">
    <div class="panel-body">
 <div class="row">
  <div class="col-md-12">
<div class="col-md-3 ">
<img src="../Imagen/movimientos.png" class="img-rounded" alt="Cinque Terre" width="300" height="250">
</div>
<div class="col-md-7 col-md-offset-2">
<div class="col-md-6">
<div class="input-group">
  <label for="nombMov" >Nombre:</label>
  <div class="input-group">
  <input type="text" class="form-control" id="nombMov" name="nombMov" placeholder="Nombre" required>
  <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
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
      </form>
      </div>
</div>
<!--Fin modal Registrar -->



<!--Modal  Registrar Categoria-->
				<div id="ModalCategoria" class="modal fade" role="dialog">
				  	<div class="modal-dialog modal-lg">
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

				<!--Fin modal Registrar Categoria-->
				
				 <!--Modal  Registrar Ubicacion-->

<div id="ModalUbicacion" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
<form  action="insert.php" method="post" class="form-register" > 
    <div class="modal-content">
       <div class="modal-body">
<div class="panel panel-success card-view">
<div class="panel-heading text-center">
    <div class="pull-center" >
    <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="panel-title panel-center txt-light">Registrar Ubicación</h2>
    </div>
    <div class="clearfix"></div>
</div>
<div class="panel-wrapper collapse in">
    <div class="panel-body">
     <div class="row">
  <div class="col-md-12">


<div class="col-md-3 ">

<img src="../Imagen/ubicacion.jpg" class="img-rounded" alt="Cinque Terre" width="300" height="250">
</div>

<div class="col-md-7 col-md-offset-2">

<div class="col-md-6">
<div class="input-group">

  <label for="nombUb" >Nombre:</label>
  <div class="input-group">
  <input type="text" class="form-control" id="nombUb" name="nombUb" placeholder="Nombre" required>
  <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
</div>
</div>


<div class="input-group">

  <label for="codUb" >Codigo:</label>
  <div class="input-group">
  <input type="text" class="form-control" id="codUb" name="codUb" placeholder="Ej:0023" required>
  <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
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

      </form>
      </div>
 
</div>
<!--Fin modal Registrar Ubicacion-->
        
        
 <!--Modal  Registrar Proveedor-->
<div id="ModalProveedor"  class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
<form  action="insert.php" method="post" class="form-register" > 
    <div class="modal-content">
       <div class="modal-body">
       
				       					<div class="panel panel-success card-view">
<div class="panel-heading text-center">
    <div class="pull-center" >
    <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="panel-title panel-center txt-light">Registrar Proveedor</h2>
    </div>
    <div class="clearfix"></div>
</div>
<div class="panel-wrapper collapse in">
    <div class="panel-body">
 <div class="row">
  <div class="col-md-12">
<div class="col-md-3 ">
<img src="../Imagen/proveedor.png" class="img-rounded" alt="Cinque Terre" width="200" height="200">
</div>
<div class="col-md-8">
<div class="col-md-6">
<div class="input-group">
  <label for="nomb" >Nombre de proveedor:</label>
  <div class="input-group">
  <input type="text" class="form-control" id="nomb" placeholder="Nombre" name="nomb" required>
  <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
</div>
</div>
<div class="input-group">
  <label for="dir">Dirección </label>
  <div class="input-group">
  <input type="text" class="form-control" id="dir" name="dir" required>
  <div class="input-group-addon"><span class="glyphicon glyphicon-home"></span></div>
  </div>
</div>
<div class="input-group">
  <label for="nit">NIT  </label>
  <div class="input-group">
  <input type="text" class="form-control" id="nit" placeholder="" name="nit" required>
   <div class="input-group-addon"><span class="glyphicon glyphicon-check"></span></div>
  </div>
</div>
<div class="input-group">
  <label for="obs">Observaciones </label>
  <div class="input-group">
  <input type="text" class="form-control" id="obs" placeholder="" name="obs" required>
   <div class="input-group-addon"><span class="glyphicon glyphicon-eye-open"></span></div>
  </div>
</div>
</div>
<div class="col-md-6">
<div class="input-group">
  <label for="cont" >Nombre del contacto:</label>
  <div class="input-group">
  <input type="text" class="form-control" id="cont" placeholder="Nombre" name="cont" required>
  <div class="input-group-addon"><span  class="glyphicon glyphicon-user" aria-hidden="true"></span></div>
</div>
</div>

<div class="input-group">
  <label for="tel" >Telefono:</label>
  <div class="input-group">
  <input type="text" class="form-control" id="tel" placeholder="" name="tel" required>
  <div class="input-group-addon"><span  class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span></div>
</div>
</div>
<div class="input-group">
  <label for="correo">Correo electrónico </label>
  <div class="input-group">
  <input type="text" class="form-control" id="correo" name="correo" required>
  <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
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
<?php  include '../Componentes/BtnGuardarCancelar.php'; ?>
        </div>
 </div>
  
 
        </form>
      </div>
      
 </div>
        <!--Fin modal Registrar Proveedor -->
        
               <!--Modal  Registrar Movimiento-->

<div id="ModalMovimiento" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
<form  action="insert.php" method="post" class="form-register" > 
    <div class="modal-content">
       <div class="modal-body">
<div class="panel panel-success card-view">
<div class="panel-heading text-center">
    <div class="pull-center" >
    <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="panel-title panel-center txt-light">Registrar Movimiento</h2>
    </div>
    <div class="clearfix"></div>
</div>
<div class="panel-wrapper collapse in">
    <div class="panel-body">
 <div class="row">
  <div class="col-md-12">
<div class="col-md-3 ">
<img src="../Imagen/movimientos.png" class="img-rounded" alt="Cinque Terre" width="300" height="250">
</div>
<div class="col-md-7 col-md-offset-2">
<div class="col-md-6">
<div class="input-group">
  <label for="nombMov" >Nombre:</label>
  <div class="input-group">
  <input type="text" class="form-control" id="nombMov" name="nombMov" placeholder="Nombre" required>
  <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
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
      </form>
      </div>
</div>
<!--Fin modal Registrar Movimiento -->

<!--Modal  Registrar Marca-->

<div id="ModalMarca" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
<form  action="insert.php" method="post" class="form-register" > 
    <div class="modal-content">
       <div class="modal-body">
<div class="panel panel-success card-view">
<div class="panel-heading text-center">
    <div class="pull-center" >
    <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="panel-title panel-center txt-light">Registrar Marca</h2>
    </div>
    <div class="clearfix"></div>
</div>
<div class="panel-wrapper collapse in">
    <div class="panel-body">
 <div class="row">
  <div class="col-md-12">
<div class="col-md-3 ">
<img src="../Imagen/Marca2.png" class="img-rounded" alt="Cinque Terre" width="300" height="250">
</div>
<div class="col-md-7 col-md-offset-1">
<div class="col-md-6">
<div class="input-group">
  <label for="nombProd" >Nombre:</label>
  <div class="input-group">
  <input type="text" class="form-control" id="nombProd" name="nombProd" placeholder="Nombre" required>
  <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
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
      </form>
      </div>
 </div>
<!--Fin modal Registrar Marca-->

		 <!--Modal  Registrar Sub-Categoria-->
<div id="ModalSubCategoria" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
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
<br>
<img src="../imagen/subcate.png" class="img-rounded" alt="Cinque Terre" width="250" height="250">
</div>
<div class="col-md-5 col-md-offset-1">
<div class="form-group">
  <label for="nombsub" >Nombre:</label>
  <div class="input-group">
  <input type="text" class="form-control" id="nombsub" name="nombsub" placeholder="Nombre" required>
  <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
</div>
</div>
<br>

<div class="form-group">
 <label for="nomcatego" >Elija una categoria:</label>
<br>
 <select class="form-control STipoCategoria" data-live-search="true" id=" nomcatego" name="nomcatego" onchange="cod(this.value)">
 <option ></option>

                     <?php
$extraer="SELECT * FROM categoria";

// $base=mysqli_select_db($con,'finanzas');
$ejecutar=mysqli_query($mysqli,$extraer);
$cont=$cont+1;

while($ejecuta=mysqli_fetch_array($ejecutar))
{
  if (($ejecuta['estado'])==1) {
  $cont=$cont+1;
  

    ?>  
    <?php ?>
                 <option value="<?php  echo $ejecuta['cod'] ?>"><?php  echo $ejecuta['nombre'] ?></option>          
    <?php
}
}
?>                   
     
</select>                 
               
</div>
<br>


<div class="form-group">

  <label for="codsub" >Código:</label>
  <div class="input-group">
  <input type="text" class="form-control" id="codsub" name="codsub" placeholder="Ejemplo : 0001">
  <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
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

<!--Fin modal Registrar Sub-Categoria-->
    			