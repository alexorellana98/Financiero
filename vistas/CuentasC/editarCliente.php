<?php
require 'conexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <title>Editar Cliente</title>
  
  <?php
      include "../Componentes/estilos.php";
  ?>

  <script language="javascript">
 
 
function envia(){
   window.location="RegistroCliente.php";
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
            <div class="panel panel-warning card-view" style="margin-top:20px;">
                <div class="panel-heading text-center">
                    <div class="pull-center">
                        <h6 class="panel-title txt-light"><i class="fa fa-edit"></i>  Editar Cliente</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
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
  <div class="text-center">
<br>
<br> 
<div class="button-group">
<button type="submit"  class="btn btn-info btn-lable-wrap left-label"> <span class="btn-label"><i class="fa fa-save"></i> </span><span class="btn-text">Guardar</span></button>
        <button type="button"  class="btn btn-danger btn-lable-wrap left-label" data-dismiss="modal" onclick="envia()"> <span class="btn-label"><i class="fa fa-close"></i> </span><span class="btn-text">Cerrar</span></button>
</div>
</div>
</form>
                    </div>
                </div>
                </div>
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
  window.onload=function(){
    var de=<?php echo json_encode($dep1); ?>;
    var tip=<?php echo json_encode($ti); ?>;
    document.getElementById('depa').value=de;
    document.getElementById('tipo').value=tip;
  }
</script>
  
</body>

</html>


    
        
