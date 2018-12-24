
















<?php
require 'conexion.php';
//$con=mysqli_connect('localhost','root','','finanzas');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <title>Detalles Reevaluar</title>
  <meta name="description" content="Doodle is a Dashboard & Admin Site Responsive Template by hencework." />
  <meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Doodle Admin, Doodleadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
  <meta name="author" content="hencework"/>
  
  <?php
      include "../Componentes/estilos.php";
  ?>

  <script language="javascript">
function envia(){
   window.location="http://localhost/Financiero/siccif/vistas/ActivoFijo/Reevaluar.php";
  }


 //funcion para que la tabla se llene dinamicamente
  
   
</script>
</head>
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
              <h3 align="center" >Detalles</h3>
            </div>
          </div>
          <!-- /Title -->

                    <?php

                    $cont=0;
                    ?>
                    <div class="col-lg-12 col-md-offset-11">
                      
                      <div class="button-group">

                      <button type="button"  class="btn btn-success" data-dismiss="modal" onclick="envia()">Atras</button>
                      </div>
                      <br>
                    </div>
                    <!-- Row -->

        <div class="row">
          <div class="col-sm-12">
            <div class="panel panel-default card-view">
              
              <div class="panel-wrapper collapse in">
                <div class="panel-body">
                  <div class="table-wrap">
                    <div class="table-responsive">
                      <table id="datable_1" class="table table-hover display  pb-30" >
                        <thead>
                          <tr >
                            <th  WIDTH="100" HEIGHT='9' >Valor</th>
                            <th  WIDTH="300" HEIGHT='9'>Descripcion</th>
                          </tr>
                        </thead>
                        
                        <tbody >
                              <?php
                              $aux2=$_GET['btnId'];
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


    
        
