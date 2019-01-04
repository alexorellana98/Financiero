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
	<script src="../../asset/js/activoFijo.js"></script>

  <script language="javascript">
    function sele(){
  var cond= $("#condi").val();
  if (cond==1) {
	     ajax_act('','subcategoria',cond);
	  }else if(cond==0){ajax_act('','subcategoria',cond);}

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
              <h5 align="center" class="txt-dark">Gestionar subcategorias</h5>
            </div>
          </div>
          <!-- /Title -->
        <!-- Row -->
            <div class="row">
                <div class="col-md-3">
                  <br>
                  <div class="form-group">

                    <button type="button"  class="btn btn-success" data-toggle="modal" data-target="#ModalRegistarProveedor"  >Ingresar subcategoria</button>
                  </div>
                </div>

                  <div class="col-md-2 ">
                  <div class="form-group">

                      <label for="condi">Estado :</label>
                    <select class="form-control SEstado" data-live-search="true" id="condi" name="condi" onchange="sele()">
                      <option>Seleccione</option> 
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
                  <h6 class="panel-title txt-dark">Sub-Categorias</h6>
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="panel-wrapper collapse in">
                <div class="panel-body">
                  <div class="table-wrap">
                    <div class="table-responsive" id="actualizar">
                      <table id="datable_1" class="table table-hover display  pb-30 tablaAct" >
                        <thead>
                          <tr >
                              <th  WIDTH="50" HEIGHT='9' >N°</th>
                              <th >Código</th>
                              <th >Nombre</th>
                              <th  WIDTH="200" HEIGHT='9'>Opciones</th>
                            </tr>
                        </thead>
                        
                        <tbody >
                          
                          <?php
                          $extraer="SELECT * FROM subcategoria";

                           //$base=mysqli_select_db($con,'finanzas');
                          $ejecutar=mysqli_query($mysqli,$extraer);


                          while($ejecuta=mysqli_fetch_array($ejecutar))
                          {if (($ejecuta['estado'])==1) {
                            $cont=$cont+1;
                            
                          $aux=$ejecuta['idcat'];
                             $sentencia = "SELECT * FROM categoria WHERE idCat='$aux'"; 
                             $ejecutar2=mysqli_query($mysqli,$sentencia);
                             $fila = mysqli_fetch_assoc($ejecutar2);
                              ?>  
                            <tr>
                              <td><?php  echo $cont ?> </td>
                              <td><?php echo $ejecuta['codigo']?></td>
                              <td><?php echo $ejecuta['nombre']?></td>
                           
                              <td class="text-center">
                                <div class="col-md-6 text-center">
                                  <form   action="editarSubcategoria.php" method="post" class="form-register" > 
                                    <button   type="submit" class="btn btn-danger" id="btnEditar" name="btnEditar"  data-toggle="modal"  value="<?php echo $ejecuta['idSub']?>" ><i class="fa fa-edit"></i></button>
                                    </form>	
                              </div>
                              <div class="col-md-6 text-right">
                                  <button  type="button" class="btn btn-warning"  onClick="darBaja('<?php echo $ejecuta['idSub']; ?>','Desea dar de baja a la Sub-Categoria','subcategoria','0')"><i class="fa fa-arrow-circle-down"></i> </button>
                              </div>                            
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
        <h4 class="modal-title">Ingresar Subcategoria</h4>
      </div>
       <div class="modal-body">

 <div class="row">
  <div class="col-md-12">


<div class="col-md-3 ">
<br>
<img src="../imagen/subcate.png" class="img-rounded" alt="Cinque Terre" width="250" height="250">
</div>

<div class="col-md-5 col-md-offset-1">


<div class="form-group">

  <label for="nombsub" >Nombre:</label>
  <div class="input-group">
  <input type="text" class="form-control" id="nombsub" name="nombsub" placeholder="Nombre">
  <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
</div>
</div>


<br>

<div class="form-group">
 <label for="nomcatego" >Elija una categoria:</label>
<br>
 <select class="form-control" data-live-search="true" id=" nomcatego" name="nomcatego" onchange="cod(this.value)">
 <option ></option>

                     <?php
$extraer="SELECT * FROM categoria";

// $base=mysqli_select_db($con,'finanzas');
$ejecutar=mysqli_query($mysqli,$extraer);
$cont=$cont+1;

while($ejecuta=mysqli_fetch_array($ejecutar))
{
  if (($ejecuta['estado'])==1) {
  $cont=$cont+1;
  

    ?>  
    <?php ?>
   
                 <option value="<?php  echo $ejecuta['cod'] ?>"><?php  echo $ejecuta['nombre'] ?></option>
                 
                  
                      
    <?php
}
}
?>                   
     
</select>                 
               
</div>
<br>


<div class="form-group">

  <label for="codsub" >Código:</label>
  <div class="input-group">
  <input type="text" class="form-control" id="codsub" name="codsub" placeholder="Ejemplo : 0001">
  <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
</div>
</div>


</div>

</div>
</div> 
 </div>
  
 <div class="modal-footer">

        <button type="submit" class="btn btn-success" >Guardar</button>
        <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
      </form>
      </div>
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
  
  <script  >
   function cod(idcat){
    $('#codsub').val(idcat);
   }
 </script>
  <?php
include "../Componentes/scripts.php";
?>
 <script>
        $(function () {
            $('.SEstado').select2()
        });
    </script>
</body>

</html>


    
        
        