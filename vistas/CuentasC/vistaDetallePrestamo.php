
<?php
require 'conexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <title>Detalles</title>
  
  <?php
      include "../Componentes/estilos.php";
  ?>

  <script language="javascript"> 
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
             <div class="panel panel-info card-view" style="margin-top: 20px;">
            <div class="panel-heading text-center">
                <div class="pull-center">
                    <h3 class="panel-title txt-light"><i class="fa fa-info-circle"></i>   Detalles</h3>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
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
                <div class="row text-left">
            <div class="button-group">
              <form  action="verPrestamosCliente.php" method="get" class="form-register" > 
                  <button type="submit"  class="btn btn-danger" data-dismiss="modal" id="btnPre" name="btnPre" value="<?php echo $fila1['idCli'] ?>" > <i class="fa fa-mail-reply"> </i>  Atras</button>
              </form>
            </div>
            <br>
          </div>
                    <?php   $cont=0;   ?>
                <div class="row">
                    
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
    <td>Interés:</td>
    <td><?php echo $fila4['interes']."%"?></td>
  </tr>
  <tr>
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


    
        
