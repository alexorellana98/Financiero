<?php
require 'conexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <title>Adquisición de activo fijo</title>
  
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
                    <h3 class="panel-title panel-center txt-light"><i class="fa fa-wrench"></i>  Gestionar  Adquisición de Activo Fijo</h3>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-5">
								 	<div class="form-group">
								 	<button class="btn btn-primary btn-lable-wrap left-label" data-toggle="modal" data-target="#ModalRegistarProveedor"> <span class="btn-label"><i class="fa fa-plus"></i> </span><span class="btn-text">Registrar Activo</span></button>
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

                    <?php          $cont=0;              ?>

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
                        
<!--Modal  Registrar -->
<div id="ModalRegistarProveedor" class="modal fade" role="dialog">
<div class="modal-dialog modal-lg">
<form  action="insert.php" method="post" class="form-register" > 
<div class="modal-content">
<div class="modal-body">
<div class="panel panel-success card-view">
<div class="panel-heading text-center">
<div class="pull-center" >
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h2 class="panel-title panel-center txt-light">Registrar Activo</h2>
</div>
<div class="clearfix"></div>
</div>
<div class="panel-wrapper collapse in">
<div class="panel-body">
<div class="row">
</div> 
</div>
</div>
</div>
</div> 
<div class="modal-footer">
<?php include '../Componentes/BtnGuardarCancelar.php'; ?>
</div>
</div>
</form>
</div>
</div>
          

        <!--Fin modal Registrar Proveedor-->
        
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
  <script>
        $(function () {
            $('.SEstado').select2()
        });
    </script>
</body>

</html>


    
        
