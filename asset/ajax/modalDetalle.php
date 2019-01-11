<?php 
$mysqli = new mysqli('localhost', 'root', '', 'siccif');
$id=$_REQUEST['id'];	
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
<h2 class="panel-title panel-center txt-light">Detalle Activo Fijo</h2> </div>
<div class="clearfix"></div>
</div>
<div class="panel-wrapper collapse in">
<div class="panel-body">
    <div class="table-wrap">
                    <div class="table-responsive">
                      <table id="datable_1" class="table table-hover display  pb-30 tablaDetalle" >
                        <thead>
                          <tr >
                            <th  WIDTH="100" HEIGHT='5' >Valor</th>
                            <th  WIDTH="300" HEIGHT='5'>Descripcion</th>
                          </tr>
                        </thead>
                        
                        <tbody >
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