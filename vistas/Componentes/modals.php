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
<div class="col-md-6">
  <label for="nombMov" >Nombre:</label>
  <div class="input-group">
  <input type="text" class="form-control" id="nombreIns" name="nombreIns" placeholder="Ingrese un Nombre" required>
  <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
</div>
</div>
<div class="col-md-6">
      <label for="codUb" >Código:</label>
  <div class="input-group">
  <input type="text" class="form-control" id="codIns" name="codIns" placeholder="Ingrese un código" required>
  <div class="input-group-addon"><span  class="glyphicon glyphicon-barcode" aria-hidden="true"></span></div>
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
    
    <label for="nombcat" >Nombre:</label>
    <div class="input-group">
        <input type="text" class="form-control" id="nombcat" name="nombcat" placeholder="Ingrese un Nombre" required>
        <div class="input-group-addon"><span  class="glyphicon glyphicon-bookmark" aria-hidden="true"></span></div>
    </div>
</div>
<div class="col-md-6 ">
    <label for="cod" >Código:</label>
    <div class="input-group">
        <input type="text" class="form-control" id="cod" name="cod" placeholder="Ingrese un Código" required>
        <div class="input-group-addon"><span  class="glyphicon glyphicon-barcode" aria-hidden="true"></span></div>
    </div>
    <label for="val">Valor residual(%):</label>
    <div class="input-group">
        <input type="text" class="form-control" id="val" name="val" required placeholder="Ingrese un Valor"> 
        <div class="input-group-addon"><span class="glyphicon glyphicon-usd"></span></div>
    </div>
</div>
<div class="col-md-6">
    <label for="vidU" >Vida Util:</label>
    <div class="input-group">
      <input type="text" class="form-control" id="vidU" name="vidU" required placeholder="Ingrese un Valor">
      <div class="input-group-addon"><span  class="glyphicon glyphicon-sort-by-attributes" aria-hidden="true"></span></div>
    </div>
    <label for="vidE">Vida economica:</label>
    <div class="input-group">
        <input type="text" class="form-control" id="vidE" name="vidE" required placeholder="Ingrese un Valor">
        <div class="input-group-addon"><span class="glyphicon glyphicon-sort-by-attributes"></span></div>
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
 
  <div class="col-md-6">
      <label for="nombUb" >Nombre:</label>
      <div class="input-group">
      <input type="text" class="form-control" id="nombUb" name="nombUb" placeholder="Ingrese un Nombre" required>
      <div class="input-group-addon"><span  class="glyphicon glyphicon-map-marker" aria-hidden="true"></span></div>
      </div>
  </div>

  <div class="col-md-6">
      <label for="codUb" >Código:</label>
  <div class="input-group">
  <input type="text" class="form-control" id="codUb" name="codUb" placeholder="Ingrese un código" required>
  <div class="input-group-addon"><span  class="glyphicon glyphicon-barcode" aria-hidden="true"></span></div>
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
<div id="ModalProveedor" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <form action="insert.php" method="post" class="form-register">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="panel panel-success card-view">
                        <div class="panel-heading text-center">
                            <div class="pull-center">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h2 class="panel-title panel-center txt-light">Registrar Proveedor</h2> </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-6">
                                            <label for="nomb">Nombre de proveedor:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="nomb" placeholder="Ingrese un Nombre" name="nomb" required>
                                                <div class="input-group-addon"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></div>
                                            </div>
                                            <label for="dir">Dirección </label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="dir" name="dir" placeholder="Ingrese una Dirección" required>
                                                <div class="input-group-addon"><span class="glyphicon glyphicon-home"></span></div>
                                            </div>
                                            <label for="nit">NIT </label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="nit" placeholder="Ingrese un NIT" name="nit" required data-mask="9999-999999-999-9">
                                                <div class="input-group-addon"><span class="glyphicon glyphicon-check"></span></div>
                                            </div>
                                    </div>
                                    <div class="col-md-6">
                                                    <label for="cont">Nombre del contacto:</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="cont" placeholder="Ingrese un Nombre" name="cont" required>
                                                        <div class="input-group-addon"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></div>
                                                    </div>
                                                    <label for="tel">Teléfono:</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="tel" placeholder="Ingrese un Teléfono" name="tel" required data-mask="9999-9999">
                                                        <div class="input-group-addon"><span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span></div>
                                                    </div>
                                                    <label for="correo">Correo electrónico </label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="correo" name="correo" required placeholder="Ingrese un Correo Electrónico">
                                                        <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                                                    </div>
                                    </div>
                                    <div class="col-md-12">
                                            <label for="obs">Observaciones</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="obs" placeholder="Ingrese observaciones (Opcional) " name="obs">
                                                <div class="input-group-addon"><span class="glyphicon glyphicon-eye-open"></span></div>
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
  <label for="nombMov" >Nombre:</label>
  <div class="input-group">
  <input type="text" class="form-control" id="nombMov" name="nombMov" placeholder="Ingrese un movimiento" required>
  <div class="input-group-addon"><span  class="glyphicon glyphicon-repeat" aria-hidden="true"></span></div>
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
  <label for="nombProd" >Nombre:</label>
  <div class="input-group">
  <input type="text" class="form-control" id="nombProd" name="nombProd" placeholder="Ingrese una Marca" required>
  <div class="input-group-addon"><span  class="glyphicon glyphicon-qrcode" aria-hidden="true"></span></div>
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
        <h2 class="panel-title panel-center txt-light">Registrar Sub-Categoria</h2>
    </div>
    <div class="clearfix"></div>
</div>
<div class="panel-wrapper collapse in">
    <div class="panel-body">
 <div class="row">
 
 <div class="col-md-12">
    <label for="nombsub" >Nombre:</label>
    <div class="input-group">
    <input type="text" class="form-control" id="nombsub" name="nombsub" placeholder="Ingrese un Nombre" required>
    <div class="input-group-addon"><span  class="glyphicon glyphicon-bookmark" aria-hidden="true"></span></div>
    </div>
 </div>

<div class="col-md-6">
<label for="nomcatego" >Elija una categoria:</label>
<select class="STipoCategoria"  id="nomcatego" name="nomcatego">
<?php
$extraer="SELECT * FROM categoria";
$ejecutar=mysqli_query($mysqli,$extraer);
$cont=$cont+1;
while($ejecuta=mysqli_fetch_array($ejecutar))
{
if (($ejecuta['estado'])==1) {
$cont=$cont+1;
?>  
    <option value="<?php  echo $ejecuta['cod'] ?>"><?php  echo ucwords(strtolower($ejecuta['nombre']))?></option>          
<?php
}
}
?>                   
</select>  
</div>
<div class="col-md-6"> 
<label for="codsub" >Código:</label>
<div class="input-group">
<input type="text" class="form-control" id="codsub" name="codsub" placeholder="Ingrese un Código" required>
<div class="input-group-addon"><span  class="glyphicon glyphicon-barcode" aria-hidden="true"></span></div>
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
    			