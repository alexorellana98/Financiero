<?php
require 'conexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <title>Creditos</title>
  <?php
      include "../Componentes/estilos.php";
  ?>

  <script language="javascript">
    function sele(){
      var cond= $("#condi").val();
      if (cond==1) {
        window.location="creditos.php";
      }
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
                    <h3 class="panel-title panel-center txt-light"><i class="fa fa-wrench"></i>  Gestionar Tipos de Creditos</h3>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                 <?php
                    $cont=0;
                    ?>
                <div class="row text-center">
                  <div class="form-group">
                    <button class="btn btn-primary btn-lable-wrap left-label" data-toggle="modal" data-target="#ModalRegistarCredito"> <span class="btn-label"><i class="fa fa-plus"></i> </span><span class="btn-text">Nuevo Credito</span></button>
                  </div>
                    </div>
                    <div class="row">
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
                                <td class="text-center">
                                  <form   action="../CuentasC/editarCreditos.php" method="post" class="form-register" > 
                                  <button   type="submit" class="btn btn-danger" id="btnEditar" name="btnEditar"  data-toggle="modal"  value="<?php echo $ejecuta['idCre']?>" ><i class="fa fa-edit"></i></button>
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
           

       <!--Modal  Registrar -->
<div id="ModalRegistarCredito" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
<form  action="insert.php" method="post" class="form-register" > 
    <div class="modal-content">
    <div class="color-moduloInventario">
       <div class="modal-body">
<div class="panel panel-success card-view">
<div class="panel-heading text-center">
    <div class="pull-center" >
    <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="panel-title panel-center txt-light">Registrar Credito</h2>
    </div>
    <div class="clearfix"></div>
</div>
<div class="panel-wrapper collapse in">
    <div class="panel-body">
    <div class="row">

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
  <select class="form-control STipoGarantia" data-live-search="true" name="gara" id="gara" >
    <option value="Aval">Aval</option>
    <option value="Hipotecaria">Hipotecaria</option>
  </select>  

</div>
</div>


 </div>
									</div>
								</div>
							</div>
		
 
  
 <div class="modal-footer">
        <button type="submit"  class="btn btn-info btn-lable-wrap left-label"> <span class="btn-label"><i class="fa fa-save"></i> </span><span class="btn-text">Guardar</span></button>
        <button type="button"  class="btn btn-danger btn-lable-wrap left-label" data-dismiss="modal"> <span class="btn-label"><i class="fa fa-ban"></i> </span><span class="btn-text">Cerrar</span></button>
        </div>
      </div>
      </div>
 </div>
 </form>
 </div>

<!--Fin modal Registrar Proveedor-->
        
        <div class="col-md-1"></div>


        
      </div>
    <!-- /#wrapper -->
        <!-- Footer -->
        <?php include '../Componentes/footer.php'; ?>
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
            $('.STipoGarantia').select2()
        });
    </script>
</body>

</html>


    
        
