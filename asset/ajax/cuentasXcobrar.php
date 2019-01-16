<table class="table-hover display  pb-30 tablaAct">
<?php 
      	$mysqli = new mysqli('localhost', 'root', '', 'siccif');
		$opcion=$_REQUEST['opcion'];	
        $est=$_REQUEST['estado'];
        $tipoCliente=$_REQUEST['tipoCliente'];
if($opcion==="cliente"){
?>
<thead>
    <tr >
    <th  WIDTH="50" HEIGHT='9' >N°</th>
    <th >Nombre</th>
    <th >NIT</th>
    <th>Persona</th>
    <th >Ocupacion o Giro</th>
    <th >Departamento</th>
    <th >Tipo</th>
    <th WIDTH="100" HEIGHT='9'>Opciones</th>
  </tr>
  </thead>
  <tbody  class="contenidobusqueda">
  <?php
    $persona=$_REQUEST['persona'];
    if($persona=="0")
        $sumaleConsulta=' repre=""';
    else if($persona=="1")
        $sumaleConsulta="repre!=''";
    if ($est=='2' && $tipoCliente=='4')
        $extraer="SELECT * FROM cliente where ".$sumaleConsulta;
    else if($est=='2' && $tipoCliente!=='4')
        $extraer="select * from cliente where tipo=".$tipoCliente." and ".$sumaleConsulta;
    else if($est!=='2' && $tipoCliente=='4')
        $extraer="select * from cliente where estado=".$est." and ".$sumaleConsulta;
    else
        $extraer="select * from cliente where estado='$est' and tipo=".$tipoCliente." and ".$sumaleConsulta;
    
$ejecutar=mysqli_query($mysqli,$extraer);
while($ejecuta=mysqli_fetch_array($ejecutar))
{
  $tipo=$ejecuta['tipo'];
  $cont=$cont+1;
    ?>  
  <tr>
    <td><?php  echo $cont ?> </td> 
    <td><?php  echo $ejecuta['nombre']." ".$ejecuta['apellido'] ?> </td>
    <td> <?php echo $ejecuta['nit']?></td>
    <td> <?php if($ejecuta['repre']===""){echo 'Natural';}else{echo 'Juridica';} ?></td>
    <td> <?php echo $ejecuta['ocupacion']?></td>
    <td> <?php echo $ejecuta['depa']?></td>
    <td> <?php if($tipo==1){echo 'Normal';} if($tipo==2){echo 'Moroso';} if($tipo==3){echo 'Incobrable';} ?></td>
    <td>
    <?php if($ejecuta['estado']=='1'){ ?>
        <button class="btn btn-success btn-icon left-icon" data-toggle="modal" data-target="#editarProducto" onclick="lanzaModal(<?php echo $ejecuta['idCliente']; ?>);" id="btnInfoProducto"> <i class="fa fa-info-circle"></i></button>
    <?php }else{ ?>
        <button class="btn btn-warning btn-icon left-icon" data-toggle="modal" data-target="#editarProducto" onclick="lanzaModal(<?php echo $ejecuta['idCliente']; ?>);" id="btnInfoProducto"> <i class="fa fa-info-circle"></i></button>
    <?php } ?>
    </td>
  </tr>

<?php
}
?> 
  </tbody>
<?php }else if($opcion=='DetalleCliente'){?>
<thead>
<tr >
<th  WIDTH="100" HEIGHT='9' >Valor</th>
<th  WIDTH="300" HEIGHT='9'>Descripcion</th>
</tr>
</thead>
<tbody >
<?php
$aux2=$_GET['id'];
$sentencia2 = "SELECT * FROM cliente WHERE idCliente='$aux2'"; 
$ejecutar2=mysqli_query($mysqli,$sentencia2);
$fila1 = mysqli_fetch_assoc($ejecutar2);

?>
<tr>

<td>Nombre:</td>
<td><?php echo $fila1['nombre'];?></td>
</tr>

<?php if($fila1['repre']==""){?>
<?php ?>
<tr>
<td> Apellidos :</td>
<td><?php echo $fila1['apellido'];?></td>
</tr>   
<tr>
<td>NIT :</td>
<td><?php echo $fila1['nit'];?></td>
</tr>
<tr>
<td> DUI :</td>
<td><?php echo $fila1['dui'];?></td>
</tr>
<tr>
<td> Ocupación:</td>
<td><?php echo $fila1['ocupacion'];?></td>
</tr>
<?php }else{?>
<?php ?>
<tr>
<td> Giro:</td>
<td><?php echo $fila1['ocupacion'];?></td>
</tr>
<tr>
<td>NIT :</td>
<td><?php echo $fila1['nit'];?></td>
</tr>
<tr>
<td> Representante Legal :</td>
<td><?php echo $fila1['repre'];?></td>
</tr>
<tr>
<td> DUI de Representante :</td>
<td><?php echo $fila1['dui'];?></td>
</tr>
<?php }?>

<tr>
<td>Departamento :</td>
<td><?php echo $fila1['depa'];?></td>
</tr>

<tr>
<td> Dirección :</td>
<td><?php echo $fila1['direc'];?></td>
</tr>

<tr>
<td> Teléfono:</td>
<td><?php echo $fila1['tel'];?></td>
</tr>


<tr>
<td>Fecha de registro :</td>
<td><?php echo $fila1['fecha'];?></td>
</tr>
</tbody>


<?php }else if($opcion=='Prestamos'){ ?>
<thead>
                          <tr >
                              <th  WIDTH="50" HEIGHT='9' >N°</th>
                              <th >Nombre</th>
                              <th >DUI</th>
                              <th >Estado de prestamo</th>
                              <th >Plazo</th>
                              <th >Monto</th>
                              <th >Cuota</th>
                              <th >Fecha de financiamiento</th>

                              <th  WIDTH="250" HEIGHT='9'>Opciones</th>
                            </tr>
                        </thead>
                        <tbody >
                         <?php
  $var=$_GET['id'];
$extraer="SELECT * FROM prestamo WHERE idCli='$var'";
 //$base=mysqli_select_db($con,'finanzas');
$ejecutar=mysqli_query($mysqli,$extraer);
while($ejecuta=mysqli_fetch_array($ejecutar))
{  $cont=$cont+1;


 $aux2=$_GET['id'];
   $sentencia2 = "SELECT * FROM cliente WHERE idCliente=$aux2";
   $ejecutar2=mysqli_query($mysqli,$sentencia2);
   $fila1 = mysqli_fetch_assoc($ejecutar2);
    ?>
  <tr>
    <td><?php  echo $cont ?> </td>
    <td><?php  echo $fila1['nombre'] ?> </td>
    <td><?php echo $fila1['dui']?></td>
    <td> <?php echo $ejecuta['estado']?></td>
    <td> <?php echo $ejecuta['plazo']?></td>
    <td> <?php echo $ejecuta['monto']?></td>
    <td> <?php echo $ejecuta['cuota']?></td>
    <td> <?php echo $ejecuta['fechafinan']?></td>

    <td>
    <div class="row text-center">
    <div class="col-md-4">
     <button  type="submit" class="btn btn-primary" id="btndetalle" title="Ver Prestamo" name="btndetalle" style="background-color: transparent border:0" data-toggle="modal"   onclick="cargarModal('<?php echo $ejecuta['idPres']; ?>','detallePrestamo');"> <i class="glyphicon glyphicon-eye-open"></i>   Ver</button>
</div>
      <div class="col-md-6">
       <button  type="submit" class="btn btn-warning" title="Ver Amortizacion de prestamo" id="btnbaja" name="btnbaja" style="background-color: transparent border:0" data-toggle="modal" onclick="enviar('<?php echo $var; ?>','<?php echo $ejecuta['idPres']; ?>')"> <i class="glyphicon glyphicon-usd"></i>Amortización</button>
       </div>
    </div>
    </td>
  </tr>

<input  type="hidden" class="form-control" id="idCli" name="idCli" placeholder="Nombre" value="<?php echo $var." ".$ejecuta['idPres'];?>">
<?php

}
?>
</tbody>
<?php }else if($opcion==="amortizar"){ 
$aux=$_REQUEST['prestamo'];
$aux7=$_REQUEST['cliente'];
$sentencia = "SELECT * FROM prestamo WHERE idPres='$aux'"; 
$ejecutar=mysqli_query($mysqli,$sentencia);
$fila = mysqli_fetch_assoc($ejecutar);
    
$sentencia1 = "SELECT * FROM cliente WHERE idCliente='$aux7'";
$ejecutar1=mysqli_query($mysqli,$sentencia1);
$fila1 = mysqli_fetch_assoc($ejecutar1);
$sentencia2 = "SELECT * FROM creditos WHERE idCre='$fila[idCre]'";
$ejecutar2=mysqli_query($mysqli,$sentencia2);
$fila2 = mysqli_fetch_assoc($ejecutar2);
    
    ?>
<thead>
<tr >
<th  WIDTH="50" HEIGHT='9' >Pago</th>
<th >Fecha de Pago</th>
<th >Saldo Inicial</th>
<th >Pago programado</th>
<th >Capital</th>
<th >Interes</th>
<th >Saldo Final</th>
<th >Interes Acumulado</th>
<th >Estado</th>
<th  WIDTH="150" HEIGHT='9'>Opciones</th>
</tr>
</thead>
<tbody >
<?php
$interes=$fila2['interes']/100/12;
$plazo=$fila['plazo'];
$monto=$fila['monto'];
$fecha=$fila['fechafinan'];
$cuota=$fila['cuota'];
$interesAcum=0;
for ($i=1; $i <= $fila['plazo']; $i++) {
?>
<tr>
<td><?= $i ?></td>
<?php
$fecha = strtotime ( '+1 month' , strtotime ( $fecha ) ) ;
$aux=date("d/m/Y",$fecha);
?>
<td><?= $aux ?></td>
<?php $fecha=date("Y/m/d",$fecha); ?>
<td> $ <?= round($monto,2) ?></td>
<td>  $ <?= $cuota ?></td>
<?php
$interes1=$monto*$interes;
$capital=$cuota-$interes1;
$saldoFinal=$monto-$capital;
$interesAcum=$interesAcum + $interes1;
if ($i==$fila['plazo']){
$saldoFinal=0;
}               ?>
<td>$ <?= round($capital,2) ?></td>
<td>$ <?= round($interes1,2) ?></td>
<td>$ <?= round($saldoFinal,2) ?></td>
<td>$ <?= round($interesAcum, 2)?></td>
<?php
$ban=false;
$sentencia3 = "SELECT * FROM pagos WHERE idPres='$fila[idPres]'";
$ejecutar3=mysqli_query($mysqli,$sentencia3);
while ($cons=mysqli_fetch_array($ejecutar3)) {
if ($cons['numero'] == $i) {
$ban=true;
}
}
if ($ban || $fila['estado']=="Cancelado") {
?>
<?php ?>
<td>Cancelada</td>
<td>
<button  type="button" disabled="true" title="Cuota Pagada" class="btn btn-warning" id="btnEditar1" name="btnEditar1" style="background-color: transparent border:0" data-toggle="modal"><i class="fa fa-usd"></i>  Cuota Cancelada</button>
</td>
<?php
$ban=false;
}else{
?>
<?php ?>
<td>Pendiente</td>
<td>
<form style=""  action="pagarcu.php" method="get" class="form-register">
<input type="hidden" class="form-control" name="num" id="num" value="<?php echo $i; ?>">
<input type="hidden" class="form-control" name="mon1" id="mon1" value="<?php echo round($monto,2); ?>">
<button  type="submit" title="Pagar Cuota" class="btn btn-success" id="btnEditar1" name="btnEditar1" style="background-color: transparent border:0" data-toggle="modal"  value="<?php echo $fila['idPres'] ?>" > <i class="fa fa-usd"></i>  Pagar Cuota</button>
</form>
</td>
<?php
}
?>
</tr>
<?php
$monto=$monto-$capital;
}
?>
</tbody>
<?php }else if($opcion==="creditos"){ ?>
 <thead>
  <tr >
    <th  WIDTH="50" HEIGHT='9' >N°</th>
    <th >Tipo</th>
    <th >Mínimo a Prestar</th>
    <th >Máximo a Prestar</th>
    <th >Interes Anual</th>
    <th >Plazo Máximo</th>
    <th  WIDTH="150" HEIGHT='9'>Opciones</th>
  </tr>
</thead>       
<tbody >
  <?php
    $extraer="SELECT * FROM creditos";
     //$base=mysqli_select_db($con,'finanzas');
    $ejecutar=mysqli_query($mysqli,$extraer);
    while($ejecuta=mysqli_fetch_array($ejecutar))
    {
      $cont=$cont+1;
        ?>  
      <tr>
        <td><?php  echo $cont ?> </td>
        <td><?php echo $ejecuta['tipo']?></td>
        <td> <?php echo $ejecuta['cmin']?></td>
        <td> <?php echo $ejecuta['cmax']?></td>
        <td> <?php echo $ejecuta['interes']?>%</td>
        <td> <?php echo $ejecuta['plazom']?> meses</td>
        <td class="text-center">
          <button   type="submit" class="btn btn-danger" id="btnEditar" name="btnEditar"  data-toggle="modal"  onclick="editarC('<?php echo $ejecuta['idCre']?>','ModalCreditoEditar');"><i class="fa fa-edit"></i></button>
        </td>
      </tr>
    <?php
    }
    ?> 
</tbody>
<?php } ?>
</table>