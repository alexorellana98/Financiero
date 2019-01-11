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
function envia(){
   window.location="administrarActivo.php?accion=vender";
  }
   
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
                <div class="row">
                    <div class="button-group">
<button type="submit"  class="btn btn-danger" onclick="envia()"><i class="fa fa-mail-reply"></i>  Atras</button>
</div>
                </div>
                
                  <div class="table-wrap">
                    <div class="table-responsive">
                      <table id="datable_1" class="table table-hover display  pb-30" >
                        <thead>
                          <tr >
                              <th scope="col" style="color:#FFFFFF" WIDTH="100" HEIGHT='9' >Valor</th>
                              <th scope="col" style="color:#FFFFFF" WIDTH="300" HEIGHT='9'>Descripcion</th>
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


    
        
