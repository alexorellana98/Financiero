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
<div class="panel panel-success card-view">
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
<div class="col-md-3 ">
<img src="../Imagen/Marca2.png" class="img-rounded" alt="Cinque Terre" width="300" height="250">
</div>
<div class="col-md-7 col-md-offset-1">
<div class="col-md-6">
<div class="input-group">
  <label for="nombProd" >Nombre:</label>
  <div class="input-group">
 <input type="text" class="form-control" id="nombMar" name="nombMar" placeholder="Nombre" value="<?php echo $fila['nombre'];?>">
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
           <input  type="hidden" class="form-control" id="ideU" name="ideU" placeholder="Nombre" value="<?php echo $aux; ?>">
 </div>
 <div class="modal-footer">
       <?php include '../Componentes/BtnGuardarCancelar.php'; ?>
        </div>
      </div>
      </form>
      </div>
 </div>
<!--Fin modal Registrar Marca-->
<?php } ?>