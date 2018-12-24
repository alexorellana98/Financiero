<?php
require 'conexion.php';
//$con=mysqli_connect('localhost','root','','finanzas');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <title>Ingreso de Compra</title>
  <meta name="description" content="Doodle is a Dashboard & Admin Site Responsive Template by hencework." />
  <meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Doodle Admin, Doodleadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
  <meta name="author" content="hencework"/>
  
  <?php
      include "../Componentes/estilos.php";
  ?>

  <script language="javascript">
 
 function total(){

var cant= $("#cant").val();
var val= $("#prec").val();
$('#tot').val((cant*val));
 }
function envia(){
   window.location="http://localhost/Financiero/siccif/vistas/ActivoFijo/Comprar.php";
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
  <?php 
//Para obtener numero de registro 

   $sentencia = "SELECT * FROM activo  order by idAc desc"; 
   $ejecutar=mysqli_query($mysqli,$sentencia);
   $fila = mysqli_fetch_assoc($ejecutar);

   

 ?>

    <!-- Main Content -->
    <div class="page-wrapper">
            <div class="container-fluid">
        <!-- Title -->
          <div class="row heading-bg">
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
              <h3 align="center" >Ingresar datos de compra</h3>
            </div>
          </div>
          <!-- /Title -->
        
          <div class="row">
            <?php

                    $cont=0;
                    ?>
                    <!-- Row -->
            <div class="col-md-12">
              <div class="panel panel-default card-view">
                  <div class="row">
<h3 align="center" ><?php echo "Nombre de activo:____".$fila['descrip'] ?></h3>
<h3 align="center" ><?php echo "Codigo:_____".$fila['codAct'] ?></h3>
 <div class="col-md-2"></div>


  <div class="col-md-9 col-md-offset-3">
  
            
 <form  action="insert.php" method="post" class="form-register" > 
      
   
 <div class="col-lg-12"">
 

<div class="col-md-6">
<input type="hidden" class="form-control" id="idac" placeholder="Nombre" name="idac"  value="<?php  echo $fila['idAc']; ?>">
<div class="form-group">

  <label for="serie" >Marca:</label>
   <select class="form-control" data-live-search="true" id="marca" name="marca"  >
 
<option> </option>
                     <?php

  $extraer="SELECT * FROM marca";
// $base=mysqli_select_db($con,'finanzas');
$ejecutar=mysqli_query($mysqli,$extraer);


while($ejecuta=mysqli_fetch_array($ejecutar))
{
  
    ?>  
                <option id="ide" value="<?php  echo $ejecuta['idMarca'] ?>" ><?php  echo $ejecuta['nombre'] ?> </option>
                       
    <?php
    
}

?>                   
     
</select> 
  
</div>

<br>
<div class="form-group">

  <label for="serie" >Serie/Placa:</label>
  <div class="input-group">
  <input type="text" class="form-control" id="serie" placeholder="serie" name="serie" >
  <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
</div>
</div>
<br>
<input type="hidden"  class="form-control" id="ubica" name="ubica" placeholder="Nombre" value="<?php echo $fila['idUb'];?>">

<div class="form-group">
  <label for="fecha">Fecha de inicio de uso:</label>
  <div class="input-group">
  <input type="date" class="form-control" id="fecha" name="fecha" >
  <div class="input-group-addon"><span class="glyphicon glyphicon-home"></span></div>
  </div>
</div>
 
 <br>

<div class="form-group">
      <label for="dona">Donacion: </label>
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    <div class="input-group">
     <input type="checkbox" name="dona" id="dona"  value="1">
        </div>
        
      
</div>
</div>






<div class="col-md-6">
<div class="form-group">
 <label for="prov" >Proveedor:</label>
<br>

 <select class="form-control" data-live-search="true" id="prov" name="prov"  >
 

<option> </option>
                     <?php

  $extraer="SELECT * FROM proveedor";

  



// $base=mysqli_select_db($con,'finanzas');
$ejecutar=mysqli_query($mysqli,$extraer);


while($ejecuta=mysqli_fetch_array($ejecutar))
{
  

    ?>  
 
                 <option id="ide" value="<?php  echo $ejecuta['ide'] ?>" ><?php  echo $ejecuta['nombre'] ?> </option>
   
                      
                      
    <?php
    
}



?>                   
     
</select> 



</div>
<br>
<div class="form-group">

  <label for="prec">Precio: </label>
  <div class="input-group">
  <input type="number" class="form-control" id="prec" placeholder="" name="prec" min="0" onchange="total()" >
   <div class="input-group-addon"><span class="glyphicon glyphicon-check"></span></div>
  </div>
</div>
<br>
<div class="form-group">

  <label for="condi">Condicion: </label>
 <select class="form-control" data-live-search="true" id="condi" name="condi" onchange="condic(this.value)">
 <option></option>
<option value="Nuevo">Nuevo </option>
 
<option value="Usado">Usado </option>
</select>
</div>
<br>

<div class="form-group" id="hi" style="display:none;">

  <label for="cant" >Vida util: </label>
  <div class="input-group">
  <input type="number" class="form-control" id="vi" placeholder="Ej: 5" name="vi" min="0">
  <div class="input-group-addon"><span  class="glyphicon glyphicon-user" aria-hidden="true"></span></div>
</div>
</div>

<br>


<br>


</div>


<input  type="hidden" class="form-control" id="ideU" name="ideU" placeholder="Nombre" value="<?php echo $_POST['btnEditar'];?>">

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


 
<div class="col-md-1"></div>

  
</div>
               
                
              </div>
            </div>
          </div>

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
<script type="text/javascript">
//funcion para mostrar el de vida util si esta usado
  function condic(valor){
    if (valor=="Usado") {
    document.getElementById('hi').style.display='block';
    } else {
    document.getElementById('hi').style.display='none';  
    }
  }
</script>
  
  
  <?php
include "../Componentes/scripts.php";
?>
  
</body>

</html>


    
        
