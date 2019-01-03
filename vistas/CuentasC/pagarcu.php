<?php
require 'conexion.php';
//$con=mysqli_connect('localhost','root','','finanzas');
ini_set('date.timezone', 'America/El_Salvador');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <title>Pagar Cuota</title>
  <meta name="description" content="Doodle is a Dashboard & Admin Site Responsive Template by hencework." />
  <meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Doodle Admin, Doodleadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
  <meta name="author" content="hencework"/>
  
  <?php
      include "../Componentes/estilos.php";
  ?>

  <script language="javascript">
function envia(){
   window.location="http://localhost/Financiero/siccif/vistas/ActivoFijo/RegistroProveedor.php";
  }
</script>
</head>
<?php 

   $aux= $_GET['btnEditar1'];
   $numCu= $_GET['num'];
   $monto= $_GET['mon1'];
   $sentencia = "SELECT * FROM prestamo WHERE idPres=$aux"; 
   $ejecutar= mysqli_query($mysqli,$sentencia);
   $fila = mysqli_fetch_assoc($ejecutar);

   $aux2=$fila['idCli'];
   $sentencia1 = "SELECT * FROM cliente WHERE idCliente=$aux2"; 
   $ejecutar1= mysqli_query($mysqli,$sentencia1);
   $fila1 = mysqli_fetch_assoc($ejecutar1);

   $aux3=$fila['idCre'];
   $sentencia2 = "SELECT * FROM creditos WHERE idCre=$aux3";  
   $ejecutar2= mysqli_query($mysqli,$sentencia2);
   $fila2 = mysqli_fetch_assoc($ejecutar2);

   $interes=$fila2['interes']/100/12;
   $intXdia=$interes/30;

   $finicial=$fila['fechafinan'];

   $fideal = strtotime ( '+'.$numCu.' month' , strtotime ( $finicial ) ) ;

            $dias = (time()-$fideal)/86400;
            $dias = abs($dias);
            $dias = floor($dias);

        if ($fideal >= time() || $dias==0) {
            $tipo = "Normal";
            $retraso = 0;
            $mora = 0.00;
            $total = $fila['cuota'];

            $interes1 = $monto*$interes;
            $capital = $fila['cuota']-$interes1;
            $saldo = round(($monto-$capital),2);
        }else{
            $tipo = "Moratorio";
            $retraso = $dias;

            $interes1=$monto*$interes;
            $capital=$fila['cuota']-$interes1;
            $saldo=$monto-$capital;
            $saldo = round($saldo,2);

            $mora = round(($capital * $intXdia * $dias),2);
            $total = round(($prestamo->cuota + $mora),2);
        } 
    ?>  

    <script type="text/javascript">
var numero=<?php echo json_encode($numCu); ?>;
var tipo=<?php echo json_encode($tipo); ?> ;
var mora=<?php echo json_encode($mora); ?>;
var total=<?php echo json_encode($total); ?>;
var retraso=<?php echo json_encode($retraso); ?>;
var saldo=<?php echo json_encode($saldo); ?>;
var fe=<?php echo json_encode($fideal); ?>;

    window.onload=function(){
        document.getElementById('numero').value=numero;
        document.getElementById('tipo').value=tipo;
        document.getElementById('mora').value=mora;
        document.getElementById('total').value=total;
        document.getElementById('atraso').value=retraso;
        document.getElementById('saldo').value=saldo;
        document.getElementById('fe').value=document.getElementById('fechap').value;
    }
</script> 
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
        <!-- Title -->
          <div class="row heading-bg">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <h3 align="center" >Pagar Cuotas</h3>
            </div>
          </div>
          <!-- /Title -->
      
                
                    <?php

                    $cont=0;
                    ?>
                    <!-- Row -->
        <div class="row">
          <div class="col-sm-12">
            <div class="panel panel-default card-view">
              
               <form  action="../CuentasC/guardaPago.php" method="get" class="form-register" > 
       <div class="input-group">
   
 <div class="col-lg-12 col-md-offset-2">
 
<div class="col-md-6">
<div class="input-group">

  <label for="nomb" >Cliente:</label>
  <div class="input-group">
  <input type="text" readonly="true" class="form-control" id="nomb" placeholder="Nombre" name="nomb" value="<?php echo $fila1['nombre'];?>">
  <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
</div>
</div>


<br> 
<div class="input-group">

  <label for="tipo">Tipo de pago: </label>
  <div class="input-group">
  <input type="text" readonly="true" class="form-control" id="tipo" placeholder="Ej:00000000-0" name="tipo">
   <div class="input-group-addon"><span class="glyphicon glyphicon-check"></span></div>
  </div>
</div>
<br>

<div class="input-group">

  <label for="cuota" >Cuota:</label>
  <div class="input-group">
  <input type="text" readonly="true" class="form-control" id="cuota" placeholder="Ej:0000-0000" name="cuota" value="<?php echo $fila['cuota'];?>">
  <div class="input-group-addon"><span  class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span></div>
