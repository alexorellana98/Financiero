<?php 
$mysqli = new mysqli('localhost', 'root', '', 'siccif');
$id=$_REQUEST['id'];
$opcion=$_REQUEST['opcion'];
if($opcion==="activoDetalle"){
?>
<div id="ModalDetalleActivo" class="modal fade" role="dialog">
<div class="modal-dialog modal-lg">
<form action="insert.php" method="post" class="form-register">
<div class="modal-content">
<div class="modal-body">
<div class="panel panel-info card-view">
<div class="panel-heading text-center">
<div class="pull-center">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h2 class="panel-title panel-center txt-light"><i class="fa fa-info"></i>  Detalle Activo Fijo</h2> </div>
<div class="clearfix"></div>
</div>
<div class="panel-wrapper collapse in">
<div class="panel-body">


<table class="table-hover display  pb-30 tablaDetalle" >
                        <thead>
                          <tr >
                            <th >Valor</th>
                            <th  >Descripcion</th>
                          </tr>
                        </thead>                    
                        <tbody>
                              <?php
                              $aux2=$id;
                             $sentencia2 = "SELECT * FROM detalle_activo WHERE activofijo_id='$aux2'"; 
                             $ejecutar2=mysqli_query($mysqli,$sentencia2);
                             $fila1 = mysqli_fetch_assoc($ejecutar2);
                             
                             ?>
                          <tr>
                             
                              <td>Serie/Marca :</td>
                              <td><?php echo $fila1['serie'];?></td>
                            </tr>
                            <tr>
                          <?php
                              $aux3=$fila1['marca_id'];
                             $sentencia3 = "SELECT * FROM marca WHERE idMarca='$aux3'"; 
                             $ejecutar3=mysqli_query($mysqli,$sentencia3);
                             $fila3 = mysqli_fetch_assoc($ejecutar3);
                             
                             ?>
                              
                              <td> Proveedor :</td>
                              <td><?php echo $fila3['nombre'];?></td>
                            </tr>
                           <tr>

                              <?php
                              $aux4=$fila1['ubi_id'];
                             $sentencia4 = "SELECT * FROM ubicacion WHERE idUb='$aux4'"; 
                             $ejecutar4=mysqli_query($mysqli,$sentencia4);
                             $fila4 = mysqli_fetch_assoc($ejecutar4);
                             
                             ?>
                              <td> Ubicacion :</td>
                              <td><?php echo $fila4['nombre'];?></td>
                            </tr>
                             <tr>
                             <td> Fecha de adquisicion :</td>
                              <td><?php echo $fila1['fecha_adqui'];?></td>
                             </tr>

                              <tr>
                             <td> Fecha de Inicio :</td>
                              <td><?php echo $fila1['fecha_inicio'];?></td>
                             </tr>

                              <tr>
                             <td> Valor historico :</td>
                              <td><?php echo $fila1['valor_historico'];?></td>
                             </tr>
                            
                              <tr>
                             <td> Donacion :</td>
                              <td><?php echo $fila1['donado'];?></td>
                             </tr>

                             <tr>
                              <td>Vida util restante :</td>
                              <td><?php echo $fila1['vidautil_restante'];?></td>
                            </tr>
                        </tbody>
                      </table>
                      
                      
                      
</div>
</div>
</div>
</div>
<div class="modal-footer">
<div class="button-group">
        <button type="button"  class="btn btn-danger btn-lable-wrap left-label" data-dismiss="modal" onclick="envia()"> <span class="btn-label"><i class="fa fa-close"></i> </span><span class="btn-text">Cerrar</span></button>
                  </div>
</div>
</div>
</form>
</div>
</div>
<?php }else if($opcion=='detallePrestamo'){ 
//Muestra datos del prestamo 
    $aux2=$id;
   $sentencia2 = "SELECT * FROM prestamo WHERE idPres='$aux2'"; 
   $ejecutar2=mysqli_query($mysqli,$sentencia2);
   $fila1 = mysqli_fetch_assoc($ejecutar2);
  //muestra detalles del cliete
    $aux3=$fila1['idCli'];
   $sentencia3 = "SELECT * FROM cliente WHERE idCliente=$aux3"; 
   $ejecutar3=mysqli_query($mysqli,$sentencia3);
   $fila3 = mysqli_fetch_assoc($ejecutar3);

   //Muestra datos de credito
    $aux4=$fila1['idCre'];
   $sentencia4 = "SELECT * FROM creditos WHERE idCre=$aux4"; 
   $ejecutar4=mysqli_query($mysqli,$sentencia4);
   $fila4 = mysqli_fetch_assoc($ejecutar4);
   ?>
       

?>
<div id="modalDetallePrestamo" class="modal fade" role="dialog">
<div class="modal-dialog modal-lg">
<form action="insert.php" method="post" class="form-register">
<div class="modal-content">
<div class="modal-body">
<div class="panel panel-info card-view">
<div class="panel-heading text-center">
<div class="pull-center">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h2 class="panel-title panel-center txt-light"><i class="fa fa-info"></i>  Detalle Prestamo Cliente</h2> </div>
<div class="clearfix"></div>
</div>
<div class="panel-wrapper collapse in">
<div class="panel-body">
    <div class="table-wrap">
         
                            <div class="alert alert-success alert-dismissable alert-style-1 text-center">
                                <i class="fa fa-male"></i><h6 id="gestion" ><?php echo $fila3['nombre']." ".$fila3["apellido"];?></h6>
                            </div>
  
                    <div class="table-responsive">
                      <table class="table-hover display  pb-30 tablaDetalle" >
                        <thead>
                          <tr >
                              <th  WIDTH="100" HEIGHT='9' >Valor</th>
                              <th  WIDTH="300" HEIGHT='9'>Descripcion</th>
                            </tr>
                        </thead>
                        <tbody >   
  <tr>
    <td>NIT :</td>
    <td><?php echo $fila3['nit'];?></td>
  </tr> 
  <tr>
        <td>Tipo de prestamo:</td>
    <td><?php echo $fila4['tipo'];?></td>
  </tr>
  <tr>
    <td>Interés:</td>
    <td><?php echo $fila4['interes']."%"?></td>
  </tr>
  <tr>
    <td> Plazo:</td>
    <td><?php echo $fila1['plazo']." Meses";?></td>
  </tr>
   <tr>
   <td>Monto($):</td>
    <td><?php echo $fila1['monto'];?></td>
   </tr>
    <tr>
   <td> Cuota($):</td>
    <td><?php echo $fila1['cuota'];?></td>
   </tr>
    <tr>
   <td> Saldo($):</td>
    <td><?php echo $fila1['saldo'];?></td>
   </tr>
    <tr>
   <td>Fecha de financiamiento:</td>
    <td><?php echo $fila1['fechafinan'];?></td>
   </tr>
   <tr>
    <td>Estado:</td>
    <td><?php echo $fila1['estado'];?></td>
  </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
</div>
</div>
</div>
</div>
<div class="modal-footer">
<div class="button-group">
        <button type="button"  class="btn btn-danger btn-lable-wrap left-label" data-dismiss="modal" onclick="envia()"> <span class="btn-label"><i class="fa fa-close"></i> </span><span class="btn-text">Cerrar</span></button>
                  </div>
</div>
</div>
</form>
</div>
</div>
<?php }else if($opcion==="detallecompra"){ ?>
  <div id="modalDetalleCompra" class="modal fade" role="dialog">
<div class="modal-dialog modal-lg">
<form action="insert.php" method="post" class="form-register">
<div class="modal-content">
<div class="modal-body">
<div class="panel panel-info card-view">
<div class="panel-heading text-center">
<div class="pull-center">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h2 class="panel-title panel-center txt-light"><i class="fa fa-info"></i>  Detalle Compra</h2> </div>
<div class="clearfix"></div>
</div>
<div class="panel-wrapper collapse in">
<div class="panel-body">
    <div class="table-wrap">

  
                    <div class="table-responsive">
                      <table class="table-hover display  pb-30 tablaDetalle" >
                        <thead>
                          <tr >
                            <th  WIDTH="100" HEIGHT='9' >Valor</th>
                            <th  WIDTH="300" HEIGHT='9'>Descripcion</th>
                          </tr>
                        </thead>
                        
                        <tbody >
                          <?php
                          $aux2=$id;
                         $sentencia2 = "SELECT * FROM detalle_activo WHERE activofijo_id='$aux2'"; 
                         $ejecutar2=mysqli_query($mysqli,$sentencia2);
                         $fila1 = mysqli_fetch_assoc($ejecutar2);
                         
                         $senten2 = "SELECT idCat FROM activo WHERE idAc='$aux2'"; 
                         $ejecu2=mysqli_query($mysqli,$senten2);
                         $fil2 = mysqli_fetch_assoc($ejecu2);
                         $senten1 = "SELECT * FROM categoria WHERE idCat='$fil2[idCat]'"; 
                         $ejecu1=mysqli_query($mysqli,$senten1);
                         $fil1 = mysqli_fetch_assoc($ejecu1);

                         $precio=$fila1['valor_historico'];
                         $res=$fil1['val'];
                         $residual=$precio*($res/100);
                         $dep=$precio-$residual;
                         ?>
                      <tr>
                         
                          <td>Serie/Marca :</td>
                          <td><?php echo $fila1['serie'];?></td>
                        </tr>
                        <tr>
                      <?php
                          $aux3=$fila1['marca_id'];
                         $sentencia3 = "SELECT * FROM marca WHERE idMarca='$aux3'"; 
                         $ejecutar3=mysqli_query($mysqli,$sentencia3);
                         $fila3 = mysqli_fetch_assoc($ejecutar3);
                         
                         ?>
                          
                          <td> Proveedor :</td>
                          <td><?php echo $fila3['nombre'];?></td>
                        </tr>
                       
                      <tr>
                         <td> Donacion :</td>
                          <td><?php echo $fila1['donado'];?></td>
                         </tr>
                          <?php
                          $aux4=$fila1['ubi_id'];
                         $sentencia4 = "SELECT * FROM ubicacion WHERE idUb='$aux4'"; 
                         $ejecutar4=mysqli_query($mysqli,$sentencia4);
                         $fila4 = mysqli_fetch_assoc($ejecutar4);
                         
                         ?>
                         <tr>
                          <td> Ubicacion :</td>
                          <td><?php echo $fila4['nombre'];?></td>
                        </tr>
                         <tr>
                         <td> Fecha de adquisicion :</td>
                          <td><?php echo $fila1['fecha_adqui'];?></td>
                         </tr>

                          <tr>
                         <td> Fecha de Inicio :</td>
                          <td><?php echo $fila1['fecha_inicio'];?></td>
                         </tr>
                           <tr>
                          <td>Vida Util Restante :</td>
                          <td><?php echo $fila1['vidautil_restante'];?></td>
                        </tr>
                        <tr>
                          <td>Vida Economica :</td>
                          <td><?php echo $fil1['vidaeco'];?></td>
                        </tr>
                          <tr>
                         <td> Valor Historico :</td>
                          <td><?php echo $fila1['valor_historico'];?></td>
                         </tr>
                        <tr>
                          <td> Valor Residual :</td>
                          <td><?php echo $residual;?></td>
                         </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
</div>
</div>
</div>
</div>
<div class="modal-footer">
<div class="button-group">
        <button type="button"  class="btn btn-danger btn-lable-wrap left-label" data-dismiss="modal" onclick="envia()"> <span class="btn-label"><i class="fa fa-close"></i> </span><span class="btn-text">Cerrar</span></button>
                  </div>
</div>
</div>
</form>
</div>
</div>
  <?php } ?>