
<?php
require 'conexion.php';
//$con=mysqli_connect('localhost','root','','finanzas');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <title>Detalles</title>
  <meta name="description" content="Doodle is a Dashboard & Admin Site Responsive Template by hencework." />
  <meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Doodle Admin, Doodleadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
  <meta name="author" content="hencework"/>
  
  <?php
      include "../Componentes/estilos.php";
  ?>

  <script language="javascript">
function envia(){
   window.location="http://localhost/Financiero/siccif/vistas/CuentasC/verPrestamosCliente.php";
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
      
                
          <div class="col-lg-12 col-md-offset-11">
            <div class="button-group">
              <form  action="verPrestamosCliente.php" method="get" class="form-register" > 
                <button type="submit"  class="btn btn-success" data-dismiss="modal" id="btnPre" name="btnPre" value=<?php echo $fila1['idCli'] ?>>Atras</button>
              </form>
            </div>
            <br>

          </div>
                    <?php

                    $cont=0;
                    ?>
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
    //Muestra datos del prestamo 
    $aux2=$_GET['btndetalle'];
   $sentencia2 = "SELECT * FROM prestamo WHERE idPres='$aux2'"; 
   $ejecutar2=mysqli_query($mysqli,$sentencia2);
   $fila1 = mysqli_fetch_assoc($ejecutar2);
  //muestra detalles del cliete
    $aux3=$fila1['idCli'];
   $sentencia3 = "SELECT * FROM cliente WHERE idCliente=$aux3"; 
   $ejecutar3=mysqli_query($mysqli,$sentencia3);
   $fila3 = mysqli_fetch_assoc($ejecutar3);

   //Muestra datos de credito
    $aux4=$fila1['idCre'];
   $sentencia4 = "SELECT * FROM creditos WHERE idCre=$aux4"; 
   $ejecutar4=mysqli_query($mysqli,$sentencia4);
   $fila4 = mysqli_fetch_assoc($ejecutar4);
   ?>
<tr>
   
    <td>Nombre:</td>
    <td><?php echo $fila3['nombre'];?></td>
  </tr>
  <tr>

    <td> Apellidos :</td>
    <td><?php echo $fila3['apellido'];?></td>
  </tr>
  <tr>
    <td>NIT :</td>
    <td><?php echo $fila3['nit'];?></td>
  </tr> 
  <tr>

        <td>Tipo de prestamo:</td>
    <td><?php echo $fila4['tipo'];?></td>
  </tr>
 <tr>
  <tr>

        <td>Interés:</td>
    <td><?php echo $fila4['interes']."%"?></td>
  </tr>

        <td> Plazo:</td>
    <td><?php echo $fila1['plazo']." Meses";?></td>
  </tr>
   
   <tr>
   <td>Monto($):</td>
    <td><?php echo $fila1['monto'];?></td>
   </tr>

    <tr>
   <td> Cuota($):</td>
    <td><?php echo $fila1['cuota'];?></td>
   </tr>

    <tr>
   <td> Saldo($):</td>
    <td><?php echo $fila1['saldo'];?></td>
   </tr>
  
    <tr>
   <td>Fecha de financiamiento:</td>
    <td><?php echo $fila1['fechafinan'];?></td>
   </tr>

   
   <tr>
    <td>Estado:</td>
    <td><?php echo $fila1['estado'];?></td>
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
  
</body>

</html>


    
        