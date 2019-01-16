<?php require 'conexion.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>Depreciar</title>
	
	<?php
	  	include "../Componentes/estilos.php";
	?>

	<script language="javascript">
		function envia(){
		   window.location="VerActivo.php";
		  }
		function envia1(){
		   window.location="depreciar.php";
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
            <div class="panel panel-primary card-view" style="margin-top: 20px;">
            <div class="panel-heading text-center">
                <div class="pull-center">
                    <h3 class="panel-title txt-light"><i class="fa fa-usd"></i>   Depreciación</h3>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                <div class="row">
                    <div class="button-group col-md-2" style="margin-left:0px; padding-left:0px;">
                    <form action="verActivo.php" method="get" class="form-register">
                <button type="submit" class="btn btn-danger " id="btnId" name="btnId" value="<?php echo $aux2; ?>" style="width: 110%;"><i class="fa fa-mail-reply"></i>  Atras</button>
            </form>
                </div>
                </div>
                <div class="row">
                     <div class="col-md-12 text-center" style="margin-top:20px;">
                            <div class="alert alert-success alert-dismissable alert-style-1">
                                <i class="fa fa-usd"></i> <h6>Precio: $<?php echo $fila1['valor_historico']?> 
                                <br>Valor Residual: $<?php echo $residual?> 
                                <br>Valor a Depreciar: $<?php echo $dep?>
                                <br>Vida Util:<?php echo $fila1['vidautil_restante']?>  Años</h6>
                            </div>
                        </div>
                </div>
               
											<div class="clearfix"></div>
                <div class="row text-center">
											<button type="button" onclick="fecha()" class="btn btn-danger" style='display:none';>CALCULAR</button> 
											<button type="button" onclick="calcular('1','0','0')" class="btn btn-success"><i class="fa fa-usd"></i>  Anual</button> 
											<button type="button" onclick="calcular('2','0','0')" class="btn btn-success"><i class="fa fa-usd"></i>  Mensual</button> 
											<button type="button" onclick="calcular('3','0','0')" class="btn btn-info" style='display:none';>DIAS</button>

										</div>
               <div class="col-md-4 col-sm-4 col-xs-12">           
							<input type="hidden" value="<?php echo $dep?>" id="valor" name="valor">
							<input type="hidden" value="<?php echo $fila1['vidautil_restante']?>" id="vida" name="vida">
							<div id="oculta" style='display:none';>
							<input type="date" id="fecha_inicio" name="fecha_inicio" class="form-control"  value="<?php echo $fila1['fecha_inicio']?>" style='display:none';>
							</div>
							 <input type="date" id="fecha" name="fecha" min="<?php echo $fila1['fecha_inicio']?>" class="form-control"  value="<?php echo $fila1['fecha_inicio']?>" style='display:none';>
							                  </div>
                </div>
                </div>
                </div>
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="row">
								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="x_panel">
										<div class="x_title">
											
										</div>
										
										<div class="row">
										<div class=" col-md-12">
										<div class="x_content">	<br />

											<div class="table-responsive">

												<table class="table-list-search table-bordered table-hover cargaTabla" id="tabla">
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
			</div>
    <!-- /#wrapper -->
				<!-- Footer -->
				<?php include '../Componentes/footer.php'; ?>
				<!-- /Footer -->
			</div>
		</div>
        <!-- /Main Content -->
	<script language="javascript">
    function calcular(cantidad, centinela, cont){
        var boton='<?php echo $_REQUEST['boton']; ?>';
        document.location.href="depreciar.php?boton="+boton+"&cantidad="+cantidad+"&centinela="+centinela+"&cont="+cont;
    }
    
    window.onload = function() {
    var cantidad = '<?php echo $_REQUEST['cantidad']; ?>';
    if(cantidad!==null || cantidad!=="")
        calcularN('<?php echo $_REQUEST['cantidad']; ?>','<?php echo $_REQUEST['centinela']; ?>','<?php echo $_REQUEST['cont']; ?>');
}  
        
	function calcularN(cantidad, centinela, cont){
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
            $('#tabla').DataTable();

		}
        
	}

	function filas(i, cuota, aux, valor){
		  var cuota=cuota.toFixed(2);
			var	aux=aux.toFixed(2);
			var	valor=valor.toFixed(2);
        if(i<10)
            var fila='<tr id="fila'+i+'"><td>0'+i+'</td><td>'+cuota+'</td><td>'+aux+'</td><td>'+valor+'</td></tr>';
        else
             var fila='<tr id="fila'+i+'"><td>'+i+'</td><td>'+cuota+'</td><td>'+aux+'</td><td>'+valor+'</td></tr>';
		$("#tabla").append(fila);
	}



function contar(){
	var table = document.getElementById('tabla');
	var n=$('#tabla >tbody >tr').length;
	//swal("hola",n, "success");
	for (var i = 1; i <=n; i++) {
       $("#fila"+i).remove();
	}
    //$('#tabla').DataTable();
}

function fecha(){
var fecha1 = $("#fecha_inicio").val();
var fecha2 = $("#fecha").val();
var di=daysBetween(fecha1, fecha2);
var vida=$("#vida").val();
var ci=365*vida;

if(di>ci){
	alert("Para este Año ya no existe depreciación")

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


		
				