</div>
</div>
<br>
 <div class="input-group">

  <label for="numero" >Numero de Cuota:</label>
  <div class="input-group">
  <input type="text" readonly="true" class="form-control" id="numero" placeholder="Ej:0000-0000" name="numero" >
  <div class="input-group-addon"><span  class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span></div>
</div>
</div>
<br>
<br>
<div class="form-group" style="width:220px;">
  <label for="mora">Mora: </label>
  <div class="input-group">
  <input type="text" readonly="true" class="form-control" id="mora" name="mora" placeholder="Ej:00000000-0" name="mora">
   <div class="input-group-addon"><span class="glyphicon glyphicon-check"></span></div>
  </div>
</div>
<div class="form-group" style="width:220px;">

  <label for="anterior" >Saldo Anterior:</label>
  <div class="input-group">
  <input type="number" required="true" class="form-control" id="anterior" placeholder="Ej:0" name="anterior" value="<?php echo $monto;?>">
  <div class="input-group-addon"><span  class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span></div>
</div>
</div>

</div>

<div class="col-md-6">


<div class="form-group" style="width:220px;">
  <label for="dui">DUI:</label>
  <div class="input-group">
  <input type="text" readonly="true" class="form-control" id="dui" placeholder="Ej:00000000-0" name="dui" value="<?php echo $fila1['dui'];?>">
   <div class="input-group-addon"><span class="glyphicon glyphicon-check"></span></div>
  </div>
</div>

<div class="input-group">

  <label for="monto">Monto($):</label>
  <div class="input-group">
  <input type="text" class="form-control" id="monto" readonly="true" placeholder="Ej:0000-000000-000-0" name="monto" value="<?php echo $fila['monto'];?>">
   <div class="input-group-addon"><span class="glyphicon glyphicon-check"></span></div>
  </div>
</div>


<br>

<div class="input-group" style="width:220px;">

  <label for="fechap" >Fecha de Pago:</label>
  <div class="input-group">
  <input type="date" class="form-control" id="fechap" name="fechap" readonly="true" value="<?php echo date("Y-m-d");?>"  disabled>
  <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
</div>
</div>
<br>
<div class="input-group" style="width:220px;">

  <label for="atraso" >Dias de Retraso:</label>
  <div class="input-group">
  <input type="number" class="form-control" id="atraso" readonly="true"  placeholder="1000" name="atraso">
  <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
</div>
</div>
<br>
<div class="input-group">
  <label for="total">Total a Pagar:</label>
  <div class="input-group">
  <input type="text" class="form-control" id="total" readonly="true" name="total">
  <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
  </div>
</div>
<br>
<div class="input-group" style="width:220px;">

  <label for="saldo" >Saldo Nuevo:</label>
  <div class="input-group">
  <input type="text" class="form-control" id="saldo" required="true" readonly="true" placeholder="0.00" name="saldo">
  <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
</div>
</div>


</div>
 <input  type="hidden" class="form-control" id="fe" name="fe" >  
<input  type="hidden" class="form-control" id="pres" name="pres" value="<?php echo $_GET['btnEditar1'];?>">  
  <div class="col-lg-12 col-md-offset-5">
<br>
<br> 
<div class="button-group">
<button type="submit" class="btn btn-success">Guardar</button>
</div>
</div>

</div>
</form>
<div class="button-group">
<form  action="amortizar.php" method="get" class="form-register" > 
<button type="submit"  class="btn btn-success" data-dismiss="modal" id="btnbaja" name="btnbaja" value=<?php echo $fila['idCli'] ?>>Atras</button>
</form>
</div>
            </div>  
          </div>
        </div>
        <!-- /Row -->
                    
                  

 
        
        <div class="col-md-1"></div>


        
      </div>
    <!-- /#wrapper -->
        <!-- Footer -->
        <footer class="footer container-fluid pl-30 pr-30">
          <div class="row">
            <div class="col-sm-12">
              <p>2017 &copy; Doodle. Pampered by Hencework</p>
            </div>
          </div>
        </footer>
        <!-- /Footer -->
      </div>
    </div>
        <!-- /Main Content -->

    </div>
    <!-- /#wrapper -->
  
  
  <?php
include "../Componentes/scripts.php";
?>
 
<script type="text/javascript">
    var interes = <?php echo json_encode($interes); ?>;
    var maxpres = <?php echo json_encode($maxpres); ?>;
    var plamax = <?php echo json_encode($plamax); ?>;

    function cambiar(id){
       document.getElementById('posi').value=id;
        document.getElementById('monto').max=maxpres[id];
        document.getElementById('plazo').max=plamax[id];
    }
    function cuota1(){
        var pos=document.getElementById('posi').value;
        var monto=document.getElementById('monto').value;
        var plaz=document.getElementById('plazo').value;
        if(monto=="" || plaz==""){
            alert("Por favor llene los campos!!!");
        }else{
            var inter=(interes[pos]/12)/100;
            var cuota=monto/((1-Math.pow((1+inter),- plaz))/inter);
            cuota = cuota.toFixed(2);
            document.getElementById('cuota').value=cuota;
            document.getElementById('saldo').value=(cuota*plaz).toFixed(2);
        }
    }
</script>
  
</body>

</html>


    
        
