<?php
require 'conexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <title>Editar Cliente</title>
  <meta name="description" content="Doodle is a Dashboard & Admin Site Responsive Template by hencework." />
  <meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Doodle Admin, Doodleadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
  <meta name="author" content="hencework"/>
  
  <?php
      include "../Componentes/estilos.php";
  ?>

  <script language="javascript">
 
 
function envia(){
   window.location="http://localhost/Financiero/siccif/vistas/CuentasC/RegistroCliente.php";
  }
</script>
</head>
<?php 
   $aux=$_POST['btnEditar'];
   $sentencia = "SELECT * FROM cliente WHERE idCliente=$aux"; 
   $ejecutar=mysqli_query($mysqli,$sentencia);
   $fila = mysqli_fetch_assoc($ejecutar);

   $dep1=$fila['depa'];
   $ti=$fila['tipo'];
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
              <h3 align="center" >Editar Cliente</h3>
            </div>
          </div>
          <!-- /Title -->
      
            
                    <?php

                    $cont=0;
                    ?>
                    <!-- Row -->
        <div class="row">
          <div class="col-sm-12">
            <div class="panel panel-default card-view">
              
               <form  action="editar.php" method="post" class="form-register" > 
   
 <div class="col-lg-12 col-md-offset-2">
 
<div class="col-md-6">
<div class="input-group">
<?php if($fila['repre']==""){?>
  <?php ?>
  <label for="nomb" >Nombre de Cliente:</label>
  <?php }else{?>
  <?php ?>
  <label for="nomb" >Nombre de Empresa:</label>
  <?php }?>
  <div class="input-group">
  <input type="text" class="form-control" id="nomb" readonly="true" placeholder="Nombre" name="nomb" value="<?php echo $fila['nombre'];?>">
  <div class="input-group-addon"><span  class="glyphicon glyphicon-user" aria-hidden="true"></span></div>
</div>
</div>


<br>


 <div class="input-group">

  <label for="nit">NIT:</label>
  <div class="input-group">
  <input type="text" class="form-control" id="nit" readonly="true" placeholder="0000-000000-000-0" name="nit" value="<?php echo $fila['nit'];?>">
   <div class="input-group-addon"><span class="glyphicon glyphicon-credit-card"></span></div>
  </div>
</div>
 

<br>

<div class="input-group">

  <label for="tel" >Telefono:</label>
  <div class="input-group">
  <input type="text" class="form-control" id="tel" placeholder="Ej:0000-0000" name="tel" value="<?php echo $fila['tel'];?>">
  <div class="input-group-addon"><span  class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span></div>
</div>
</div>

<br>
 <div class="input-group">
<?php if($fila['repre']==""){?>
  <?php ?>
  <label for="Ocup" >Ocupación:</label>
  <?php }else{?>
  <?php ?>
  <label for="Ocup" >Giro:</label>
  <?php }?>
  
  <div class="input-group">
  <input type="text" class="form-control" id="Ocup" placeholder="Ocupación laboral" name="Ocup" value="<?php echo $fila['ocupacion'];?>">
  <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
</div>
</div>


<br>
 

<div class="input-group">
  <label for="dir">Dirección:</label>
  <div class="input-group">
  <textarea type="text" class="form-control" id="dir" name="dir" style="width:300px;" value=""><?php echo $fila['direc'];?></textarea> 
  <div class="input-group-addon"><span class="glyphicon glyphicon-home"></span></div>
  </div>
</div>
<br>


</div>






<div class="col-md-6">

<?php if($fila['repre']==""){?>
  <?php ?>
  <div class="input-group">

  <label for="ape" >Apellidos:</label>
  <div class="input-group">
  <input type="text" class="form-control" id="ape" placeholder="Apellidos" name="ape"  value="<?php echo $fila['apellido'];?>">
  <div class="input-group-addon"><span  class="glyphicon glyphicon-user" aria-hidden="true"></span></div>
</div>
</div>
  <?php }else{?>
  <?php ?>
 <div class="input-group">

  <label for="ape" >Representante Legal:</label>
  <div class="input-group">
  <input type="text" class="form-control" id="repre" placeholder="representante" name="repre"  value="<?php echo $fila['repre'];?>">
  <div class="input-group-addon"><span  class="glyphicon glyphicon-user" aria-hidden="true"></span></div>
</div>
</div>
  <?php }?>

<br>
<div class="input-group">

  <label for="dui">DUI:</label>
  <div class="input-group">
  <input type="text" class="form-control" id="dui" readonly="true" placeholder="00000000-0" name="dui" value="<?php echo $fila['dui'];?>">
   <div class="input-group-addon"><span class="glyphicon glyphicon-credit-card"></span></div>
  </div>
</div>


<br>

<div class="form-group" style="width:220px;">

  <label for="depa">Departamento:</label>
 <select class="form-control" data-live-search="true" id="depa" name="depa" value="<?php echo $fila['depa'];?>" >
<option></option> 
<option value="San Salvador" >San Salvador</option>
 <option value="San Vicente" >San Vicente</option>
 <option value="Morazán" >Morazan</option>
 <option value="Ahuachapán" >Ahuachapan</option>
 <option value="La Union" >La Union</option>
 <option value="La Libertad" >La Libertad</option>
 <option value="La Paz" >La Paz</option>
 <option value="San Miguel" >San Miguel</option>
 <option value="Santa Ana" >Santa Ana</option>
 <option value="Sonsonate" >Sonsonate</option>
 <option value="Usulutan" >Usulutan</option>
 <option value="Cabañas" >Cabañas</option>
 <option value="Chalatenango" >Chalatenango</option>
 <option value="Cuscatlán">Cuscatlan</option>
</select>
</div>
<br>
<br>

<div class="input-group">
  <label for="fecha">Fecha de registro:</label>
  <div class="input-group">
  <input type="text" class="form-control" id="fecha" readonly="true" name="fecha" value="<?php echo $fila['fecha'];?>">
  <div class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></div>
  </div>
</div>
<br>
<div class="form-group" style="width:220px;">
  <label for="tipo">Tipo:</label>
  <select name="tipo" id="tipo" class="form-control">
  <option></option>
    <option value="1">Normal</option>
    <option value="2">Moroso</option>
    <option value="3">Incobrable</option>
  </select>
  </div>
</div>



</div>



<input  type="hidden" class="form-control" id="ideC" name="ideC" placeholder="Nombre" value="<?php echo $_POST['btnEditar'];?>"> 
  <div class="col-lg-12 col-md-offset-5">
<br>
<br> 
<div class="button-group">
<button type="submit" class="btn btn-success">Guardar</button>
<button type="button" class="btn btn-success" data-dismiss="modal" onclick="envia()">Cancelar</button>
</div>
</div>
</form>
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
  window.onload=function(){
    var de=<?php echo json_encode($dep1); ?>;
    var tip=<?php echo json_encode($ti); ?>;
    document.getElementById('depa').value=de;
    document.getElementById('tipo').value=tip;
  }
</script>
  
</body>

</html>


    
        
