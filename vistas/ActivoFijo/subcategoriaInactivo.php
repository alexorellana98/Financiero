<?php
require 'conexion.php';
//$con=mysqli_connect('localhost','root','','finanzas');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <title>Subcategoria</title>
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
     window.location="http://localhost/Financerio/siccif/vistas/ActivoFijo/subcategoria.php";
  }else{window.location="http://localhost/Financiero/siccif/vistas/ActivoFijo/subcategoriaInactivo.php";}

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

if (!empty($_GET['btnbaja']))  {
//Inactiva el activo 
$est=0;
$var =$_GET['btnbaja'];
$sql = " UPDATE subcategoria set estado='$est' WHERE idSub='$var'";
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
              <h5 align="center" class="txt-dark">Subcategorias Inactivas</h5>
            </div>
          </div>
          <!-- /Title -->
        

        <!-- Row -->
            <div class="row">
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
                              <th >Nombre</th>
                              <th >Codigo</th>
                              <th >Codigo Categoria</th>
                              
                              <th WIDTH="40" HEIGHT='9'>Opciones</th>
                            </tr>
                        </thead>
                        
                        <tbody >
                          
                         <?php
                            $extraer="SELECT * FROM subcategoria";

                             //$base=mysqli_select_db($con,'finanzas');
                            $ejecutar=mysqli_query($mysqli,$extraer);


                            while($ejecuta=mysqli_fetch_array($ejecutar))
                            {if (($ejecuta['estado'])==0) {
                              $cont=$cont+1;
                              
                            $aux=$ejecuta['idcat'];
                               $sentencia = "SELECT * FROM categoria WHERE idCat='$aux'"; 
                               $ejecutar2=mysqli_query($mysqli,$sentencia);
                               $fila = mysqli_fetch_assoc($ejecutar2);
                                ?>  
                              <tr>
                                <td><?php  echo $cont ?> </td>
                                <td><?php echo $ejecuta['nombre']?></td>
                                <td> <?php echo $ejecuta['codigo']?></td>
                                <td> <?php echo $fila['cod']?></td>
                                <td>
                                   
                                  <button disabled="true" type="submit" class="btn btn-danger" id="btnEditar" name="btnEditar" style="background-color: transparent border:0" data-toggle="modal"  value="<?php echo $ejecuta['idSub']?>" >Editar</button>
                                  

                                 <form  style=" margin-left: 100px; margin-top:-43px" action="subcategoria.php" method="get" class="form-register" > 
                                 <button  type="submit" class="btn btn-warning" id="btnalta1" name="btnalta1" style="background-color: transparent border:0" data-toggle="modal"  value=<?php echo $ejecuta['idSub'] ?>>Alta</button>
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

   
  

 </script>
  <?php
include "../Componentes/scripts.php";
?>
  
</body>

</html>


    
        
        