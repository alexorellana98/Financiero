<?php
require 'conexion.php';
//$con=mysqli_connect('localhost','root','','finanzas');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <title>Ubicacion</title>
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
     window.location="http://localhost/Financiero/siccif/vistas/ActivoFijo/Ubicacion.php";
  }else{window.location="http://localhost/Financiero/siccif/vistas/ActivoFijo/UbicacionInactivo.php";}

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
$sql = " UPDATE ubicacion set estado='$est' WHERE idUb='$var'";
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
              <h3 align="center" >Ingresar Ubicación</h3>
            </div>
          </div>
          <!-- /Title -->
        

        <!-- Row -->
            <div class="row">

            
                
                <div class="col-md-3">
                  <br>
                  <div class="form-group">

                    <button type="button"  class="btn btn-success " data-toggle="modal" data-target="#ModalRegistarProveedor"  >Ingresar Ubicación</button>
                  </div>
                </div>

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
              <div class="panel-heading">
                <div class="pull-left">
                  <h6 class="panel-title txt-dark">Categorias</h6>
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="panel-wrapper collapse in">
                <div class="panel-body">
                  <div class="table-wrap">
                    <div class="table-responsive">
                      <table id="datable_1" class="table table-hover display  pb-30" >
                        <thead>
                          <tr >
                              <th  WIDTH="50" HEIGHT='9' >N°</th>
                              <th >Código</th>
                              <th >Nombre</th>
                              <th  WIDTH="40" HEIGHT='9'>Opciones</th>
                            </tr>
                        </thead>
                        
                        <tbody >
                          <?php
                            $extraer="SELECT * FROM ubicacion";

                             //$base=mysqli_select_db($con,'finanzas');
                            $ejecutar=mysqli_query($mysqli,$extraer);


                            while($ejecuta=mysqli_fetch_array($ejecutar))
                            { if (($ejecuta['estado'])==1) {
                              $cont=$cont+1;
                              

                                ?>  
                              <tr>
                                <td><?php  echo $cont ?> </td>
                                <td><?php echo $ejecuta['codU']?></td>
                              
                                <td id="nam" name="nam"><?php echo $ejecuta['nombre']?></td>
                              

                                <td>
                                <form  action="editarUbicacion.php" method="post" class="form-register" > 
                                  <button  type="submit" class="btn btn-danger" id="btnEditar" name="btnEditar" style="background-color: transparent border:0" data-toggle="modal"  value="<?php echo $ejecuta['idUb']?>" >Editar</button>
                                </form>
                                  
                                 <form style="margin-left: 100px; margin-top:-43px;" action="UbicacionInactivo.php" method="get" class="form-register" > 
                                 <button  type="submit" class="btn btn-warning" id="btnbaja" name="btnbaja" style="background-color: transparent border:0" data-toggle="modal"  value=<?php echo $ejecuta['idUb'] ?>>Baja</button>
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
        <h4 class="modal-title">Ingresar Ubicación></h4>
        </div>
      </div>
      </div>
       <div class="modal-body">

 <div class="row">
  <div class="col-md-12">


<div class="col-md-3 ">

<img src="../Imagen/ubicacion.jpg" class="img-rounded" alt="Cinque Terre" width="300" height="250">
</div>

<div class="col-md-7 col-md-offset-2">

<div class="col-md-6">
<div class="input-group">

  <label for="nombUb" >Nombre:</label>
  <div class="input-group">
  <input type="text" class="form-control" id="nombUb" name="nombUb" placeholder="Nombre">
  <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
</div>
</div>


<div class="input-group">

  <label for="codUb" >Codigo:</label>
  <div class="input-group">
  <input type="text" class="form-control" id="codUb" name="codUb" placeholder="Ej:0023">
  <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
</div>
</div>


</div>


</div>

</div>
</div> 
 </div>
  
 <div class="modal-footer">

        <button type="submit" class="btn btn-success">Guardar</button>
        <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
        </div>
      </div>

      </form>
      </div>
 
</div>
<!--Fin modal Registrar Proveedor-->
        
        <div class="col-md-1"></div>


         </div>
        <!-- Fin Row -->
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


    
        
        