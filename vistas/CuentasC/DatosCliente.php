<?php
require 'conexion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <title>Registrar Cliente</title>
  
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
  $bandera=0;
  ?>                               
<body>  
  <!--Preloader-->
  <div class="preloader-it">
    <div class="la-anim-2"></div>
  </div>
  <!--/Preloader-->
    <div class="wrapper theme-1-active box-layout pimary-color-red">
  <?php
  include "../Componentes/menu.php";
  ?>  

    <!-- Main Content -->
    <div class="page-wrapper">
            <div class="container-fluid">
             <div class="panel panel-success card-view" style="margin-top:20px;">
                <div class="panel-heading text-center">
                    <div class="pull-center">
                        <h6 class="panel-title txt-light"><i class="fa fa-male"></i>  Registro de Cliente</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
<div class="panel-wrapper collapse in">
<div class="panel-body">
<form  action="insert.php" method="post" class="form-register" >
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <select class="form-control selectpicker" name="persona" id="persona" data-style="btn-success btn-outline" onchange="per()">
          <option value="0">Persona Natural</option>
          <option value="1">Persona Juridica</option>
        </select>
    </div>
</div> 

<div class="row">
<div class="col-md-6">
  <label for="nomb" id="noC" >Nombre de Cliente:</label>
  <div class="input-group">
  <input type="text" class="form-control" id="nomb" placeholder="Nombre" name="nomb" required>
  <div class="input-group-addon"><span  class="glyphicon glyphicon-user" aria-hidden="true"></span></div>
</div>
  <label for="nit" id="ni">NIT: </label>
  <div class="input-group">
  <input type="text" class="form-control" id="nit" placeholder="0000-000000-000-0" name="nit" data-mask="9999-999999-999-9" required>
   <div class="input-group-addon"><span class="glyphicon glyphicon-credit-card"></span></div>
  </div>
  <label for="tel" >Telefono:</label>
  <div class="input-group">
  <input type="text" class="form-control" id="tel" placeholder="0000-0000" name="tel" data-mask="9999-9999" required>
  <div class="input-group-addon"><span  class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span></div>
</div>
  <label for="Ocup" id="oc" >Ocupación:</label>
  <div class="input-group">
  <input type="text" class="form-control" id="Ocup" placeholder="Ocupación laboral" name="Ocup" required>
  <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
</div>
  <label for="dir">Dirección:</label>
  <div class="input-group">
  <textarea type="text" class="form-control" id="dir" name="dir" required></textarea> 
  <div class="input-group-addon"><span class="glyphicon glyphicon-home"></span></div>
  </div>
</div>

<div class="col-md-6">
  <label for="repre" >Representante Legal:</label>
  <div class="input-group">
  <input type="text" class="form-control" id="repre" placeholder="Nombre Representante" name="repre" required>
  <div class="input-group-addon"><span  class="glyphicon glyphicon-user" aria-hidden="true"></span></div>
</div>
  <label for="ape" >Apellidos:</label>
  <div class="input-group">
  <input type="text" class="form-control" id="ape" placeholder="Apellidos" name="ape" required>
  <div class="input-group-addon"><span  class="glyphicon glyphicon-user" aria-hidden="true"></span></div>
</div>
  <label for="dui" id="du">DUI:</label>
  <div class="input-group">
  <input type="text" class="form-control sombraCajas" id="dui" placeholder="00000000-0" name="dui" data-mask="99999999-9" required>
   <div class="input-group-addon"><span class="glyphicon glyphicon-credit-card"></span></div>
  </div>
  <label for="depa">Departamento:</label>
 <select class="form-control select2" id="depa" name="depa" > 
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
  <label for="fecha">Fecha de registro:</label>
  <div class="input-group">
  <input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo date("d/m/Y"); ?>" required>
  <div class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></div>
  </div>
</div>
</div>
<div class="row" style="margin-top:20px;">
<div class="button-group text-center">
<?php include '../Componentes/BtnGuardarCancelar.php'; ?>
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
  
  <script language="javascript">
function per(){
var val=document.getElementById("persona").value;
if(val==0){
document.querySelector('#noC').innerText="Nombre de Cliente:";
document.querySelector('#du').innerText="DUI:";
document.querySelector('#ni').innerText="NIT:";
document.querySelector('#oc').innerText="Ocupación:";
document.getElementById('Ocup').placeholder="Ocupación Laboral";
document.getElementById('a1').style.display='block';
document.getElementById('a2').style.display='none';
}else{
document.querySelector('#noC').innerText="Nombre de Empresa:";
document.querySelector('#du').innerText="DUI de Representante:";
document.querySelector('#ni').innerText="NIT de Empresa:";
document.querySelector('#oc').innerText="Giro:";
document.getElementById('Ocup').placeholder="Giro de Empresa";
document.getElementById('a1').style.display='none';
document.getElementById('a2').style.display='block';
}
}
</script>

<?php
include "../Componentes/scripts.php";
?>
  <script src="../dist/js/pages/privilegios.js"></script>
 
</body>

</html>


    
        
