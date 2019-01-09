<?php
require 'conexion.php';
//$con=mysqli_connect('localhost','root','','finanzas');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <title>Amortizar</title>

  <?php
      include "../Componentes/estilos.php";
  ?>

  <script language="javascript">
    function sele(){
      var cond= $("#condi").val();
      if (cond==1) {
         window.location="http://localhost/Financiero/siccif/vistas/CuentasC/creditos.php";
      }
    }
</script>
</head>
<?php
  //activa el activo
   $aux=$_GET['btnbaja'];
   $cadena = explode(" ", $aux);

   $aux = $cadena[0];
   $idPre = $cadena[1];
   $aux7=$cadena[0];
   $sentencia = "SELECT * FROM prestamo WHERE idCli='$aux' AND idPres = '$idPre'";
   $ejecutar=mysqli_query($mysqli,$sentencia);
   $fila = mysqli_fetch_assoc($ejecutar);

   $sentencia1 = "SELECT * FROM cliente WHERE idCliente='$aux'";
   $ejecutar1=mysqli_query($mysqli,$sentencia1);
   $fila1 = mysqli_fetch_assoc($ejecutar1);

   $sentencia2 = "SELECT * FROM creditos WHERE idCre='$fila[idCre]'";
   $ejecutar2=mysqli_query($mysqli,$sentencia2);
   $fila2 = mysqli_fetch_assoc($ejecutar2);

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
                <div class="panel panel-primary card-view" style="margin-top: 20px;">
            <div class="panel-heading text-center">
                <div class="pull-center">
                    <h3 class="panel-title txt-light"><i class="fa fa-usd"></i>   Amortización de Prestamo</h3>
                    <h3 class="panel-title txt-light">Cliente: <?php echo $fila1['nombre']." ".$fila1['apellido'] ?></h3>
                    <h3 class="panel-title txt-light">Tipo de Prestamo: <?php echo $fila2['tipo']?></h3>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                <div class="row">
                    <form  action="verPrestamosCliente.php" method="get" class="form-register" >
                          <button type="submit"  class="btn btn-danger" data-dismiss="modal" id="btnPre" name="btnPre" value="<?php echo $fila['idCli']; ?>"> <i class="fa fa-mail-reply"> </i>  Atras</button>
                        </form>
                </div>
                <?php $cont=0;   ?>
                <div class="row">
                    
                  <div class="table-wrap">
                    <div class="table-responsive">
                      <table id="datable_1" class="table table-hover display  pb-30" >
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
  # code...


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
        }
                         ?>
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
                        <button  type="button" disabled="true" title="Cuota Pagada" class="btn btn-success" id="btnEditar1" name="btnEditar1" style="background-color: transparent border:0" data-toggle="modal">Cuota Cancelada</button>
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
                           <?php
                        }
                         ?>
  </tr>

<?php
$monto=$monto-$capital;
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
