<?php
require 'conexion.php';
//$con=mysqli_connect('localhost','root','','finanzas');
ini_set('date.timezone', 'America/El_Salvador');
$Hoy=date("Y/m/d");
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
   window.location="http://localhost/Financiero/siccif/vistas/CuentasC/RegistroCliente.php";
  }
</script>
</head>
  
<?php 
   $aux=$_GET['btnEditar1'];
   $sentencia = "SELECT * FROM cliente WHERE idCliente=$aux"; 
   $ejecutar=mysqli_query($mysqli,$sentencia);
   $fila = mysqli_fetch_assoc($ejecutar);
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
              <h3 align="center" >Realizar Prestamo</h3>
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
              
              <form  action="insert.php" method="post" class="form-register" > 
       <div class="input-group">
   
 <div class="col-lg-12 col-md-offset-2">
 
<div class="col-md-6">
<div class="input-group">

  <label for="nomb" >Nombre de Cliente:</label>
  <div class="input-group">
  <input type="text" readonly="true" class="form-control" id="nomb" placeholder="Nombre" name="nomb" value="<?php echo $fila['nombre'];?>">
  <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
</div>
</div>


<br> 
<div class="input-group">

  <label for="dui">DUI </label>
  <div class="input-group">
  <input type="text" readonly="true" class="form-control" id="dui" placeholder="Ej:00000000-0" name="dui" value="<?php echo $fila['dui'];?>">
   <div class="input-group-addon"><span class="glyphicon glyphicon-check"></span></div>
  </div>
</div>
<br>

<div class="input-group">

  <label for="tel" >Telefono:</label>
  <div class="input-group">
  <input type="text" readonly="true" class="form-control" id="tel" placeholder="Ej:0000-0000" name="tel" value="<?php echo $fila['tel'];?>">
  <div class="input-group-addon"><span  class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span></div>
</div>
</div>
<br>
 <div class="form-group" style="width:220px;">

  <label for="tipo" >Tipo de Prestamo:</label>
   <select class="form-control"  id=" tipo" name="tipo" onchange="cambiar(this.selectedIndex)">
   <option value="0"></option>
<?php
 $sentencia1 = "SELECT * FROM creditos"; 
// $base=mysqli_select_db($con,'finanzas');
 $ejecutar1=mysqli_query($mysqli,$sentencia1);
   
$cont=1;
$tipo;
                      
                        $interes;
                        $maxpres;
                     $minpres;
                     $es;
                        $plamax;
while($ejecuta=mysqli_fetch_array($ejecutar1))
{
  $plamax[$cont]=$ejecuta['plazom']; 
    $interes[$cont]=$ejecuta['interes'];
    $maxpres[$cont]=$ejecuta['cmax'];
    $minpres[$cont]=$ejecuta['cmin'];
  
$es=$ejecuta['idCre'];
    ?>  

    <?php ?>
   
                 <option value="<?php  echo $ejecuta['idCre'] ?>"><?php  echo $ejecuta['tipo'] ?></option>
                 
                  
                     
    <?php
    
    
    $cont++;
}

?>                   
     
</select>    

</div>
<br>
<br>
<div class="form-group" style="width:220px;">

  <label for="plazo" >Plazo(meses):</label>
  <div class="input-group">
  <input type="number" min="1" required="true" max="<?php  echo $plamax[0];?>" class="form-control" id="plazo" placeholder="Ej:0" name="plazo" >
  <div class="input-group-addon"><span  class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span></div>
</div>
</div>

<br>
 <div class="form-group">  
<button type="button" style="width:220px;"  class="btn btn-warning btn-large " onclick="cuota1()">Calcular Cuota</button>
</div>


</div>

<div class="col-md-6">


<div class="input-group">

  <label for="ape" >Apellidos:</label>
  <div class="input-group">
  <input type="text" class="form-control" readonly="true" id="ape" placeholder="Apellidos" name="ape"  value="<?php echo $fila['apellido'];?>">
  <div class="input-group-addon"><span  class="glyphicon glyphicon-user" aria-hidden="true"></span></div>
