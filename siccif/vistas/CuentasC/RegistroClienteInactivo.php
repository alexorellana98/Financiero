<?php
require 'conexion.php';
//$con=mysqli_connect('localhost','root','','finanzas');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <title>Cliente Inactivo</title>
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
     window.location="http://localhost/Financiero/siccif/vistas/CuentasC/TodosClientes.php";
  }else{window.location="http://localhost/Financiero/siccif/vistas/CuentasC/RegistroClienteInactivo.php";}

}
 //funcion para que la tabla se llene dinamicamente
  
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

if (!empty($_GET['btnbaja']))  {
//Inactiva el activo 
$est=0;
$var =$_GET['btnbaja'];
$sql = " UPDATE cliente set estado='$est' WHERE idCliente='$var'";
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
              <h3 align="center" >Clientes Inactivos</h3>
            </div>
          </div>
          <!-- /Title -->
      


                  <div class="col-md-2 ">
                  <div class="form-group">

                      <label for="condi">Estado :</label>
                    <select class="form-control" data-live-search="true" id="condi" name="condi" onchange="sele()">
                      <option></option> 
                      <option value="1" >Activo</option>
                       
                      <option value="0">Inactivo </option>
                    </select>
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
                              <th  >N°</th>
                              <th >Nombre</th>
                              <th >Código</th>
                              <th >Valor residual(%)</th>
                              <th >Opciones</th>
                            </tr>
                        </thead>
                        
                        <tbody >
                          <?php
$extraer="SELECT * FROM cliente";

// $base=mysqli_select_db($con,'finanzas');
$ejecutar=mysqli_query($mysqli,$extraer);


while($ejecuta=mysqli_fetch_array($ejecutar))
{if (($ejecuta['estado'])==0) {
  $cont=$cont+1;
  

    ?>  
  <tr>
    <td><?php  echo $cont ?> </td>
     <td><?php  echo $ejecuta['nombre']." ".$ejecuta['apellido'] ?> </td>
    <td> <?php echo $ejecuta['nit']?></td>
    <td> <?php echo $ejecuta['ocupacion']?></td>
    <td> <?php echo $ejecuta['depa']?></td>
    <?php if(($ejecuta['tipo'])==1){ ?> 
      <?php ?> 
    <td>Normal</td>
    <?php }else if(($ejecuta['tipo'])==2){ ?> 
      <?php ?> 
    <td>Moroso</td>
      <?php }else{ ?> 
        <?php ?> 
    <td>Incobrable</td>
     <?php } ?> 
        <?php ?>
    <td>
    <form   action="verDetalleCliente.blade.php" method="get" class="form-register" > 
     <button  type="submit" title="Ver Cliente" style="display: inline-block; " class="glyphicon glyphicon-eye-open btn-success " id="btndetalle" name="btndetalle" style="background-color: transparent border:0" data-toggle="modal"  value=<?php echo $ejecuta['idCliente'] ?>></button>
     </form>
      <form style=" margin-left: 30px; margin-top:-22px;" action="editarCliente.blade.php" method="post" class="form-register" > 
      <button  type="submit" title="Modificar Cliente"  class="glyphicon glyphicon-cog btn-info" id="btnEditar" name="btnEditar" style="background-color: transparent border:0" data-toggle="modal"  value="<?php echo $ejecuta['idCliente']?>" ></button>
       </form>
     <form  style=" margin-left: 60px; margin-top:-22px;" action="RegistroProveedor.blade.php" method="get" class="form-register" > 
     <button  type="submit" title="Dar de Alta Cliente" class="glyphicon glyphicon-arrow-up btn-danger" id="btnbaja" name="btnbaja" style="background-color: transparent border:0" data-toggle="modal"  value=<?php echo $ejecuta['idCliente'] ?>></button>
     </form>
    </td>
  </tr>

<?php
}
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


    
        
