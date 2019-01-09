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
  
  <?php
      include "../Componentes/estilos.php";
  ?>
  <script language="javascript">
function envia(){
   window.location="http://localhost/Financiero/siccif/vistas/CuentasC/creditos.php";
  }
</script>
</head>
<?php 
   $aux=$_POST['btnEditar'];
   $sentencia = "SELECT * FROM creditos WHERE idCre=$aux"; 
   $ejecutar=mysqli_query($mysqli,$sentencia);
   $fila = mysqli_fetch_assoc($ejecutar);

   $garanti=$fila['garantia'];
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
       <div class="panel panel-warning card-view" style="margin-top: 20px;">
       
								<div class="panel-heading text-center">
									<div class="pull-center" >
										<h3 class="panel-title panel-center txt-light"><i class="fa fa-edit"></i>  Editar Credito</h3>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										 <form  action="editar.php" method="post" class="form-register" > 
                <div class="col-md-8 col-md-offset-1">
                  <div class="col-md-6 ">
                    <div class="form-group">
                      <label for="nombcre" >Nombre de Credito:</label>
                      <div class="input-group">
                        <input type="text" class="form-control" readonly="true" id="nombcre" name="nombcre" placeholder="Nombre" value="<?php echo $fila['tipo'];?>">
                        <div class="input-group-addon">
                          <span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="minip" >Mínimo a Prestar:</label>
                      <div class="input-group">
                        <input type="number" class="form-control" id="minip" name="minip" placeholder="100" value="<?php echo $fila['cmin'];?>">
                        <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inter">Interes Anual(%):</label>
                      <div class="input-group">
                        <input type="number" class="form-control" id="inter" name="inter" value="<?php echo $fila['interes'];?>">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-briefcase"></span></div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="pmax" >Plazo Máximo:</label>
                      <div class="input-group">
                        <input type="text" class="form-control" id="pmax" name="pmax" value="<?php echo $fila['plazom'];?>">
                        <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="maxp">Máximo a Prestar:</label>
                      <div class="input-group">
                        <input type="text" class="form-control" id="maxp" name="maxp" value="<?php echo $fila['cmax'];?>">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-briefcase"></span></div>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="gara">Tipo de Garantía:</label>
                      <br>
                      <select class="form-control STipoGarantia" data-live-search="true" name="gara" id="gara" value="<?php echo $fila['garantia'];?>">
                        <option ></option>
                        <option value="Aval">Aval</option>
                        <option value="Hipotecaria">Hipotecaria</option>
                      </select>  

                    </div>
                  </div>

                
                
                  <input  type="hidden" class="form-control" id="idCre" name="idCre" placeholder="Nombre" value="<?php echo $_POST['btnEditar'];?>">

                  <div class="col-lg-12 col-md-offset-4">
                    <br>
                    <br> 
                    <div class="button-group">
                     <button type="submit"  class="btn btn-info btn-lable-wrap left-label"> <span class="btn-label"><i class="fa fa-save"></i> </span><span class="btn-text">Guardar</span></button>
                        <button type="button"  class="btn btn-danger btn-lable-wrap left-label" data-dismiss="modal" onclick="envia()"> <span class="btn-label"><i class="fa fa-ban"></i> </span><span class="btn-text">Cerrar</span></button>
                        
                    </div>
                  </div>
                </div>
              </form>
									</div>
								</div>
							</div>
							
        <!-- Footer -->
        <?php include '../Componentes/footer.php'; ?>
        <!-- /Footer -->
        </div>
      </div>
    </div>
  <?php
include "../Componentes/scripts.php";
?>
 <script>
        window.onload=function(){
          var de=<?php echo json_encode($garanti); ?>;
          document.getElementById('gara').value=de;
        }
      </script>
<script src="../dist/js/pages/privilegios.js"></script>
  <script>
        $(function () {
            $('.STipoGarantia').select2()
        });
    </script>
</body>

</html>


    
        
