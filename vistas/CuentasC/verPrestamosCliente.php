
<?php
require 'conexion.php';
//$con=mysqli_connect('localhost','root','','finanzas');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <title>Ver Prestamos</title>

  <?php
      include "../Componentes/estilos.php";
  ?>

  <script language="javascript">
function envia(){
   window.location="DatosCliente.php";
  }
 function sele(){
  var cond= $("#condi").val();
  if (cond==1) {
     window.location="http://localhost/Financiero/siccif/vistas/CuentasC/RegistroCliente.php";
  }else{window.location="http://localhost/Financiero/siccif/vistas/CuentasC/RegistroClienteInactivo.php";}

}
</script>
</head>
<?php
if (!empty($_GET['btnalta1']))  {
//activa el activo C:\xampp\htdocs\siccif\vistas\ActivoFijo
$est=1;
$var=$_GET['btnalta1'];
$sql = " UPDATE cliente set estado='$est' WHERE idCliente='$var'";
$resultado = $mysqli->query($sql);
}
?>
<body>
  <!--Preloader-->
  <div class="preloader-it">
    <div class="la-anim-1"></div>
  </div>
  <!--/Preloader-->
    <div class="wrapper theme-1-active box-layout pimary-color-red">
  <?php
  include "../Componentes/menu.php";
  ?>

    <!-- Main Content -->
    <div class="page-wrapper">
            <div class="container-fluid">
            <div class="panel panel-success card-view" style="margin-top:20px;">
                <div class="panel-heading text-center">
                    <div class="pull-center">
                        <h6 class="panel-title txt-light">Prestamos del Cliente</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                    <?php  $cont=0;        ?>
                             <div class="row">
                                  <?php
$aux2=$_GET['btnPre'];
   $sentencia2 = "SELECT * FROM cliente WHERE idCliente=$aux2";
   $ejecutar2=mysqli_query($mysqli,$sentencia2);
   $fila1 = mysqli_fetch_assoc($ejecutar2);
    ?>
<div class="button-group">
<form  action="verDetalleCliente.php" method="get" class="form-register" >
<button type="submit"  class="btn btn-danger" data-dismiss="modal" id="btndetalle" name="btndetalle" value="<?php echo $fila1['idCliente']; ?>" ><i class="fa fa-mail-reply"></i> Atras</button>
</form>
</div>
                             </div>
                             <div class="row">
                                 <div class="table-wrap">
                    <div class="table-responsive">
                      <table id="datable_1" class="table table-hover display  pb-30" >
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

                              <th  WIDTH="180" HEIGHT='9'>Opciones</th>
                            </tr>
                        </thead>

                        <tbody >
                         <?php
  $var=$_GET['btnPre'];
$extraer="SELECT * FROM prestamo WHERE idCli='$var'";

 //$base=mysqli_select_db($con,'finanzas');
$ejecutar=mysqli_query($mysqli,$extraer);


while($ejecuta=mysqli_fetch_array($ejecutar))
{  $cont=$cont+1;


 $aux2=$_GET['btnPre'];
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
       
     <form   action="vistaDetallePrestamo.php" method="get" class="form-register" >
     <button  type="submit" class="btn btn-primary" id="btndetalle" title="Ver Prestamo" name="btndetalle" style="background-color: transparent border:0" data-toggle="modal"  value="<?php echo $ejecuta['idPres']; ?>"> <i class="glyphicon glyphicon-eye-open"></i>   Ver</button>
     </form>
     
     <form  style=" margin-left: 100px; margin-top:-43px;" action="amortizar.php" method="get" class="form-register" >
       <button  type="submit" class="btn btn-warning" title="Ver Amortizacion de prestamo" id="btnbaja" name="btnbaja" style="background-color: transparent border:0" data-toggle="modal" value="<?php echo $var." ".$ejecuta['idPres'] ?>"> <i class="glyphicon glyphicon-usd"></i>Amortización</button>
     </form>
    </td>
  </tr>

<input  type="hidden" class="form-control" id="idCli" name="idCli" placeholder="Nombre" value="<?php echo $var." ".$ejecuta['idPres'];?>">
<?php

}
?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                             </div>

                    </div>
                </div>
            </div>
							



                    
          









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

</body>

</html>
