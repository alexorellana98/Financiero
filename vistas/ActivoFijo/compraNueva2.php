<?php
require 'conexion.php';
//$con=mysqli_connect('localhost','root','','finanzas');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <title>Ingresar Activo</title>
  <meta name="description" content="Doodle is a Dashboard & Admin Site Responsive Template by hencework." />
  <meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Doodle Admin, Doodleadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
  <meta name="author" content="hencework"/>
  
  <?php
      include "../Componentes/estilos.php";
  ?>

  <script language="javascript">
 
 
function envia(){
   window.location="http://localhost/Financiero/siccif/vistas/ActivoFijo/Comprar.blade.php";


  }
function limpia(){
   window.location="http://localhost/Financiero/siccif/vistas/ActivoFijo/compraNueva2.php";


  }
  

function enviacod(){
  var v2= $("#codigo").val();
$('#codi').val(v2);
}

  function recibe()
  {
    
//var oculto= $("#codCatego2").val();

  var dep= $("#dep1").val();
  var ins= $("#idIns").val();
  var act= $("#idActivo").val();
  var sub= $("#sub").val();
  var ub= $("#ubica").val();
if (dep=="" || sub=="" || ub=="") {

 alert("Ingrese todos los datos");
}
else{
$('#codigo').val(ins+"-"+ub+"-"+sub+"-"+"00"+act);
var v1= $("#cat ").val();
$('#idcat').val(v1);
 $('#ubica2').val(ub);
$('#codi').val(ins+"-"+ub+"-"+sub+"-"+"00"+act);
}


  }

  
