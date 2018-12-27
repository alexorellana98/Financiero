<?php
require 'conexion.php';
//$con=mysqli_connect('localhost','root','','finanzas');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>Depreciar</title>
	<meta name="description" content="Doodle is a Dashboard & Admin Site Responsive Template by hencework." />
	<meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Doodle Admin, Doodleadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
	<meta name="author" content="hencework"/>
	
	<?php
	  	include "../Componentes/estilos.php";
	?>

	<script language="javascript">
		function envia(){
		   window.location="http://localhost/Financiero/siccif/vistas/ActivoFijo/VistaActivo.php";
		  }

		function envia1(){
		   window.location="http://localhost/Financiero/siccif/vistas/ActivoFijo/depreciar.php";
		  }
		 //funcion para que la tabla se llene dinamicamente
		  
		   
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
    $aux2=$_GET['boton'];
   $sentencia2 = "SELECT * FROM detalle_activo WHERE activofijo_id='$aux2'"; 
   $ejecutar2=mysqli_query($mysqli,$sentencia2);
   $fila1 = mysqli_fetch_assoc($ejecutar2);
   
   $senten2 = "SELECT idCat FROM activo WHERE idAc='$aux2'"; 
   $ejecu2=mysqli_query($mysqli,$senten2);
   $fil2 = mysqli_fetch_assoc($ejecu2);
   $senten1 = "SELECT * FROM categoria WHERE idCat='$fil2[idCat]'"; 
   $ejecu1=mysqli_query($mysqli,$senten1);
   $fil1 = mysqli_fetch_assoc($ejecu1);

   $precio=$fila1['valor_historico'];
   $res=$fil1['val'];
   $residual=$precio*($res/100);
   $dep=$precio-$residual;
   ?>

		<!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid">
				<!-- Title -->
					<div class="row heading-bg">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						   <h2 align="center" >Depreciacion</h2>
						</div>
					</div>
					<!-- /Title -->
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							
							<div class="row">
								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="x_panel">
										<div class="x_title">
											<h3 align="center">Precio: <?php echo $fila1['valor_historico']?>&nbsp;&nbsp; Valor Residual:<?php echo $residual?>&nbsp;&nbsp; Valor a Depreciar:<?php echo $dep?></h3 align="center">
											<div class="clearfix"></div>
										</div>
										<div class="col-md-12  col-sm-12 col-xs-12">
											<?php for ($i=0; $i <2 ; $i++) { 				
												?>
												&nbsp;
												<?php 
											}
											?>

											<button type="button" onclick="fecha()" class="btn btn-danger">CALCULAR</button> <button type="button" onclick="calcular('1','0','0')" class="btn btn-info">AÑO</button> <button type="button" onclick="calcular('2','0','0')" class="btn btn-info">MES</button> <button type="button" onclick="calcular('3','0','0')" class="btn btn-info">DIAS</button>

											<div class="col-md-4 col-sm-4 col-xs-12">

							           
							<input type="hidden" value="<?php echo $dep?>" id="valor" name="valor">
							<input type="hidden" value="<?php echo $fila1['vidautil_restante']?>" id="vida" name="vida">
							<div id="oculta" style='display:none';>
							<input type="date" id="fecha_inicio" name="fecha_inicio" class="form-control"  value="<?php echo $fila1['fecha_inicio']?>">
							</div>
							 <input type="date" id="fecha" name="fecha" min="<?php echo $fila1['fecha_inicio']?>" class="form-control"  value="<?php echo $fila1['fecha_inicio']?>">
							 

							                  
							                  </div>
									
											
										</div>
										<div class="row">
										<div class=" col-md-12">
										<div class="x_content">	<br />

											<div class="w3-container table-responsive">

												<table id="tabla" class="table table-list-search table-bordered table-hover">
													<thead>
														<tr class="w3-text-black ">
															<th data-column-id="id" data-type="numeric" data-order="asc">Año/Mes/Dia</th>
															<th data-column-id="codigo">Cuota a depreciar</th>
															<th data-column-id="nombre">Depreciación acumulada</th>
															<th data-column-id="vida_util">Valor en Libro</th>

														</tr>
													</thead>
													<tbody>

													</tbody>
												</table>	

												</div>
											</div>					
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>	
					</div>
				</div>
				<!-- /Row -->
										
				
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
	
	<script language="javascript">

	function calcular(cantidad, centinela, cont){
		contar();
		var valor=$("#valor").val();
		var vida=$("#vida").val();
		var ciclo=0;
		var v=0;


		if(vida>0){

			if(cantidad==1){
				ciclo=vida;

			}else if(cantidad==2){
				ciclo=12*vida;

			}else{
				ciclo=365*vida;

			}
						

			var cuota=valor/ciclo;
			var aux=0;
			if(cont==1){
				ciclo=centinela;
			}

			for ($i = 1; $i <=ciclo;  $i++){
				aux=aux+cuota;
				valor=valor-cuota;
				var v1 = Math.abs(valor);
				filas($i,cuota,aux,v1);

			}

		}

	}

	function filas(i, cuota, aux, valor){

		  var cuota=cuota.toFixed(2);
			var	aux=aux.toFixed(2);
			var	valor=valor.toFixed(2);
		var fila='<tr  name="eli" class="selected" id="fila'+i+'"><td style="text-align:center" class="col-sm-3"><input type="text" style="border:none;background-color: transparent;"  class="form-control"  margin-left:-50px  value="'+i+'"></td><td style="text-align:center" class="col-sm-3"><input type="text" style="border:none;background-color: transparent;  class="form-control" name="nomPr[]" margin-left:-50px  value="'+cuota+'"></td><td style="text-align:center " class="col-sm-2" ><input type="text" style="border:none;background-color: transparent;" width="100" class="form-control" name="cantidad[]" margin-left:5px    value="'+aux+'"></td><td style="text-align:center" class="col-sm-2"><input type="text" style="background-color: transparent; border:none; WIDTH:300" class="form-control"  name="precio_compra[]"  value="'+valor+'"></td></tr>';

		$("#tabla").append(fila);
	}



