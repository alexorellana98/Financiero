<!-- Categorias -->
<table id="datable_1" class="table table-hover display  pb-30 tablaAct">

<?php 
      	$mysqli = new mysqli('localhost', 'root', '', 'siccif');
		$opcion=$_REQUEST['opcion'];	
        $est=$_REQUEST['estado'];
if($opcion==="categoria"){
?>

    <thead>
        <tr>
            <th>N°</th>
            <th>Nombre</th>
            <th>Código</th>
            <th>Valor residual(%)</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $extraer="SELECT * FROM categoria";
            $ejecutar=mysqli_query($mysqli,$extraer);
            while($ejecuta=mysqli_fetch_array($ejecutar)){
                if (($ejecuta['estado'])==$est) {
                    $cont=$cont+1;
                ?>
            <tr>
                <td><?php  echo $cont ?></td>
                <td><?php echo $ejecuta['nombre']?></td>
                <td><?php echo $ejecuta['cod']?></td>
                <td><?php echo $ejecuta['val']?></td>
                <td>
                   <?php if($est==='1'){ ?>
                   <div class="col-md-6 text-center">
                    <form action="editarCategoria.php" method="post" class="form-register">
                        <button type="submit" class="btn btn-danger" id="btnEditar" name="btnEditar" data-toggle="modal" value="<?php echo $ejecuta['idCat']?>"><i class="fa fa-edit"></i> </button>
                    </form>
                    </div>
                    <div class="col-md-6">
                    <button  type="button" class="btn btn-warning"  onClick="darBaja('<?php echo $ejecuta['idCat']; ?>','Desea dar de baja a la Categoria','categoria','0')"><i class="fa fa-arrow-circle-down"></i>  </button>
                    </div>
                    <?php }else if($est==='0'){ ?>
                    <button  type="submit" class="btn btn-warning"  onClick="darBaja('<?php echo $ejecuta['idCat']; ?>','Desea dar de baja a la Categoria','categoria','1')"><i class="fa fa-arrow-circle-up"></i>  </button>
                    <?php } ?>
                </td>
            </tr>
            <?php
            }
        }
        ?>
    </tbody>
<?php 
	} if($opcion==='subcategoria'){
?>
<!-- Sub-Categoria -->
	<thead>
	  <tr >
		  <th  WIDTH="50" HEIGHT='9' >N°</th>
		  <th >Código</th>
		  <th >Nombre</th>
		  <th  WIDTH="200" HEIGHT='9'>Opciones</th>
		</tr>
	</thead>

	<tbody >

	  <?php
	  $extraer="SELECT * FROM subcategoria ";
	  $ejecutar=mysqli_query($mysqli,$extraer);
	  while($ejecuta=mysqli_fetch_array($ejecutar))
	  {if (($ejecuta['estado'])==$est) {
		$cont=$cont+1;

	  $aux=$ejecuta['idcat'];
		 $sentencia = "SELECT * FROM categoria WHERE idCat='$aux'"; 
		 $ejecutar2=mysqli_query($mysqli,$sentencia);
		 $fila = mysqli_fetch_assoc($ejecutar2);
		  ?>  
		<tr>
		  <td><?php  echo $cont ?> </td>
		  <td><?php echo $ejecuta['codigo']?></td>
		  <td><?php echo $ejecuta['nombre']?></td>
            <td class="text-center">
             <?php if($est==='1'){ ?>
            <div class="col-md-6 text-center">
              <form   action="editarSubcategoria.php" method="post" class="form-register" > 
                <button   type="submit" class="btn btn-danger" id="btnEditar" name="btnEditar"  data-toggle="modal"  value="<?php echo $ejecuta['idSub']?>" ><i class="fa fa-edit"></i></button>
                </form>	
          </div>
          <div class="col-md-6 text-right">
              <button  type="button" class="btn btn-warning"  onClick="darBaja('<?php echo $ejecuta['idSub']; ?>','Desea dar de baja a la Sub-Categoria','subcategoria','0')"><i class="fa fa-arrow-circle-down"></i> </button>
          </div>
          <?php }else if($est==='0'){ ?>
             <button  type="submit" class="btn btn-warning"  onClick="darBaja('<?php echo $ejecuta['idSub']; ?>','Desea dar de baja a la Sub-Categoria','subcategoria','1')"><i class="fa fa-arrow-circle-up"></i>  </button>
        <?php } ?>                           
          </td>
		</tr>

	  <?php
	  }
	  }
	  ?> 
	</tbody>
	 <?php } if($opcion==="marca"){ ?>
                        <thead>
                          <tr >
                            <th >N°</th>
                            <th >Nombre</th>
                            <th >Opciones</th>
                          </tr>
                        </thead>
                        
                        <tbody >
                          <?php
                              $extraer="SELECT * FROM marca";
                              $ejecutar=mysqli_query($mysqli,$extraer);
                              while($ejecuta=mysqli_fetch_array($ejecutar))
                              {if (($ejecuta['estado'])==$est) {
                                $cont=$cont+1;

                                  ?>  
                                <tr>
                                  <td><?php  echo $cont ?> </td>
                                  <td><?php echo $ejecuta['nombre']?></td>
                                  
                                  <td>
                                  
                                  <form  action="editarMarcas.php" method="post" class="form-register" > 
                                    <button  type="submit" class="btn btn-danger" id="btnEditar" name="btnEditar" style="background-color: transparent border:0" data-toggle="modal"  value="<?php echo $ejecuta['idMarca']?>" >Editar</button>
                                    </form>

                                  <form style=" margin-left: 100px; margin-top:-43px;" action="MarcasInactivo.php" method="get" class="form-register" > 
                                   <button  type="submit" class="btn btn-warning" id="btnbaja" name="btnbaja" style="background-color: transparent border:0" data-toggle="modal"  value=<?php echo $ejecuta['idMarca'] ?>>Baja</button>
                                   </form>
                               
                                 </td>
                                </tr>

                              <?php
                              }
                              }
                              ?> 
                        </tbody>
      <?php } if($opcion==="movimiento"){ ?>  
	<thead>
                          <tr >
                              <th  >N°</th>
                              <th >Nombre</th>
                              <th >Opciones</th>
                            </tr>
                        </thead>
                        
                        <tbody >
                          <?php
                            $extraer="SELECT * FROM movimiento";
                            // $base=mysqli_select_db($con,'finanzas');
                            $ejecutar=mysqli_query($mysqli,$extraer);


                            while($ejecuta=mysqli_fetch_array($ejecutar))
                            {if (($ejecuta['estado'])==$est) {
                            $cont=$cont+1;
                            ?>  
                              <tr>
                                <td><?php  echo $cont ?> </td>
                                <td><?php echo $ejecuta['nombre']?></td>
                                <td>
                                  <form  action="editarMovimiento.php" method="post" class="form-register" > 

                                    <button  type="submit" class="btn btn-danger" id="btnEditar" name="btnEditar" style="background-color: transparent border:0" data-toggle="modal"  value="<?php echo $ejecuta['idMov']?>" >Editar</button>
                                  </form>
                                  <form style=" margin-left: 100px; margin-top:-43px;" action="MovimientoInactivo.php" method="get" class="form-register" > 
                                    <button  type="submit" class="btn btn-warning" id="btnbaja" name="btnbaja" style="background-color: transparent border:0" data-toggle="modal"  value="<?php echo $ejecuta['idMov'] ?>">Baja</button>
                                  </form>
                                </td>
                              </tr>

                            <?php
                            }
                          }
                          ?> 
                        </tbody>
	<?php } if($opcion=="compraactivo"){ ?>
	 <thead>
                          <tr >
                              <th  WIDTH="50" HEIGHT='9' >N°</th>
                              <th >Código</th>
                              <th >Descripción</th>
                              <th >Categoria</th>
                              <th >Subcategoria</th>
                              <th >Opciones</th>
                            </tr>
                        </thead>
                        
                        <tbody >
                            <?php
                              $extraer="SELECT * FROM activo";
                              $ejecutar=mysqli_query($mysqli,$extraer);
                              while($ejecuta=mysqli_fetch_array($ejecutar))
                              {
                               if (($ejecuta['estado'])==$est) {
                                $cont1=$cont1+1;
                                  ?>  
                                <tr>
                                  <td><?php  echo $cont1 ?> </td>
                                  <td><?php  echo $ejecuta['codAct'] ?> </td>
                                  <td><?php echo $ejecuta['descrip']?></td>
                              <?php
                                  $aux=$ejecuta['idCat'];
                                 $sentencia1 = "SELECT * FROM categoria WHERE idCat=$aux"; 
                                 $ejecutar1=mysqli_query($mysqli,$sentencia1);
                                 $fila = mysqli_fetch_assoc($ejecutar1);
                                 
                                 ?>
                                  <td><?php echo $fila['nombre'];?></td>
                                  <?php
                                  $aux2=$ejecuta['idSub'];
                                 $sentencia2 = "SELECT * FROM subcategoria WHERE idSub=$aux2"; 
                                 $ejecutar2=mysqli_query($mysqli,$sentencia2);
                                 $fila1 = mysqli_fetch_assoc($ejecutar2);
                                 
                                 ?>
                                  <td> <?php echo $fila1['nombre'];?></td>
                                  
                                <td class="text-center">
                                 <?php if($est==="1"){ ?>
                                  <div class="col-md-6 text-center">
                                     <form  action="vistaDetalleCompra.php" method="get" class="form-register" > 
                                   <button  type="submit" class="btn btn-danger" id="btnId" name="btnId" style="background-color: transparent border:0" data-toggle="modal"  value="<?php echo $ejecuta['idAc'] ?>" ><i class="fa fa-info"></i></button>
                                   </form>
                                  </div>
                                  <div class="col-md-6 text-center">
                                      <button  type="button" class="btn btn-warning"  onClick="darBaja('<?php echo $ejecuta['idAc']; ?>','Desea dar de baja al Activo','compraactivo','0')"><i class="fa fa-arrow-circle-down"></i> </button>
                                  </div> 
                                  <?php }else if($est==='0'){ ?>
                                      <div class="col-md-12 text-center">
                                      <button  type="button" class="btn btn-warning"  onClick="darBaja('<?php echo $ejecuta['idAc']; ?>','Desea dar de alta al Activo','compraactivo','1')"><i class="fa fa-arrow-circle-up"></i> </button>
                                  </div> 
                                  <?php } ?> 
                                  </td>
                                </tr>

                              <?php
                              }
                              }
                              ?> 
                        </tbody>
            <?php } ?>
	</table>