<?php
require 'conexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <title>Subcategoria</title>
  
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
                    <h3 class="panel-title panel-center txt-light"><i class="fa fa-wrench"></i>  Gestionar  Sub-Categorias</h3>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-5">
								 	<div class="form-group">
								 	<button class="btn btn-primary btn-lable-wrap left-label" data-toggle="modal" data-target="#ModalRegistarProveedor"> <span class="btn-label"><i class="fa fa-plus"></i> </span><span class="btn-text">Ingresar Sub-Categoria</span></button>
								 	</div>
								</div>
                                
                                <div class="col-md-1">
                                    <button class="btn  btn-default btn-outline">Estado</button>
                                </div>
							  	<div class="col-md-2">
									<div class="form-group">                                     
							 			<select class="form-control SEstado" data-live-search="true" id="condi" name="condi" onchange="sele()">
											<option value="1" >Activo</option>											 
											<option value="0">Inactivo </option>
										</select>
									</div>
								</div> 
                    </div>
                </div>
                </div>
                </div>
            <div class="row">
                    <?php

                    $cont=0;
                    ?>
                    <!-- Row -->
        <div class="row" style="margin-left:1px; margin-right:1px;">
          <div class="col-sm-12">
            <div class="panel panel-default card-view">
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
<form  action="insert.php" method="post" class="form-register" > 
    <div class="modal-content">
    <div class="color-moduloInventario">
       <div class="modal-body">
       <div class="panel panel-success card-view">
<div class="panel-heading text-center">
    <div class="pull-center" >
    <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="panel-title panel-center txt-light">Registrar Categoria</h2>
    </div>
    <div class="clearfix"></div>
</div>
<div class="panel-wrapper collapse in">
    <div class="panel-body">
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
  <input type="text" class="form-control" id="nombsub" name="nombsub" placeholder="Nombre" required>
  <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
</div>
</div>
<br>

<div class="form-group">
 <label for="nomcatego" >Elija una categoria:</label>
<br>
 <select class="form-control STipoCategoria" data-live-search="true" id=" nomcatego" name="nomcatego" onchange="cod(this.value)">
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
           </div>
           </div>
 </div>
  
 <div class="modal-footer">
      <?php include '../Componentes/BtnGuardarCancelar.php'; ?>
  
        </div>
      </div>
    </div>
      </form>
 </div>
 </div>

<!--Fin modal Registrar Proveedor-->
    


         </div>
        <!-- Fin Row -->
      </div>
    <!-- /#wrapper -->
        <!-- Footer -->
        <?php include '../Componentes/footer.php'; ?>
        <!-- /Footer -->
      </div>
    </div>
        <!-- /Main Content -->
  
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
            $('.STipoCategoria').select2()
        });
    </script>
</body>

</html>


    
        
        