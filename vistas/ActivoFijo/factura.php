


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
        <!-- Title -->
          <div class="row heading-bg">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <h5 align="center" class="txt-dark">Factura</h5>
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
              
              <br>
                <?php
                  $cont1=0;
                  $vent=0;
                  $tot=0;
                  $extraer="SELECT * FROM venta order by idVenta desc";

                   //$base=mysqli_select_db($con,'finanzas');
                  $ejecutar=mysqli_query($mysqli,$extraer);
                  $fila = mysqli_fetch_assoc($ejecutar);

                  $aux=$fila['idActi'];
                  $sentencia1= "SELECT * FROM activo WHERE idAc='$aux'";
                  $ejecutar1=mysqli_query($mysqli,$sentencia1);
                  $fila1 = mysqli_fetch_assoc($ejecutar1);

                  $des=$fila1['descrip'];
                  $pre=$fila['precVenta'];
                    $cont1=$cont1+1;
                  ?>  
                  <div class="row">

               <div class="col-md-2"></div>
                <div class="col-md-12 ">
                 <table align="center" border=2  style=" align-content: center;  width: 100%;
                height: 10px; border-color: =black">
                <thead>
                  <tr >
                    <td style="border-color: black">CANT.</td>
                    <td style="border-color: black">DESCRIPCIÓN</td>
                    <td style="border-color: black">PRECIO UNITARIO</td>
                    <td style="border-color: black">VENTAS SUJETAS</td>
                    <td style="border-color: black">VENTAS EXENTAS</td>
                    <td style="border-color: black">VENTAS EFECTAS</td>
                  </tr>
                </thead >
              <?php $desc=0;  ?>
                <tr style="width: 25%; height: 10px;">
                   <td style="width: 25% height: 1px;border-color: black"  ><?php echo 1;?></td>
                  <td style="border-color: black" WIDTH="150" HEIGHT="0px"  ><?php echo $des;?></td>
                  <td style="border-color: black" WIDTH="20" HEIGHT="0px" ><?php echo $pre;?></td>
                  <td style="border-color: black" ></td>
                  <td style="border-color: black"></td>
                  
                    <td WIDTH="20" HEIGHT="0px" width=100 style="border-color: black" ><?php echo $pre;?></td>
                    

                </tr>
                <tr>
                <td style="border-color: black"></td>
                <td style="border-color: black"></td>
                <td style="border-color: black"></td>
                <td style="border-color: black"></td>
                <td style="border-color: black">TOTAL</td>
                <td style="border-color: black"><?php echo $pre;?></td>
                </tr>
              </table>

                
               </div> 
               </div>
              <br>

               </div>  
            </div>  
          </div>
        </div>
        <!-- /Row -->
                    
                  

  <?php include '../Componentes/footer.php'; ?>

        
      </div>
    <!-- /#wrapper -->
        <!-- Footer -->
    
        <!-- /Footer -->
      </div>


  
  
  <?php
include "../Componentes/scripts.php";
?>
  
</body>

</html>


    
        
