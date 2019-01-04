<?php
require 'conexion.php';
//$con=mysqli_connect('localhost','root','','finanzas');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <title>Adquisición de activo fijo</title>
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
	     ajax_act('','compraactivo',cond);
	  }else if(cond==0){ajax_act('','compraactivo',cond);}

}

function envia(){
   window.location="http://localhost/Financiero/siccif/vistas/ActivoFijo/compraNueva2.php";
  }

f
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
              <h5 align="center" class="txt-dark">Adquisición de activo fijo</h5>
            </div>
          </div>
          <!-- /Title -->
                <div class="col-md-3">
                  <br>
                  <div class="form-group">

                    <button type="button"  class="btn btn-success" data-toggle="modal" onclick="envia()"  > Registrar nuevo activo</button>
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
              
              <div class="panel-wrapper collapse in">
                <div class="panel-body">
                  <div class="table-wrap">
                    <div class="table-responsive" id="actualizar">
                      <table id="datable_1" class="table table-hover display  pb-30" >
                        <thead>
                          <tr >
                              <th  WIDTH="30" HEIGHT='9' >N°</th>
                              <th >Código</th>
                              <th >Descripción</th>
                              <th >Categoria</th>
                              <th >Subcategoria</th>
                              <th >Opciones</th>
                            </tr>
                        </thead>
                        
                        <tbody >
                            <?php
                              $extraer="SELECT * FROM activo";

                               //$base=mysqli_select_db($con,'finanzas');
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
                                  <td class="text-center">
                                  <div class="col-md-6 text-center">
                                     <form  action="vistaDetalleCompra.php" method="get" class="form-register" > 
                                   <button  type="submit" class="btn btn-danger" id="btnId" name="btnId" style="background-color: transparent border:0" data-toggle="modal"  value="<?php echo $ejecuta['idAc'] ?>" ><i class="fa fa-info"></i></button>
                                   </form>
                                  </div>
                                  <div class="col-md-6 text-center">
                                      <button  type="button" class="btn btn-warning"  onClick="darBaja('<?php echo $ejecuta['idAc']; ?>','Desea dar de baja al Activo','compraactivo','0')"><i class="fa fa-arrow-circle-down"></i> </button>
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
  <script>
        $(function () {
            $('.SEstado').select2()
        });
    </script>
</body>

</html>


    
        
