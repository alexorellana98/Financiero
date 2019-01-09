<?php
require 'conexion.php';
//$con=mysqli_connect('localhost','root','','finanzas');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <title>Registrar Cliente</title>
  
  <?php
      include "../Componentes/estilos.php";
  ?>

  <script language="javascript">
    $(function () {
      $.mask.definitions['~'] = "[+-]";
      $("#date").mask("99/99/9999", {completed: function () {
        alert("completed!");
      }});
      $("#tel").mask("9999-9999");
      $("#dui").mask("09999999-9");
      $("#nit").mask("9999-999999-999-9");
      $("input").blur(function () {
        $("#info").html("Unmasked value: " + $(this).mask());
      }).dblclick(function () {
        $(this).unmask();
      });
    });
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
             <div class="panel panel-success card-view" style="margin-top:20px;">
                <div class="panel-heading text-center">
                    <div class="pull-center">
                        <h6 class="panel-title txt-light"><i class="fa fa-male"></i>  Registro de Cliente</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                    <?php     $cont=0;          ?>
                    <form  action="insert.php" method="post" class="form-register" > 
 <div class="col-lg-12 col-md-offset-2">
<div class="col-md-6">
<div class="form-group">
  <select class="form-control STipoPersona" name="persona" id="persona" onchange="per(this.value)">
  <option value="0">Persona Natural</option>
  <option value="1">Persona Juridica</option>
</select>
</div>
<div class="input-group">

  <label for="nomb" id="noC" >Nombre de Cliente:</label>
  <div class="input-group">
  <input type="text" class="form-control" id="nomb" placeholder="Nombre" name="nomb" >
  <div class="input-group-addon"><span  class="glyphicon glyphicon-user" aria-hidden="true"></span></div>
</div>
</div>


<br>

<div class="input-group">
  <label for="nit" id="ni">NIT: </label>
  <div class="input-group">
  <input type="text" class="form-control" id="nit" placeholder="0000-000000-000-0" name="nit">
   <div class="input-group-addon"><span class="glyphicon glyphicon-credit-card"></span></div>
  </div>
</div>

<br>

<div class="input-group">

  <label for="tel" >Telefono:</label>
  <div class="input-group">
  <input type="text" class="form-control" id="tel" placeholder="0000-0000" name="tel" >
  <div class="input-group-addon"><span  class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span></div>
</div>
</div>

<br>
 <div class="input-group">

  <label for="Ocup" id="oc" >Ocupación:</label>
  <div class="input-group">
  <input type="text" class="form-control" id="Ocup" placeholder="Ocupación laboral" name="Ocup" >
  <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
</div>
</div>


<br>
 

<div class="input-group">
  <label for="dir">Dirección:</label>
  <div class="input-group">
  <textarea type="text" class="form-control" id="dir" name="dir" style="width:300px;"></textarea> 
  <div class="input-group-addon"><span class="glyphicon glyphicon-home"></span></div>
  </div>
</div>
<br>


</div>






<div class="col-md-6">

<br>
<br>
<div class="input-group" id="a2" style="width:220px; display:none;">

  <label for="repre" >Representante Legal:</label>
  <div class="input-group">
  <input type="text" class="form-control" id="repre" placeholder="Nombre Representante" name="repre" >
  <div class="input-group-addon"><span  class="glyphicon glyphicon-user" aria-hidden="true"></span></div>
</div>
</div>
<div class="input-group" id="a1" style="width:220px;">

  <label for="ape" >Apellidos:</label>
  <div class="input-group">
  <input type="text" class="form-control" id="ape" placeholder="Apellidos" name="ape" >
  <div class="input-group-addon"><span  class="glyphicon glyphicon-user" aria-hidden="true"></span></div>
</div>
</div>
<br>
<div class="input-group">

  <label for="dui" id="du">DUI:</label>
  <div class="input-group">
  <input type="text" class="form-control sombraCajas" id="dui" placeholder="00000000-0" name="dui">
   <div class="input-group-addon"><span class="glyphicon glyphicon-credit-card"></span></div>
  </div>
</div>

<br>

<div class="form-group" style="width:220px;">

  <label for="depa">Departamento:</label>
 <select class="form-control SDepartamento" data-live-search="true" id="depa" name="depa" >
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
  <input type="text" class="form-control" id="fecha" name="fecha" value="<?php echo date("Y/m/d"); ?>">
  <div class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></div>
  </div>
</div>

</div>

</div>
<div class="button-group text-center">
<button type="submit"  class="btn btn-info btn-lable-wrap left-label"> <span class="btn-label"><i class="fa fa-save"></i> </span><span class="btn-text">Guardar</span></button>
        <button type="button"  class="btn btn-danger btn-lable-wrap left-label" data-dismiss="modal" onclick="envia()"> <span class="btn-label"><i class="fa fa-close"></i> </span><span class="btn-text">Cerrar</span></button>
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
    function per(val){
     
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
  <script>
        $(function () {
            $('.STipoPersona').select2()
            $('.SDepartamento').select2()
        });
</script>
  <script src="../dist/js/pages/privilegios.js"></script>
 
</body>

</html>


    
        
