<?php
require 'conexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
   <title>Vender</title>
  
  <?php
      include "../Componentes/estilos.php";
  ?>
  <script language="javascript">
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
            <div class="panel panel-primary card-view " style="margin-top: 20px;">
            <div class="panel-heading text-center">
                <div class="pull-center">
                    <h3 class="panel-title panel-center txt-light"><i class="fa fa-usd"></i>  Venta de Activos</h3>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                <?php    $cont=0;         ?>
                  <div class="table-wrap">
                    <div class="table-responsive">
                      <table id="datable_1" class="table table-hover display  pb-30" >
                        <thead>
                          <tr >
                              <th  WIDTH="50" HEIGHT='9' >N°</th>
                              <th >Código</th>
                              <th >Descripción</th>
                              <th >Categoria</th>
                              <th >Subcategoria</th>
                              <th  WIDTH="40" HEIGHT='9'>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php
                            $extraer="SELECT * FROM activo";
                            $ejecutar=mysqli_query($mysqli,$extraer);
                            while($ejecuta=mysqli_fetch_array($ejecutar))
                            {
                             if (($ejecuta['estado'])==1) {
                              $cont1=$cont1+1;
                                ?>  
                              <tr>
                                <td><?php  echo $cont1 ?> </td>
                                <td><?php  echo $ejecuta['codAct'] ?> </td>
                                <td><?php echo $ejecuta['descrip']?></td>
                            <?php
                                $aux=$ejecuta['idCat'];
                               $sentencia1 = "SELECT * FROM categoria WHERE idCat=$aux"; 
                               $ejecutar1=mysqli_query($mysqli,$sentencia1);
                               $fila = mysqli_fetch_assoc($ejecutar1);
                               
                               ?>
                                <td><?php echo $fila['nombre'];?></td>
                                <?php
                                $aux2=$ejecuta['idSub'];
                               $sentencia2 = "SELECT * FROM subcategoria WHERE idSub=$aux2"; 
                               $ejecutar2=mysqli_query($mysqli,$sentencia2);
                               $fila1 = mysqli_fetch_assoc($ejecutar2);
                               ?>
                                <td> <?php echo $fila1['nombre'];?></td>
                                <td>
                                <?php
                                ?>
                               
                                  <form  action="verDetalle.php" method="get" class="form-register" > 
                                  
                            <button  type="submit" class="btn btn-success" id="btnId" name="btnId"  data-toggle="modal"  value="<?php echo $ejecuta['idAc']; ?>"> <i class="glyphicon glyphicon-eye-open"></i>  Ver</button>
                            </form>
                                 <form style="margin-left: 100px; margin-top:-43px;" action="ventaProcesar.php" method="post" class="form-register" > 
                                 <button  type="submit" class="btn btn-warning" id="btnenvia" name="btnenvia" style="background-color: transparent border:0" data-toggle="modal"  value="<?php echo $ejecuta['idAc']; ?>"><i class="glyphicon glyphicon-usd"></i>  Vender</button>
                                 </form>

                                 <?php }?>

                                </td>
                              </tr>

                            <?php

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


    
        
