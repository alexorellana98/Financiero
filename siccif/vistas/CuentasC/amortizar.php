<?php
require 'conexion.php';
//$con=mysqli_connect('localhost','root','','finanzas');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <title>Amortizar</title>
  <meta name="description" content="Doodle is a Dashboard & Admin Site Responsive Template by hencework." />
  <meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Doodle Admin, Doodleadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
  <meta name="author" content="hencework"/>
  
  <?php
      include "../Componentes/estilos.php";
  ?>

  <script language="javascript">
  

  function sele(){
  var cond= $("#condi").val();
  if (cond==1) {
     window.location="http://localhost/Financiero/siccif/vistas/CuentasC/creditos.php";
  }

}
    $(document).ready(function () {
   $('#entradafilter').keyup(function () {
      var rex = new RegExp($(this).val(), 'i');
        $('.contenidobusqueda tr').hide();
        $('.contenidobusqueda tr').filter(function () {
            return rex.test($(this).text());
        }).show();

        })

});
</script>
</head>
<?php

//activa el activo 
   $aux=$_GET['btnbaja'];
   $aux7=$_GET['btnbaja'];
   $sentencia = "SELECT * FROM prestamo WHERE idCli='$aux'"; 
   $ejecutar=mysqli_query($mysqli,$sentencia);
   $fila = mysqli_fetch_assoc($ejecutar); 

   $sentencia1 = "SELECT * FROM cliente WHERE idCliente='$aux'"; 
   $ejecutar1=mysqli_query($mysqli,$sentencia1);
   $fila1 = mysqli_fetch_assoc($ejecutar1);

   $sentencia2 = "SELECT * FROM creditos WHERE idCre='$fila[idCre]'"; 
   $ejecutar2=mysqli_query($mysqli,$sentencia2);
   $fila2 = mysqli_fetch_assoc($ejecutar2);

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
          
          <!-- /Title -->
      
                <div class="">
                  <div class="container">
                    <div class="col-md-12">
                      <div class="row">
                        <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12 page-header">
                          <h3 align="center" style="color:#000" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Amortización de Prestamo</h3>
                          <h3 align="center" >&nbsp;&nbsp;Cliente: <?php echo $fila1['nombre']." ".$fila1['apellido'] ?></h3>
                          <h3 align="center" > &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tipo de Prestamo: <?php echo $fila2['tipo']?></h3>
                        </div>
                        <div style="text-align: right;">
                        <form  action="verPrestamosCliente.php" method="get" class="form-register" > 
                          <button type="submit"  class="btn btn-success" data-dismiss="modal" id="btnPre" name="btnPre" value=<?php echo $fila['idCli'] ?>>Atras</button>
                        </form>
                      </div>
                      </div>

                    </div>
                  </div>
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
                            <th  WIDTH="50" HEIGHT='9' >Pago</th>
                            <th >Fecha de Pago</th>
                            <th >Saldo Inicial</th>
                            <th >Pago programado</th>
                            <th >Capital</th>
                            <th >Interes</th>
                            <th >Saldo Final</th>
                            <th >Interes Acumulado</th>
                            <th >Estado</th>
                            <th  WIDTH="150" HEIGHT='9'>Opciones</th>
                          </tr>
                        </thead>
                        
                        <tbody >
                          


<?php
 $interes=$fila2['interes']/100/12;
 $plazo=$fila['plazo'];
 $monto=$fila['monto'];
 $fecha=$fila['fechafinan'];
 $cuota=$fila['cuota'];
 $interesAcum=0;
for ($i=1; $i <= $fila['plazo']; $i++) { 
  # code...


    ?>  
  <tr>
    <td><?= $i ?></td>
    <?php 
     $fecha = strtotime ( '+1 month' , strtotime ( $fecha ) ) ;
     $aux=date("d/m/Y",$fecha);
     ?>
    <td><?= $aux ?></td>
    <?php $fecha=date("Y/m/d",$fecha); ?>
    <td> $ <?= round($monto,2) ?></td>
    <td>  $ <?= $cuota ?></td>
    <?php 
      $interes1=$monto*$interes;
      $capital=$cuota-$interes1;
      $saldoFinal=$monto-$capital;
      $interesAcum=$interesAcum + $interes1;

      if ($i==$fila['plazo']){
       $saldoFinal=0;
        }
                         ?>
    <td>$ <?= round($capital,2) ?></td>
    <td>$ <?= round($interes1,2) ?></td>
    <td>$ <?= round($saldoFinal,2) ?></td>
    <td>$ <?= round($interesAcum, 2)?></td>
    <?php 
   $ban=false;
   $sentencia3 = "SELECT * FROM pagos WHERE idPres='$fila[idPres]'"; 
   $ejecutar3=mysqli_query($mysqli,$sentencia3);
                              while ($cons=mysqli_fetch_array($ejecutar3)) {
                                if ($cons['numero'] == $i) {
                                    $ban=true;
                                }
                            }  

                            if ($ban || $fila['estado']=="Cancelado") {       
                        ?>
                        <?php ?>
                        <td>Cancelada</td>

                        <td >
                        <button  type="button" disabled="true" title="Cuota Pagada" class="btn btn-success" id="btnEditar1" name="btnEditar1" style="background-color: transparent border:0" data-toggle="modal">Cuota Cancelada</button>
                        </td>
                        <?php 
                            $ban=false; 
                            }else{

                        ?>
                        <?php ?>
                        <td>Pendiente</td>
                        <td>
                        <form style=""  action="pagarcu.php" method="get" class="form-register">
                        <input type="hidden" class="form-control" name="num" id="num" value=<?php echo $i ?>>
                        <input type="hidden" class="form-control" name="mon1" id="mon1" value=<?php echo round($monto,2) ?>>
               <button  type="submit" title="Pagar Cuota" class="btn btn-danger" id="btnEditar1" name="btnEditar1" style="background-color: transparent border:0" data-toggle="modal"  value=<?php echo $fila['idPres'] ?>>Pagar Cuota</button>
               </form>
                           <?php 
                        }
                         ?>
  </tr>

<?php
$monto=$monto-$capital;
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


    
        
