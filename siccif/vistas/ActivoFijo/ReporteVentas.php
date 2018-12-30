<?php
require 'conexion.php';
//$con=mysqli_connect('localhost','root','','finanzas');

ini_set('date.timezone', 'America/El_Salvador');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>Categorias</title>
	<meta name="description" content="Doodle is a Dashboard & Admin Site Responsive Template by hencework." />
	<meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Doodle Admin, Doodleadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
	<meta name="author" content="hencework"/>
	
	<?php
	  	include "../Componentes/estilos.php";
	?>

	
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
				<table style="width:100%">
	<thead>
		<tr>
			<td style="width:10%"></td>
			
			<td rowspan="2" style="width:15%"><img src="../imagen/reportes2.png" style="width:80px" height="75px"/></td>
			<td style="width:50%; text-align:center; vertical-align:middle"> <br></td>		
			<td style="width:10%"></td>
			
		</tr>

		<tr>
			<td></td>
			<td style="font-size: 80%; text-align:center; vertical-align:middle">REPORTE DE VENTAS</td>
			<td></td>			
		</tr>		
	</thead>
</table>
<br>
<?php
		
	?>

<table style="width:100%" class="table">
	<thead>
		<tr>
			<td style="width:5%"></td>
			<td style="text-align:center; vertical-align:middle; border: 1px solid black; color:black; font-size: 70%; width:3%">No.</td>
			<td style="text-align:center; vertical-align:middle; border: 1px solid black; color:black; font-size: 70%; width:10%"><strong>No. DE FACTURA</strong></td>
			<td style="text-align:center; vertical-align:middle; border: 1px solid black; color:black; font-size: 70%; width:10%"><strong>CODIGO</strong></td>
			<td style="text-align:center; vertical-align:middle; border: 1px solid black; color:black; font-size: 70%; width:20%"><strong>DESCRIPCION</strong></td>
			
			<td style="text-align:center; vertical-align:middle; border: 1px solid black; color:black; font-size: 70%; width:10%"><strong>MOVIMIENTO</strong></td>
			<td style="text-align:center; vertical-align:middle; border: 1px solid black; color:black; font-size: 70%; width:10%"><strong>VALOR DE VENTA</strong></td>
			<td style="text-align:center; vertical-align:middle; border: 1px solid black; color:black; font-size: 70%; width:10%"><strong>FECHA FECHA DE VENTA</strong></td>
			
			<td style="width:10%"></td>
		</tr>
	</thead>	

	<?php
$cont1=0;
$extraer="SELECT * FROM venta";

 //$base=mysqli_select_db($con,'finanzas');
$ejecutar=mysqli_query($mysqli,$extraer);


while($ejecuta=mysqli_fetch_array($ejecutar))
{
  
 if (($ejecuta['idVenta'])!=0) {
  $cont1=$cont1+1;
    ?>  

	<tr>
		<td style="width:10%"></td>
		<?php
		$aux3=$ejecuta['idActi'];
   $sentencia3 = "SELECT * FROM activo WHERE idAc='$aux3'"; 
   $ejecutar3=mysqli_query($mysqli,$sentencia3);
   $fila3 = mysqli_fetch_assoc($ejecutar3);
   
   ?>
		<td style="text-align:left; vertical-align:middle; border: 1px solid black; color:black; font-size: 70%; width:5%">  <?php  echo $cont1 ?></td>
		<td style="text-align:left; vertical-align:middle; border: 1px solid black; color:black; font-size: 70%; width:10%"> <?php echo $ejecuta['factNum'];?></td>	
		<td style="text-align:left; vertical-align:middle; border: 1px solid black; color:black; font-size: 70%; width:5%"> <?php  echo $fila3['codAct'] ?></td>
		
		<td style="text-align:left; vertical-align:middle; border: 1px solid black; color:black; font-size: 70%; width:10%"> <?php echo $fila3['descrip']?></td>
<?php
		$aux3=$ejecuta['idMovi'];
   $sentencia4 = "SELECT * FROM movimiento WHERE idMov='$aux3'"; 
   $ejecutar4=mysqli_query($mysqli,$sentencia4);
   $fila4 = mysqli_fetch_assoc($ejecutar4);
   
   ?>
		<td style="text-align:left; vertical-align:middle; border: 1px solid black; color:black; font-size: 70%; width:10%"> <?php echo $fila4['nombre'];?></td>	
		
		<td style="text-align:left; vertical-align:middle; border: 1px solid black; color:black; font-size: 70%; width:10%"> <?php echo $ejecuta['precVenta'];?></td>
		<td style="text-align:left; vertical-align:middle; border: 1px solid black; color:black; font-size: 70%; width:10%"> <?php echo $ejecuta['fecha'];?></td>	
		
		<td style="width:10%"></td>	
	</tr>
<?php
}
}
?> 
	
</table>
<br>

<table style="width:100%">
	<thead>
			<tr>
			<td style="width:10%"></td>		
			<td style="font-size: 70%; text-align:center; vertical-align:middle; width:50%">Fecha de impresión: <?php echo date('d/m/Y'); ?> </td>
			<td style="font-size: 70%; text-align:center; vertical-align:middle; width:50%">Hora de impresión: <?php echo date('g:i a'); ?> </td>						
			<td style="width:10%"></td>		
		</tr>		
	</thead>
</table>
				
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
	
</body>

</html>


		
				