</div>
</div>
<br>
<div class="input-group">

  <label for="nit">NIT  </label>
  <div class="input-group">
  <input type="text" class="form-control" id="nit" readonly="true" placeholder="Ej:0000-000000-000-0" name="nit" value="<?php echo $fila['nit'];?>">
   <div class="input-group-addon"><span class="glyphicon glyphicon-check"></span></div>
  </div>
</div>


<br>

<div class="input-group">

  <label for="Ocup" >Ocupación:</label>
  <div class="input-group">
  <input type="text" class="form-control" id="Ocup" readonly="true" placeholder="Ocupación laboral" name="Ocup" value="<?php echo $fila['ocupacion'];?>">
  <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
</div>
</div>
<br>
<div class="input-group" style="width:220px;">

  <label for="monto" >Monto($):</label>
  <div class="input-group">
  <input type="number" min="<?php  echo $minpres[0];?>" max="<?php  echo $maxpres[0];?>" class="form-control" id="monto" required="true"  placeholder="1000" name="monto">
  <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
</div>
</div>
<br>
<div class="input-group">
  <label for="fecha">Fecha de registro:</label>
  <div class="input-group">
  <input type="date" class="form-control" id="fecha" readonly="true" name="fecha" value="<?php echo date("Y-m-d");?>">
  <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
  </div>
</div>
<br>
<div class="input-group" style="width:220px;">

  <label for="cuota" >Cuota($):</label>
  <div class="input-group">
  <input type="text" class="form-control" id="cuota" required="true" readonly="true" placeholder="0.00" name="cuota">
  <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
</div>
</div>


</div>



<input  type="hidden" class="form-control" id="ideC" name="ideC" placeholder="Nombre" value="<?php echo $_GET['btnEditar1'];?>"> 
<input  type="hidden" class="form-control" id="saldo" name="saldo"> 
<input  type="hidden" class="form-control" id="posi" name="posi"> 
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
                    
                  

 
        <!--Modal  Registrar Proveedor-->

        <div id="ModalRegistarProveedor" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <form  action="insert.php" method="post" class="form-register" > 
                <div class="modal-content">
                  <div class="color-moduloInventario">
                      <div class="modal-header" >
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <div class="col-md-offset-5">
                          <h4 class="modal-title">Ingresar Categoria </h4>
                        </div>
                        <div class="modal-body">
                      <div class="row">
                          <div class="col-md-12">
                          <div class="col-md-3 ">

                            <img src="../Imagen/categoria.jpg" class="img-rounded" alt="Cinque Terre" width="300" height="250">
                          </div>

                          <div class="col-md-7 col-md-offset-2">

                            <div class="col-md-6 ">
                              <div class="input-group">

                                  <label for="nombcat" >Nombre:</label>
                                  <div class="input-group">
                                    <input type="text" class="form-control" id="nombcat" name="nombcat" placeholder="Nombre" required>
                                    <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
                                </div>
                              </div>


                              <div class="input-group">
                                  <label for="cod" >Código:</label>
                                  <div class="input-group">
                                    <input type="text" class="form-control" id="cod" name="cod" placeholder="Ejemplo : H001" required>
                                    <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
                                </div>
                              </div>


                              <div class="input-group">
                                  <label for="val">Valor residual(%):</label>
                                  <div class="input-group">
                                    <input type="text" class="form-control" id="val" name="val" required> 
                                    <div class="input-group-addon"><span class="glyphicon glyphicon-briefcase"></span></div>
                                  </div>
                              </div>
                            </div>
                            
                            <div class="col-md-6">
                              <div class="input-group">

                                <label for="vidU" >Vida Util:</label>
                                <div class="input-group">
                                  <input type="text" class="form-control" id="vidU" name="vidU" required>
                                  <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
                                </div>
                              </div>


                              <div class="input-group">
                                  <label for="vidE">Vida economica:</label>
                                  <div class="input-group">
                                    <input type="text" class="form-control" id="vidE" name="vidE" required>
                                    <div class="input-group-addon"><span class="glyphicon glyphicon-briefcase"></span></div>
                                  </div>
                              </div>


                            </div>
                          </div>

                        </div>
                      </div> 
                    </div>
                            
                    <div class="modal-footer">

                      <button type="submit" class="btn btn-success" >Guardar</button>
                      <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          

        <!--Fin modal Registrar Proveedor-->
        
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


    
        
