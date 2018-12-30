<?php
require 'conexion.php';
//$con=mysqli_connect('localhost','root','','finanzas');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <title>Creditos</title>
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
              <h3 align="center" >Gestionar Creditos</h3>
            </div>
          </div>
          <!-- /Title -->
      
                <div class="col-md-3">
                  <br>
                  <div class="form-group">
                    <button type="button"  class="btn btn-success" data-toggle="modal" data-target="#ModalRegistarCredito"  >Ingresar Credito</button>
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
                            <th  WIDTH="50" HEIGHT='9' >N°</th>
                            <th >Tipo</th>
                            <th >Mínimo a Prestar</th>
                            <th >Máximo a Prestar</th>
                            <th >Interes Anual</th>
                            <th >Plazo Máximo</th>
                            <th  WIDTH="150" HEIGHT='9'>Opciones</th>
                          </tr>
                        </thead>
                        
                        <tbody >
                          <?php
                            $extraer="SELECT * FROM creditos";

                             //$base=mysqli_select_db($con,'finanzas');
                            $ejecutar=mysqli_query($mysqli,$extraer);


                            while($ejecuta=mysqli_fetch_array($ejecutar))
                            {
                              $cont=$cont+1;

                                ?>  
                              <tr>
                                <td><?php  echo $cont ?> </td>
                                <td><?php echo $ejecuta['tipo']?></td>
                                <td> <?php echo $ejecuta['cmin']?></td>
                                <td> <?php echo $ejecuta['cmax']?></td>
                                <td> <?php echo $ejecuta['interes']?>%</td>
                                <td> <?php echo $ejecuta['plazom']?> meses</td>
                                <td>
                                  <form   action="../CuentasC/editarCreditos.php" method="post" class="form-register" > 
                                  <button   type="submit" class="btn btn-danger" id="btnEditar" name="btnEditar"  data-toggle="modal"  value="<?php echo $ejecuta['idCre']?>" >Editar</button>
                                </form>

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
        </div>
        <!-- /Row -->
                    
                  

 
       <!--Modal  Registrar Proveedor-->

<div id="ModalRegistarCredito" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
<form  action="insert.php" method="post" class="form-register" > 
    <div class="modal-content">
    <div class="color-moduloInventario">
      <div class="modal-header" >
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div class="col-md-offset-5">
        <h4 class="modal-title">Registrar Credito</h4>
      </div>
       <div class="modal-body">

 <div class="row">
  <div class="col-md-12">


<div class="col-md-3 ">

<img src="img/proveedor.png" class="img-rounded" alt="Cinque Terre" width="300" height="250">
</div>

<div class="col-md-8 col-md-offset-1">

<div class="col-md-6 ">
<div class="form-group">

  <label for="nombcre" >Nombre de Credito:</label>
  <div class="input-group">
  <input type="text" required="true" autocomplete="off" class="form-control"  id="nombcre" name="nombcre" placeholder="Nombre" >
  <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
</div>
</div>


<div class="form-group">

  <label for="minip" >Mínimo a Prestar:</label>
  <div class="input-group">
  <input type="number" required="true" min="1" autocomplete="off" class="form-control" id="minip" name="minip" placeholder="100">
  <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
</div>
</div>


<div class="form-group">
  <label for="inter">Interes Anual(%):</label>
  <div class="input-group">
  <input type="number" min="1" required="true" autocomplete="off" class="form-control" id="inter" name="inter">
  <div class="input-group-addon"><span class="glyphicon glyphicon-briefcase"></span></div>
  </div>
</div>
</div>
<div class="col-md-6">

<div class="form-group">

  <label for="pmax" >Plazo Máximo:</label>
  <div class="input-group">
  <input type="number" min="1" required="true" autocomplete="off" class="form-control" id="pmax" name="pmax" >
  <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
</div>
</div>


<div class="form-group">
  <label for="maxp">Máximo a Prestar:</label>
  <div class="input-group">
  <input type="number" min="1" autocomplete="off" required="true" class="form-control" id="maxp" name="maxp">
  <div class="input-group-addon"><span class="glyphicon glyphicon-briefcase"></span></div>
  </div>
</div>

<div class="form-group ">
  <label for="gara">Tipo de Garantía:</label>
  <br>
  <select class="form-control" data-live-search="true" name="gara" id="gara" >
    <option value="Aval">Aval</option>
    <option value="Hipotecaria">Hipotecaria</option>
  </select>  

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


    
        
