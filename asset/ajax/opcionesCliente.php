<?php   
        $mysqli = new mysqli('localhost', 'root', '', 'siccif');
        $id=$_REQUEST['id'];
        $tipoCliente=$_REQUEST['tipoCliente'];
?>
   <div class="table-responsive text-center">
                      <table id="datable_1" class="table table-hover display  pb-30" >
                        <thead>
                          <tr >
                            <th  WIDTH="100" HEIGHT='9' ></th>
                            <th  WIDTH="300" HEIGHT='9'></th>
                          </tr>
                        </thead>
                        
                        <tbody >
                          

    <?php
   $sentencia2 = "SELECT * FROM cliente WHERE idCliente='$id'"; 
   $ejecutar2=mysqli_query($mysqli,$sentencia2);
   $fila1 = mysqli_fetch_assoc($ejecutar2);
   ?>
    
<?php if($fila1['repre']==""){?>
  <?php ?>
  <tr>
    <td style="font-weight: bold;"> Nombre :</td>
    <td><?php echo $fila1['nombre'].' '.$fila1['apellido'];?></td>
    </tr>  
    <?php }else{?>
      <?php ?>
      <tr>
    <td style="font-weight: bold;">Nombre:</td>
    <td><?php echo $fila1['nombre'];?></td>
  </tr>
      <tr>
      <td style="font-weight: bold;"> Representante Legal :</td>
    <td><?php echo $fila1['repre'];?></td>
    </tr>
  <tr>
   <td style="font-weight: bold;"> DUI de Representante :</td>
    <td><?php echo $fila1['dui'];?></td>
   </tr>
    <?php }?>

    <tr>
   <td style="font-weight: bold;"> Dirección :</td>
    <td><?php echo $fila1['direc'];?></td>
   </tr>

    <tr>
   <td style="font-weight: bold;"> Teléfono:</td>
    <td><?php echo $fila1['tel'];?></td>
   </tr>
                        </tbody>
                      </table>
                    </div>
    <div class="co-sm-12 text-center">
       <div class="col-sm-3">
            <form action="verDetalleCliente.php" method="get" class="form-register">
                <button type="submit" title="Ver Cliente" class="btn btn-success " id="btndetalle" name="btndetalle" value="<?php echo $id; ?>" style="width: 110%;"><i class="glyphicon glyphicon-eye-open"></i>  Detalles</button>
            </form>
       </div>
       <div class="col-sm-3">
           <form action="editarCliente.php" method="post" class="form-register">
            <button type="submit" title="Modificar Cliente" class="btn btn-primary" id="btnEditar" name="btnEditar"  value="<?php echo $id; ?>" style="width: 110%;"><i class="glyphicon glyphicon-edit"></i>  Editar</button>
            </form>
       </div>
       <div class="col-sm-3">
            <form  action="prestamo.php" method="get" class="form-register">
            <button type="submit" title="Realizar Prestamo" class="btn btn-warning" id="btnEditar1" name="btnEditar1" value="<?php echo $id; ?>" style="width: 110%;"><i class="glyphicon glyphicon-usd"></i> Prestamo</button>
            </form>
       </div>
       <div class="col-sm-3">
           <?php if($fila1['estado']=='1') { ?>
            <button type="submit" title="Dar de baja Cliente" class="btn btn-danger" id="btnbaja" name="btnbaja" onClick="darBaja('<?php echo $id; ?>','Desea dar de baja al Cliente','cliente','0','<?php echo $tipoCliente; ?>')" style="width: 110%;"><i class="g glyphicon glyphicon-download"></i>  Dar Baja</button>
            <?php }else if($fila1['estado']=='0'){ ?>
            <button type="submit" title="Dar de alta Cliente" class="btn btn-info" id="btnalta" name="btnalta" onClick="darBaja('<?php echo $id; ?>','Desea dar de alta al Cliente','cliente','1','<?php echo $tipoCliente; ?>')" style="width: 110%;"><i class="g glyphicon glyphicon-upload"></i>  Dar Alta</button>
            <?php } ?>
       </div>
         
    </div>
    
   <br>
   <br>
   <br>