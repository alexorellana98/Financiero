<?php 
$mysqli = new mysqli('localhost', 'root', '', 'siccif');
$actualiza=$_REQUEST['actualiza'];
$id=$_REQUEST['id'];
?>
<!--Modal  Registrar Marca-->
<?php
 if($actualiza==="ModalMarcaEditar"){
   $aux=$id;
   $sentencia = "SELECT * FROM marca WHERE idMarca=$aux"; 
   $ejecutar=mysqli_query($mysqli,$sentencia);
   $fila = mysqli_fetch_assoc($ejecutar);
    ?>
    
<div id="ModalMarcaEditar" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
<form  action="editar.php" method="post" class="form-register" > 
    <div class="modal-content">
       <div class="modal-body">
<div class="panel panel-warning card-view">
<div class="panel-heading text-center">
    <div class="pull-center" >
    <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="panel-title panel-center txt-light">Modificar Marca</h2>
    </div>
    <div class="clearfix"></div>
</div>
<div class="panel-wrapper collapse in">
    <div class="panel-body">
 <div class="row">
  <div class="col-md-12">
  <label for="nombProd" >Nombre:</label>
  <div class="input-group">
 <input type="text" class="form-control" id="nombMar" name="nombMar" placeholder="Ingrese una Marca" value="<?php echo $fila['nombre'];?>">
  <div class="input-group-addon"><span  class="glyphicon glyphicon-qrcode" aria-hidden="true"></span></div>
</div>
</div>
</div> 
    <input  type="hidden" class="form-control" id="ideU" name="ideU" placeholder="Nombre" value="<?php echo $aux; ?>">
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
<?php }else if($actualiza=="ModalMovimientoEditar"){ 
$aux=$id;
   $sentencia = "SELECT * FROM movimiento WHERE idMov=$aux"; 
   $ejecutar=mysqli_query($mysqli,$sentencia);
   $fila = mysqli_fetch_assoc($ejecutar);
?>
               <!--Modal  Registrar Movimiento-->
<div id="ModalMovimientoEditar" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
<form  action="editar.php" method="post" class="form-register" > 
    <div class="modal-content">
       <div class="modal-body">
<div class="panel panel-warning card-view">
<div class="panel-heading text-center">
    <div class="pull-center" >
    <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="panel-title panel-center txt-light">Modificar Movimiento</h2>
    </div>
    <div class="clearfix"></div>
</div>
<div class="panel-wrapper collapse in">
    <div class="panel-body">
 <div class="row">
<div class="col-md-12">
  <label for="nombMov" >Nombre:</label>
  <div class="input-group">
 <input type="text" class="form-control" id="nombMo" name="nombMo" placeholder="Ingrese un movimiento" value="<?php echo $fila['nombre'];?>" required>
  <div class="input-group-addon"><span  class="glyphicon glyphicon-repeat" aria-hidden="true"></span></div>
</div>
</div>
<input  type="hidden" class="form-control" id="ideU" name="ideU" placeholder="Nombre" value="<?php echo $aux;?>">
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
<?php }else if($actualiza=='ModalUbicacionEditar'){ 
$aux=$id;
   $sentencia = "SELECT * FROM ubicacion WHERE idUb=$aux"; 
   $ejecutar=mysqli_query($mysqli,$sentencia);
   $fila = mysqli_fetch_assoc($ejecutar);
                                                   
?>
 <!--Modal  Registrar Ubicacion-->
<div id="ModalUbicacionEditar" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
<form  action="editar.php" method="post" class="form-register" > 
    <div class="modal-content">
       <div class="modal-body">
<div class="panel panel-warning card-view">
<div class="panel-heading text-center">
    <div class="pull-center" >
    <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="panel-title panel-center txt-light">Modificar Ubicación</h2>
    </div>
    <div class="clearfix"></div>
</div>
<div class="panel-wrapper collapse in">
    <div class="panel-body">
     <div class="row">
<div class="col-md-6">
  <label for="nombUb" >Nombre:</label>
  <div class="input-group">
  <input type="text" class="form-control" id="nombeditUb" name="nombeditUb" placeholder="Ingrese un Nombre" value="<?php echo $fila['nombre'];?>" required>
  <div class="input-group-addon"><span  class="glyphicon glyphicon-map-marker" aria-hidden="true"></span></div>
</div>
</div>
<div class="col-md-6">
  <label for="codUb" >Código:</label>
  <div class="input-group">
  <input type="text" class="form-control" id="codUb2" name="codUb2" placeholder="Ingrese un código" value="<?php echo $fila['codU'];?>" required>
  <div class="input-group-addon"><span  class="glyphicon glyphicon-barcode" aria-hidden="true"></span></div>
</div>
</div>
</div>
   
<input  type="hidden" class="form-control" id="ideU" name="ideU" placeholder="Nombre" value="<?php echo $aux;?>"> 
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
<?php }else if($actualiza=="ModalSubCategoriaEditar"){ 
$aux=$id;
   $sentencia = "SELECT * FROM subcategoria WHERE idSub=$aux"; 
   $ejecutar=mysqli_query($mysqli,$sentencia);
   $fila = mysqli_fetch_assoc($ejecutar);
?>
<!--Modal  Registrar Sub-Categoria-->
<div id="ModalSubCategoriaEditar" class="modal fade" role="dialog">
<div class="modal-dialog modal-lg">
<form  action="editar.php" method="post" class="form-register" > 
<div class="modal-content">
<div class="color-moduloInventario">
<div class="modal-body">
<div class="panel panel-warning card-view">
<div class="panel-heading text-center">
<div class="pull-center" >
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h2 class="panel-title panel-center txt-light">Modificar Sub-Categoria</h2>
</div>
<div class="clearfix"></div>
</div>
<div class="panel-wrapper collapse in">
<div class="panel-body">
<div class="row">

<div class="col-md-12">
<label for="nombsub" >Nombre:</label>
<div class="input-group">
<input type="text" class="form-control" id="nombsub2" name="nombsub2" placeholder="Ingrese un Nombre" value="<?php echo $fila['nombre'];?>" required>
<div class="input-group-addon"><span  class="glyphicon glyphicon-bookmark" aria-hidden="true"></span></div>
</div>
</div>
<div class="col-md-6">
<label for="nomsubcatego" >Elija una categoria:</label>
<select class="SCategoriaEditar" id="nomsubcatego" name="nomsubcatego">
<option></option>
 <?php
$extraer="SELECT * FROM categoria";
$ejecutar2=mysqli_query($mysqli,$extraer);
$cont=$cont+1;
while($ejecuta=mysqli_fetch_array($ejecutar2)){
    $cont=$cont+1;
    if(strtoupper($ejecuta['idCat'])==strtoupper($fila['idcat'])){
  ?>
    <option value="<?php  echo $ejecuta['idCat'] ?>" selected><?php  echo ucwords(strtolower($ejecuta['nombre'])) ?></option>
    <?php }else{  ?>
        <option value="<?php  echo $ejecuta['idCat'] ?>"><?php  echo ucwords(strtolower($ejecuta['nombre'])) ?></option>
        <?php  }  }   ?>                   
</select>                 
</div>
<div class="col-md-6">
<label for="codsub" >Código:</label>
<div class="input-group">
<input type="text" class="form-control" id="codsub2" name="codsub2" placeholder="Ingrese un Código" value="<?php echo $fila['codigo'];?>" required>
<div class="input-group-addon"><span  class="glyphicon glyphicon-barcode" aria-hidden="true"></span></div>
</div>
</div>
<input  type="hidden" class="form-control" id="idsu" name="idsu" placeholder="Nombre" value="<?php echo $aux;?>">

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
<?php }else if($actualiza=='ModalCategoriaEditar'){ 
$aux=$id;
   $sentencia = "SELECT * FROM categoria WHERE idCat=$aux"; 
   $ejecutar=mysqli_query($mysqli,$sentencia);
   $fila = mysqli_fetch_assoc($ejecutar);
?>

<!--Modal  Registrar Categoria-->
<div id="ModalCategoriaEditar" class="modal fade" role="dialog">
<div class="modal-dialog modal-lg">
<form  action="editar.php" method="post" class="form-register" > 
<div class="modal-content">
<div class="color-moduloInventario">
<div class="modal-body">
<div class="panel panel-warning card-view">
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
    <label for="nombCat2" >Nombre:</label>
    <div class="input-group">
    <input type="text" class="form-control" id="nombCat2" name="nombCat2" placeholder="Ingrese un Nombre" value="<?php echo $fila['nombre'];?>" required>
    <div class="input-group-addon"><span  class="glyphicon glyphicon-bookmark" aria-hidden="true"></span></div>
    </div>
</div>
<div class="col-md-6">
    <label for="codCat2" >Código:</label>
    <div class="input-group">
    <input type="text" class="form-control" id="codCat2" name="codCat2" placeholder="Ingrese un Código" value="<?php echo $fila['cod'];?>" required>
    <div class="input-group-addon"><span  class="glyphicon glyphicon-barcode" aria-hidden="true"></span></div>
    </div>
</div>

<div class="col-md-6">
    <label for="valr2" >Valor residual(%):</label>
    <div class="input-group">
    <input type="text" class="form-control" id="valr2" name="valr2" placeholder="Ingrese un Valor" value="<?php echo $fila['val'];?>" required>
    <div class="input-group-addon"><span  class="glyphicon glyphicon-usd" aria-hidden="true"></span></div>
    </div>
</div>


<input  type="hidden" class="form-control" id="idCat" name="idCat" placeholder="Nombre" value="<?php echo $aux;?>">


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
<?php }else if($actualiza==='ModalProveedorEditar'){ 
     $aux=$id;
   $sentencia = "SELECT * FROM proveedor WHERE ide=$aux"; 
   $ejecutar=mysqli_query($mysqli,$sentencia);
   $fila = mysqli_fetch_assoc($ejecutar);
?>
       
 <!--Modal  Registrar Proveedor-->
<div id="ModalProveedorEditar"  class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
<form  action="editar.php" method="post" class="form-register" > 
    <div class="modal-content">
       <div class="modal-body">   
				       					<div class="panel panel-warning card-view">
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
<div class="col-md-6">
  <label for="nomb" >Nombre de proveedor:</label>
  <div class="input-group">
  <input type="text" class="form-control" id="nomb2" placeholder="Ingrese un Nombre" name="nomb2" value="<?php echo $fila['nombre'];?>" required>
  <div class="input-group-addon"><span  class="glyphicon glyphicon-user" aria-hidden="true"></span></div>
</div>
  <label for="dir">Dirección </label>
  <div class="input-group">
  <input type="text" class="form-control" id="dir2" name="dir2" value="<?php echo $fila['direccion'];?>" required placeholder="Ingrese una Dirección">
  <div class="input-group-addon"><span class="glyphicon glyphicon-home"></span></div>
  </div>
  <label for="nit">NIT  </label>
  <div class="input-group">
  <input type="text" class="form-control" id="nit2" placeholder="Ingrese un NIT" name="nit2" value="<?php echo $fila['nit'];?>" required data-mask="9999-999999-999-9">
   <div class="input-group-addon"><span class="glyphicon glyphicon-check"></span></div>
  </div>
</div>

<div class="col-md-6">
  <label for="cont" >Nombre del contacto:</label>
  <div class="input-group">
  <input type="text" class="form-control" id="cont2" placeholder="Nombre" name="cont2" value="<?php echo $fila['contacto'];?>" required>
  <div class="input-group-addon"><span  class="glyphicon glyphicon-user" aria-hidden="true"></span></div>
</div>
  <label for="tel" >Teléfono:</label>
  <div class="input-group">
  <input type="text" class="form-control" id="tel2" placeholder="Ingrese un Teléfono" name="tel2" value="<?php echo $fila['telefono'];?>" required data-mask="9999-9999">
  <div class="input-group-addon"><span  class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span></div>
</div>
  <label for="correo">Correo electrónico </label>
  <div class="input-group">
  <input type="text" class="form-control" id="correo2" name="correo2" value="<?php echo $fila['correo'];?>" required placeholder="Ingrese un Correo Electrónico">
  <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
  </div>
</div>

<div class="col-md-12">
    <label for="obs">Observaciones </label>
  <div class="input-group">
  <input type="text" class="form-control" id="obs2" placeholder="Ingrese Observaciones (Opcional)" name="obs2" value="<?php echo $fila['observacion'];?>">
   <div class="input-group-addon"><span class="glyphicon glyphicon-eye-open"></span></div>
  </div>
</div>
<input  type="hidden" class="form-control" id="ideU" name="ideU" placeholder="Nombre" value="<?php echo $aux;?>"> 


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
<?php }else if($actualiza=="ModalInstitucionEditar"){ 
  $aux=$id;
   $sentencia = "SELECT * FROM institucion WHERE idIn=$aux"; 
   $ejecutar=mysqli_query($mysqli,$sentencia);
   $fila = mysqli_fetch_assoc($ejecutar);
?>
<!--Modal  Registrar -->
<div id="ModalInstitucionEditar" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
<form  action="editar.php" method="post" class="form-register" > 
    <div class="modal-content">
       <div class="modal-body">
<div class="panel panel-warning card-view">
<div class="panel-heading text-center">
    <div class="pull-center" >
    <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="panel-title panel-center txt-light">Modificar Institución</h2>
    </div>
    <div class="clearfix"></div>
</div>
<div class="panel-wrapper collapse in">
    <div class="panel-body">
 <div class="row">
<div class="col-md-6">
  <label for="nombMov" >Nombre:</label>
  <div class="input-group">
  <input type="text" class="form-control" id="nombI" name="nombI" placeholder="Ingrese un Nombre" required value="<?php echo $fila['Nombre'];?>">
  <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
</div>
</div>
<div class="col-md-6">
      <label for="codUb" >Código:</label>
  <div class="input-group">
  <input type="text" class="form-control" id="nombCo" name="nombCo" placeholder="Ingrese un código" required value="<?php echo $fila['codigo'];?>">
  <div class="input-group-addon"><span  class="glyphicon glyphicon-barcode" aria-hidden="true"></span></div>
</div>
  </div>
  <div class="col-md-12">
                       <label for="codUb" >Dirección:</label>
<div class="input-group">
<textarea type="text" class="form-control" id="dire" name="dire" placeholder="Ingrese una Direccion" required><?php echo $fila['direccion'];?></textarea> 
<div class="input-group-addon"><span  class="glyphicon glyphicon-barcode" aria-hidden="true"></span></div>
</div>
                   </div>
</div> 
   <input  type="hidden" class="form-control" id="idIns" name="idIns" value="<?php echo $aux;?>"> 
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
<?php }else if($actualiza=="ModalReevaluar"){ 
  $aux=$id;
   $sentencia = "SELECT * FROM detalle_Activo WHERE activofijo_id=$aux"; 
   $ejecutar=mysqli_query($mysqli,$sentencia);
   $fila = mysqli_fetch_assoc($ejecutar);
?>
<!--Modal  Registrar -->
<div id="ModalReevaluar" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
<form  action="insert.php" method="post" class="form-register" > 
    <div class="modal-content">
       <div class="modal-body">
<div class="panel panel-warning card-view">
<div class="panel-heading text-center">
    <div class="pull-center" >
    <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="panel-title panel-center txt-light">Reevaluar Activo Fijo</h2>
    </div>
    <div class="clearfix"></div>
</div>
<div class="panel-wrapper collapse in">
    <div class="panel-body">
    <div class="row">
                   <div class="col-md-6">
                       <label for="precA" >Precio actual:</label>
                    <div class="input-group">
                      <input readonly="readonly" type="number" class="form-control" id="precA" name="precA" placeholder="Nombre" value="<?php echo $fila['valor_historico'];?>">
                      <div class="input-group-addon">
                        <span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                      </div>
                    </div>
                   </div>
                    <div class="col-md-6">
                    <label for="precN" >Nuevo precio:</label>
                    <div class="input-group">
                      <input type="number" class="form-control" id="precN" name="precN" placeholder="Precio" required >
                      <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                      </div>
                   </div>
                   </div>
                   
                   
                  <input  type="hidden" class="form-control" id="ideA" name="ideA" placeholder="Nombre" value="<?php echo $aux;?>">
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
<?php } ?>