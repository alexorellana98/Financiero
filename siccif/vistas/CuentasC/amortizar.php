<?php
require 'conexion.php';
//$con=mysqli_connect('localhost','root','','finanzas');

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Amortizar</title>

   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="estilos.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>

 

<!-- Optional theme -->

<link rel="stylesheet" type="text/css" href="estilos.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>

<!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" type="text/css" href="../dist/css/datatables.bootstrap.min.css"/>
  <!-- daterange picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!--Alertas -->
  <script src="../dist/js/sweetalert-dev.js"></script>
  <link rel="stylesheet" type="text/css" href="../dist/css/sweetalert.css"/>


  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

<script language="javascript">
  

  function sele(){
  var cond= $("#condi").val();
  if (cond==1) {
     window.location="http://localhost/Financiero/siccif/vistas/CuentasC/creditos.blade.php";
  }

}
    $(document).ready(function () {
   $('#entradafilter').keyup(function () {
      var rex = new RegExp($(this).val(), 'i');
        $('.contenidobusqueda tr').hide();
        $('.contenidobusqueda tr').filter(function () {
            return rex.test($(this).text());
        }).show();

        })

});
</script>
 <header class="main-header">
    <?php include("../ActivoFijo/header.php"); ?> 
  </header>

  <?php include("../ActivoFijo/menu.php"); ?> 

</head>

<?php

//activa el activo 
   $aux=$_GET['btnbaja'];
   $aux7=$_GET['btnbaja'];
   $sentencia = "SELECT * FROM prestamo WHERE idCli='$aux'"; 
   $ejecutar=mysqli_query($mysqli,$sentencia);
   $fila = mysqli_fetch_assoc($ejecutar); 

   $sentencia1 = "SELECT * FROM cliente WHERE idCliente='$aux'"; 
   $ejecutar1=mysqli_query($mysqli,$sentencia1);
   $fila1 = mysqli_fetch_assoc($ejecutar1);

   $sentencia2 = "SELECT * FROM creditos WHERE idCre='$fila[idCre]'"; 
   $ejecutar2=mysqli_query($mysqli,$sentencia2);
   $fila2 = mysqli_fetch_assoc($ejecutar2);

?>

<body class="hold-transition skin-green-light sidebar-mini">
  <div class="">
 
    <div class="container">
    <div class="col-md-12">
    <div class="row">
    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12 page-header">
    <h3 align="center" style="color:#000" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Amortización de Prestamo</h3>
    <h3 align="center" >&nbsp;&nbsp;Cliente: <?php echo $fila1['nombre']." ".$fila1['apellido'] ?></h3>
    <h3 align="center" > &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tipo de Prestamo: <?php echo $fila2['tipo']?></h3>
    </div>
    </div>
    </div>
    </div>
    </div>  

  <div class="row">

 <div class="col-md-2"></div>



  <div class="col-md-10 col-md-offset-2">
  
<div class="col-md-3">
<br>
 <div class="form-group">


  </div>
  </div>
 
                                 
 <div class="col-sm-12 col-md-12">

  <div class="panel-body">

  <form action="#" method="get" class="form-horizontal">
          

         <div class="col-md-3 col-md-offset-8" style="margin-top:15px;"> <!--col-md-offset desplaza columnas a la derecha -->
                <div class="form-group">
                    <!-- USE TWITTER TYPEAHEAD JSON WITH API TO SEARCH -->
                    <div class="input-group">
                    <input id="entradafilter" type="text" class="form-control"> 
                    <span class="input-group-btn">
                    <button type="submit" class="btn btn-success" style="margin-right:-20px;"><i class="glyphicon glyphicon-search"></i></button>
                    </span>
                  </div>
                    </div>
                     </div>
    </form>

<?php

$cont=0;
?>
<div class="row thumbnail">


<table class="table table-list-search table-bordered table-hover">
<thead>

                         <tr style="background: #00a65a">

    <th scope="col" style="color:#FFFFFF" WIDTH="50" HEIGHT='9' >Pago</th>
    <th scope="col" style="color:#FFFFFF">Fecha de Pago</th>
    <th scope="col" style="color:#FFFFFF">Saldo Inicial</th>
    <th scope="col" style="color:#FFFFFF">Pago programado</th>
    <th scope="col" style="color:#FFFFFF">Capital</th>
    <th scope="col" style="color:#FFFFFF">Interes</th>
    <th scope="col" style="color:#FFFFFF">Saldo Final</th>
    <th scope="col" style="color:#FFFFFF">Interes Acumulado</th>
    <th scope="col" style="color:#FFFFFF">Estado</th>
    <th scope="col" style="color:#FFFFFF" WIDTH="150" HEIGHT='9'>Opciones</th>
  </tr>
  </thead>
  <tbody class="contenidobusqueda">
 


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

                        <td >
                        <button  type="button" disabled="true" title="Cuota Pagada" class="btn btn-success" id="btnEditar1" name="btnEditar1" style="background-color: transparent border:0" data-toggle="modal">Cuota Cancelada</button>
                        </td>
                        <?php 
                            $ban=false; 
                            }else{

                        ?>
                        <?php ?>
                        <td>Pendiente</td>
                        <td>
                        <form style=""  action="pagarcu.blade.php" method="get" class="form-register">
                        <input type="hidden" class="form-control" name="num" id="num" value=<?php echo $i ?>>
                        <input type="hidden" class="form-control" name="mon1" id="mon1" value=<?php echo round($monto,2) ?>>
    					 <button  type="submit" title="Pagar Cuota" class="btn btn-danger" id="btnEditar1" name="btnEditar1" style="background-color: transparent border:0" data-toggle="modal"  value=<?php echo $fila['idPres'] ?>>Pagar Cuota</button>
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
<form  action="verPrestamosCliente.blade.php" method="get" class="form-register" > 
<button type="submit"  class="btn btn-success" data-dismiss="modal" id="btnPre" name="btnPre" value=<?php echo $fila['idCli'] ?>>Atras</button>
</form>
 
<!--Modal  Registrar Proveedor-->
 </div>

<!--Fin modal Registrar Proveedor-->
</div>
<div class="col-md-1"></div>


 </div>


   <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  <script src="http://code.jquery.com/jquery-latest.js">
   
  </script>
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../dist/js/jquery.datatables.min.js"></script>
<script src="../dist/js/datatables.bootstrap.min.js"></script>
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="../bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="../bower_components/moment/min/moment.min.js"></script>
<script src="../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="../plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="../plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>

<script src="../plugins/jquery.validate.js"></script>

<script src="../dist/js/pages/privilegios.js"></script>
</div>

</body>
</html>