function contar(){
	var table = document.getElementById('tabla');
	var n=$('#tabla >tbody >tr').length;
	//swal("hola",n, "success");
	for (var i = 1; i <=n; i++) {
       $("#fila"+i).remove();

	}
}


function fecha(){
var fecha1 = $("#fecha_inicio").val();
var fecha2 = $("#fecha").val();
var di=daysBetween(fecha1, fecha2);
var vida=$("#vida").val();
var ci=365*vida;

if(di>ci){
	swal("Opps","Para este Año ya no existe depreciación","warning")

}else{

	calcular('3',di,'1');
}

}


function daysBetween(date1, date2){   if (date1.indexOf("-") != -1) { date1 = date1.split("-"); } else if (date1.indexOf("/") != -1) { date1 = date1.split("/"); } else { return 0; }   if (date2.indexOf("-") != -1) { date2 = date2.split("-"); } else if (date2.indexOf("/") != -1) { date2 = date2.split("/"); } else { return 0; }   if (parseInt(date1[0], 10) >= 1000) {       var sDate = new Date(date1[0]+"/"+date1[1]+"/"+date1[2]);   } else if (parseInt(date1[2], 10) >= 1000) {       var sDate = new Date(date1[2]+"/"+date1[1]+"/"+date1[0]);   } else {       return 0;   }   if (parseInt(date2[0], 10) >= 1000) {       var eDate = new Date(date2[0]+"/"+date2[1]+"/"+date2[2]);   } else if (parseInt(date2[2], 10) >= 1000) {       var eDate = new Date(date2[2]+"/"+date2[1]+"/"+date2[0]);   } else {       return 0;   }   var one_day = 1000*60*60*24;   var daysApart = Math.abs(Math.ceil((sDate.getTime()-eDate.getTime())/one_day));   return daysApart;}
 



</script>
	<?php
include "../Componentes/scripts.php";
?>
	
</body>

</html>


		
				