</script>
</head>
<?php
if (!empty($_GET['btnalta1']))  {
//activa el activo 
$est=1;
$var=$_GET['btnalta1'];
$sql = " UPDATE categoria set estado='$est' WHERE idCat='$var'";
$resultado = $mysqli->query($sql); 
}
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
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
              <h3 align="center" >Ingresar Activo</h3>
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
                
                <div class="panel-wrapper collapse in">
                <div class="panel-body">
                  <div class="table-wrap">
                      <div class="row">

                           <div class="col-md-2"></div>


                            <div class="col-md-9 ">
                             
                                 
                             
                           <div class="col-lg-12 "">
                           

                          <div class="col-md-6">
                          <?php 
                          //Para obtener numero de registro ultimo

                             $sentencia = "SELECT * FROM activo  order by idAc desc"; 
                             $ejecutar=mysqli_query($mysqli,$sentencia);
                             $fila = mysqli_fetch_assoc($ejecutar);

                             $sentencia2= "SELECT * FROM institucion "; 
                             $ejecutar2=mysqli_query($mysqli,$sentencia2);
                             $fila2 = mysqli_fetch_assoc($ejecutar2);

                           ?>
                           <input type="hidden"  class="form-control" id="idIns" name="idIns" placeholder="Nombre" value="<?php echo $fila2['codigo'];?>">
                          <input  type="hidden" class="form-control" id="idActivo" name="idActivo" placeholder="Nombre" value="<?php echo $fila['idAc']+1;?>">

                          <div class="form-group">
                           <label for="cat" >Elija una categoria:</label>
                          <br>
                          <form  action="compraNueva2.php" method="post" class="form-register" > 
                           <select class="form-control" data-live-search="true" id="cat" name="cat" onchange="this.form.submit()" >
                           

                                               <?php

                           $a1=$_POST['cat'];                  
                          //onclick="envia(this.value); 
                          if (!empty($a1)) {
                            $extraer="SELECT * FROM categoria WHERE idCat=$a1";
                          }
                          else{
                            $extraer="SELECT * FROM categoria";
                            ?>
                            <option > </option>
                            <?php
                            
                          }


                          // $base=mysqli_select_db($con,'finanzas');
                          $ejecutar=mysqli_query($mysqli,$extraer);


                          while($ejecuta=mysqli_fetch_array($ejecutar))
                          {
                            if (($ejecuta['estado'])==1) {

                              ?>  
                           
                                           <option id="ide" value="<?php  echo $ejecuta['idCat'] ?>" ><?php  echo $ejecuta['nombre'] ?> </option>
                             
                                   
                               
                                    
                                                
                              <?php
                              $a2=$ejecuta['cod'];
                          }
                          }

                          //echo "<script>function envia(v){";



                          // echo " } </script>";

                           //$('#nomb').val(v);


                          ?>  

                          </select> 

                            </form>

                          </div>
                             


                          <div class="form-group">
                           <label for="ubica" >Elija ubicacion:</label>
                          <br>

                           <select class="form-control" data-live-search="true" id="ubica" name="ubica"  >
                           
                          <option> </option>
                                               <?php

                            $extraer="SELECT * FROM ubicacion";
                          // $base=mysqli_select_db($con,'finanzas');
                          $ejecutar=mysqli_query($mysqli,$extraer);


                          while($ejecuta=mysqli_fetch_array($ejecutar))
                          {
                            if (($ejecuta['estado'])==1) {
                              ?>  
                                          <option id="ide" value="<?php  echo $ejecuta['codU'] ?>" ><?php  echo $ejecuta['nombre'] ?> </option>
                                                 
                              <?php
                             } 
                          }

                          ?>                   
                               
                          </select> 

                          </div>


                          <div class="form-group">

                            <label for="codigo" >Código:</label>
                            <div class="input-group">
                            <input type="text" readonly="readonly" class="form-control" id="codigo"  name="codigo" >
                            <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true" ></span></div>
                          </div>
                          </div>

                          <br>
                          <br>



                          </div>


                          <form  action="insert.php" method="post" class="form-register" > 

                          <div class="col-md-6">

                          <input type="hidden" class="form-control" id="ubica2" placeholder="Nombre" name="ubica2" >

                          <input type="hidden" class="form-control" id="idcat" placeholder="Nombre" name="idcat" >
                          <input  type="hidden" class="form-control" id="codi" placeholder="Nombre" name="codi" >


                          <div class="form-group">
                           <label for="sub" >Elija una subcategoria:</label>
                          <br>
                           <select class="form-control" data-live-search="true" id="sub" name="sub" >
                           <option ></option>
                          <?php

                          if (!empty($a1)) {
                          $extraer="SELECT * FROM subcategoria WHERE idcat='$a1'";

                           //$base=mysqli_select_db($con,'finanzas');
                          $ejecutar=mysqli_query($mysqli,$extraer);


                          while($ejecuta=mysqli_fetch_array($ejecutar))
                          {
                            if (($ejecuta['estado'])==1) {
                           ?>    

                                      <option  id="ide2" value="<?php  echo $ejecuta['codigo'] ?>" ><?php  echo $ejecuta['nombre'] ?> </option>

                           <?php
                          }
                             }
                          }else{

                              ?>
                              
                              <?php
                             }
                                             
                             
                          ?>                    
                                            
                               
                          </select>                 
                                 
                                     
                          </div>




                             

                          <div class="form-group">

                            <label for="des">Descripcion </label>
                            <div class="input-group">
                            <input type="text" class="form-control" id="des" placeholder="EJ:NISSAN 2018" name="des">
                             <div class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></div>
                            </div>
                          </div>



                          </div>


                          <input  type="hidden" class="form-control" id="ideU" name="ideU" placeholder="Nombre" value="<?php echo $_POST['btnEditar'];?>">


                          <div class="col-lg-12 col-md-offset-2">

                          <br> 
                          <div class="button-group">
                          <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="recibe()" >Calcular Codigo de activo</button>
                          <button type="button" class="btn btn-success" data-dismiss="modal" onclick="limpia()" >limpiar</button>
                          <button type="submit" class="btn btn-success" >Siguiente Paso</button>
                          <button type="button" class="btn btn-success" data-dismiss="modal" onclick="envia()">Cancelar</button>
                          </div>
                          </div>
                          </form>
                            

                          </div>

                           </div> 

                          <div class="col-md-1"></div>


                           </div>
                  </div>
                </div>
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

  
  
  <?php
include "../Componentes/scripts.php";
?>
  
</body>

</html>


    
        
