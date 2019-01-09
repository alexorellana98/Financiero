
<?php
require 'conexion.php';
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
   window.location="RegistroCliente.php";
  }
</script>
</head>

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
                <div class="row text-center">
                    <div class="button-group">
<button type="submit"  class="btn btn-danger" onclick="envia()"><i class="fa fa-mail-reply"></i>  Atras</button>
</div>
                </div>
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
    $aux2=$_GET['btndetalle'];
   $sentencia2 = "SELECT * FROM cliente WHERE idCliente='$aux2'"; 
   $ejecutar2=mysqli_query($mysqli,$sentencia2);
   $fila1 = mysqli_fetch_assoc($ejecutar2);
   
   ?>
<tr>
   
    <td>Nombre:</td>
    <td><?php echo $fila1['nombre'];?></td>
  </tr>
  
<?php if($fila1['repre']==""){?>
  <?php ?>
  <tr>
    <td> Apellidos :</td>
    <td><?php echo $fila1['apellido'];?></td>
    </tr>   
    <tr>
    <td>NIT :</td>
    <td><?php echo $fila1['nit'];?></td>
    </tr>
    <tr>
   <td> DUI :</td>
    <td><?php echo $fila1['dui'];?></td>
   </tr>
     <tr>
    <td> Ocupación:</td>
    <td><?php echo $fila1['ocupacion'];?></td>
  </tr>
    <?php }else{?>
      <?php ?>
    <tr>
    <td> Giro:</td>
    <td><?php echo $fila1['ocupacion'];?></td>
  </tr>
   <tr>
    <td>NIT :</td>
    <td><?php echo $fila1['nit'];?></td>
  </tr>
      <tr>
      <td> Representante Legal :</td>
    <td><?php echo $fila1['repre'];?></td>
    </tr>
  <tr>
   <td> DUI de Representante :</td>
    <td><?php echo $fila1['dui'];?></td>
   </tr>
    <?php }?>
   
   <tr>
   <td>Departamento :</td>
    <td><?php echo $fila1['depa'];?></td>
   </tr>

    <tr>
   <td> Dirección :</td>
    <td><?php echo $fila1['direc'];?></td>
   </tr>

    <tr>
   <td> Teléfono:</td>
    <td><?php echo $fila1['tel'];?></td>
   </tr>


   <tr>
    <td>Fecha de registro :</td>
    <td><?php echo $fila1['fecha'];?></td>
  </tr>

  <tr>
    <td>Ver prestamos:</td>
    <td>
    <div class="col-md-2">
        <form action="verPrestamosCliente.php" method="get" class="form-register">
                <button type="submit"  class="btn btn-success " id="btnPre" name="btnPre" value="<?php echo $fila1['idCliente']; ?>" style="width: 110%;"><i class="glyphicon glyphicon-eye-open"> </i>    Ver</button>
            </form>
    </div>
    </td>
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

    <!-- /#wrapper -->
  
  
  <?php
include "../Componentes/scripts.php";
?>
  
</body>

</html>


    
        
