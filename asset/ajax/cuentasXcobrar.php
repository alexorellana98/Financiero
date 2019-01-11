<table id="datable_1" class="table table-hover display  pb-30 tablaAct">
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
    <th >Ocupacion o Giro</th>
    <th >Departamento</th>
    <th >Tipo</th>
    <th WIDTH="100" HEIGHT='9'>Opciones</th>
  </tr>
  </thead>
  <tbody  class="contenidobusqueda">
  <?php
    if ($est=='2' && $tipoCliente=='3')
        $extraer="SELECT * FROM cliente";
    else if($est=='2' && $tipoCliente!=='3')
        $extraer="select * from cliente where tipo=".$tipoCliente;
    else if($est!=='2' && $tipoCliente=='3')
        $extraer="select * from cliente where estado=".$est;
    else
        $extraer="select * from cliente where estado='$est' and tipo=".$tipoCliente;
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
    <td> <?php echo $ejecuta['ocupacion']?></td>
    <td> <?php echo $ejecuta['depa']?></td>
    <td> <?php if($tipo==0){echo 'Normal';} if($tipo==1){echo 'Moroso';} if($tipo==2){echo 'Incobrable';} ?></td>
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
<?php } ?>
</table>