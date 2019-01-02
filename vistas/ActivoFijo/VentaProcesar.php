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
  <title>Categorias</title>
  <meta name="description" content="Doodle is a Dashboard & Admin Site Responsive Template by hencework." />
  <meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Doodle Admin, Doodleadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
  <meta name="author" content="hencework"/>
  
  <?php
      include "../Componentes/estilos.php";
  ?>

  <script language="javascript">
 
 
function envia(){
   window.location="http://localhost/Financiero/siccif/vistas/ActivoFijo/Vender.php";
  }
</script></head>
<?php
if (!empty($_GET['btnalta1']))  {
//activa el activo 
$est=1;
$var=$_GET['btnalta1'];
$sql = " UPDATE categoria set estado='$est' WHERE idCat='$var'";
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
        <!-- Title -->
          <div class="row heading-bg">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <h3 align="center" >Vender</h3>
            </div>
          </div>
          <!-- /Title -->
      
                    <?php 
                      $aux=$_POST['btnenvia'];
                      $sentencia = "SELECT * FROM activo WHERE idAc=$aux"; 
                      $ejecutar=mysqli_query($mysqli,$sentencia);
                      $fila = mysqli_fetch_assoc($ejecutar);
                    ?>  
                    <!-- Row -->
        <div class="row">
          <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <form  action="insert.php" method="post" class="form-register" > 

<input type="hidden" class="form-control" id="idAc" placeholder="Nombre" name="idAc"  value="<?php echo $_POST['btnenvia'];?>">                            

 
       <div class="input-group">
   
 <div class="col-lg-12 ">
 

<div class="col-md-4">
<br>
<br>
<br>
<br>
<br>
<div class="input-group">



<div class="form-group">

  <label for="condiM">Razon de venta:</label>
 <select class="form-control" data-live-search="true" id="condiM" name="condiM" onchange="razon(this.value)">

<?php
$extraer="SELECT * FROM movimiento";

 //$base=mysqli_select_db($con,'finanzas');
$ejecutar=mysqli_query($mysqli,$extraer);


while($ejecuta=mysqli_fetch_array($ejecutar))
{ if (($ejecuta['estado'])==1) {
  ?>

<option value="<?php echo $ejecuta['idMov']?>" ><?php echo $ejecuta['nombre']?></option>
<?php
}
}
?>
</select>
</div>

 </div>
<br>
<?php
    $aux3=$_POST['btnenvia'];;
   $sentencia3 = "SELECT * FROM detalle_activo WHERE activofijo_id='$aux3'"; 
   $ejecutar3=mysqli_query($mysqli,$sentencia3);
   $fila3 = mysqli_fetch_assoc($ejecutar3);

   $senten2 = "SELECT idCat FROM activo WHERE idAc='$aux3'"; 
   $ejecu2=mysqli_query($mysqli,$senten2);
   $fil2 = mysqli_fetch_assoc($ejecu2);
   $senten1 = "SELECT * FROM categoria WHERE idCat='$fil2[idCat]'"; 
   $ejecu1=mysqli_query($mysqli,$senten1);
   $fil1 = mysqli_fetch_assoc($ejecu1);

   ini_set('date.timezone', 'America/El_Salvador');


  //$Hoy=date("Y/m/d");
   $fecha1=date_create($fila3['fecha_inicio']);
   $fecha2=date_create(date("Y-m-d"));
   $interval = date_diff($fecha1, $fecha2);
   $dias=$interval->days;
   $vidau=$fila3['vidautil_restante'];
   $valor=$fila3['valor_historico'];
   $res=$fil1['val'];
   $residual=$valor*($res/100);
   $dep=$valor-$residual;
   ?>
<script type="text/javascript">
var dias=<?php echo json_encode($dias); ?>;
var vida=<?php echo json_encode($vidau); ?>;
var valor1=<?php echo json_encode($dep); ?>;
var ciclo=0;
var aux=0;
 var v1=0;

    window.onload=function(){
      ciclo=365*vida;
      var cuota=valor1/ciclo;
      for ($i = 1; $i <=10;  $i++){
        aux=aux+cuota;
        valor1=valor1-cuota;
         v1 = Math.abs(valor1);
      }
        document.getElementById('dir2').value=v1.toFixed(2);
       // document.getElementById('prec').min=v1.toFixed(2);
    
    }

    function razon(id){
      if(id==1){
       // document.getElementById('prec').min=v1.toFixed(2);
      }else{
       // document.getElementById('prec').min=0;
      }
    }
</script> 

 
<br>



</div>






<div class="col-md-4">
<br>
<br>
<br>
<br>
<br>
<div class="input-group">
  <label for="dir">Valor en libros del activo: </label>
  <div class="input-group">
  <input type="text" class="form-control" id="dir2" name="dir2" readonly="readonly">
  <div class="input-group-addon"><span class="glyphicon glyphicon-usd"></span></div>
  </div>
</div>
 



<br>

<div class="input-group" style="width:220px;">

  <label for="prec" >Precio de venta:</label>
  <div class="input-group">
  <input type="number" class="form-control" id="prec" required="true"  placeholder="" name="prec" >
  <div class="input-group-addon"><span  class="glyphicon glyphicon-usd" aria-hidden="true"></span></div>
</div>
</div>

<br>



</div>

<div class="col-md-4">


<div class="input-group">

  <label for="nfac"><h4>FACTURA No.</h4> </label>
  <div class="input-group">
  <h4><input type="text" size="15" class="form-control" id="nfac" placeholder="" name="nfac" value="<?php echo "0000".$_POST['btnenvia'];?>" readonly="readonly"></h4>
  
  </div>
</div>


<br>

<div class="input-group">

  <label for="fech">Fecha de transaccion: </label>
  <div class="input-group">
  <input type="text" class="form-control" id="fech" placeholder="" name="fech" readonly="readonly" value="<?php echo date("Y/m/d");?>">
   <div class="input-group-addon"><span class="glyphicon glyphicon-check"></span></div>
  </div>
</div>







</div>


<input  type="hidden" class="form-control" id="ideU" name="ideU" placeholder="Nombre" value="<?php echo $_POST['btnEditar'];?>">

  <div class="col-lg-12 col-md-offset-5">
<br>
<br> 
<div class="button-group">
<button type="submit" class="btn btn-success">Guardar</button>
<button type="button" class="btn btn-success" data-dismiss="modal" onclick="envia()">Cancelar</button>
</div>
</div>

</div>
</form>
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
  
</body>

</html>


    
        
