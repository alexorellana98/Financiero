<?php 
    $mysqli = new mysqli('localhost', 'root', '', 'siccif');
    $opcion=$_REQUEST['opcion'];	
    $est=$_REQUEST['estado'];
?>
<div class="text-center">
<div class="form-group">
<?php
    if($opcion==="institucion"){
?>
<button class="btn btn-primary btn-lable-wrap left-label" data-toggle="modal" data-target="#ModalInstitucion"> <span class="btn-label"><i class="fa fa-plus"></i> </span><span class="btn-text">Nueva Institución</span></button>
<?php }else if($opcion==="ubicacion"){ ?>
<button class="btn btn-primary btn-lable-wrap left-label" data-toggle="modal" data-target="#ModalUbicacion"> <span class="btn-label"><i class="fa fa-plus"></i> </span><span class="btn-text">Nueva Ubicación</span></button>
<?php }else if($opcion==="proveedor"){ ?>
<button class="btn btn-primary btn-lable-wrap left-label" data-toggle="modal" data-target="#ModalProveedor"> <span class="btn-label"><i class="fa fa-plus"></i> </span><span class="btn-text">Nuevo Proveedor</span></button>
<?php }else if($opcion==="movimiento"){ ?>
<button class="btn btn-primary btn-lable-wrap left-label" data-toggle="modal" data-target="#ModalMovimiento"> <span class="btn-label"><i class="fa fa-plus"></i> </span><span class="btn-text">Nuevo Movimiento</span></button>
<?php }else if($opcion==="marca"){ ?>
<button class="btn btn-primary btn-lable-wrap left-label" data-toggle="modal" data-target="#ModalMarca"> <span class="btn-label"><i class="fa fa-plus"></i> </span><span class="btn-text">Nueva Marca</span></button>
<?php }else if($opcion==="categoria"){ ?>
<button class="btn btn-primary btn-lable-wrap left-label" data-toggle="modal" data-target="#ModalCategoria"> <span class="btn-label"><i class="fa fa-plus"></i> </span><span class="btn-text">Nueva Categoria</span></button>
<?php }else if($opcion==="subcategoria"){ ?>
<button class="btn btn-primary btn-lable-wrap left-label" data-toggle="modal" data-target="#ModalSubCategoria"> <span class="btn-label"><i class="fa fa-plus"></i> </span><span class="btn-text">Nueva Sub-Categoria</span></button>
<?php } ?>
</div>							 	
</div>

<table id="datable_1" class="table table-hover display  pb-30 tablaAct">

<?php 
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
                        <button type="submit" class="btn btn-danger" id="btnEditar" name="btnEditar" data-toggle="modal" onclick="editar('<?php echo $ejecuta['idCat']?>','ModalCategoriaEditar');"><i class="fa fa-edit"></i> </button>
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
                <button   type="submit" class="btn btn-danger" id="btnEditar" name="btnEditar"  data-toggle="modal"  onclick="editar('<?php echo $ejecuta['idSub']?>','ModalSubCategoriaEditar');" ><i class="fa fa-edit"></i></button>
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
                        <thead class="text-center">
                          <tr >
                            <th class="text-center">N°</th>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Opciones</th>
                          </tr>
                        </thead>
                        
                        <tbody class="text-center">
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
                                  <?php if($est=="1"){ ?>
                                 <div class="col-md-6 text-right">
                                    <button   type="button" class="btn btn-danger" id="btnEditar" name="btnEditar"  data-toggle="modal"  onclick="editar('<?php echo $ejecuta['idMarca']?>','ModalMarcaEditar');" ><i class="fa fa-edit"></i></button>
                                   
                              </div>
                              <div class="col-md-6 text-left">
                                  <button  type="button" class="btn btn-warning"  onClick="darBaja('<?php echo $ejecuta['idMarca']; ?>','Desea dar de baja la Marca','marca','0')"><i class="fa fa-arrow-circle-down"></i> </button>
                              </div>
                                 <?php }else if($est=='0'){ ?>
                                 <div class="col-md-12">
                                  <button  type="button" class="btn btn-warning"  onClick="darBaja('<?php echo $ejecuta['idMarca']; ?>','Desea dar de alta la Marca','marca','1')"><i class="fa fa-arrow-circle-up"></i> </button>
                              </div>
                                 <?php } ?>
                               
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
                              <th class="text-center">Opciones</th>
                            </tr>
                        </thead>
                        
                        <tbody >
                          <?php
                            $extraer="SELECT * FROM movimiento";
                            $ejecutar=mysqli_query($mysqli,$extraer);
                            while($ejecuta=mysqli_fetch_array($ejecutar))
                            {if (($ejecuta['estado'])==$est) {
                            $cont=$cont+1;
                            ?>  
                              <tr>
                                <td><?php  echo $cont ?> </td>
                                <td><?php echo $ejecuta['nombre']?></td>
                                <td>
                                <?php if($est==='1'){ ?>
                                 <div class="col-md-6 text-right">
                                    <button   type="submit" class="btn btn-danger" id="btnEditar" name="btnEditar"  data-toggle="modal" onclick="editar('<?php echo $ejecuta['idMov']?>','ModalMovimientoEditar');" ><i class="fa fa-edit"></i></button>
                              </div>
                              <div class="col-md-6 text-left">
                                  <button  type="button" class="btn btn-warning"  onClick="darBaja('<?php echo $ejecuta['idMov']; ?>','Desea dar de baja al Movimiento','movimiento','0')"><i class="fa fa-arrow-circle-down"></i> </button>
                              </div>
                                <?php }else if($est==='0'){ ?>
                                <div class="col-md-12 text-center">
                                  <button  type="button" class="btn btn-warning"  onClick="darBaja('<?php echo $ejecuta['idMov']; ?>','Desea dar de alta al Movimiento','movimiento','1')"><i class="fa fa-arrow-circle-up"></i> </button>
                              </div>
                                <?php } ?>
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
                                   <button  type="submit" class="btn btn-danger" id="btnId" name="btnId" style="background-color: transparent border:0" data-toggle="modal"  onclick="cargarModal('<?php echo $ejecuta['idAc']; ?>','');" ><i class="fa fa-info"></i></button>
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
            <?php } if($opcion==='proveedor') { ?>
            <thead>
                         <tr >
                            <th >N°</th>
                            <th >Nombre</th>
                            <th >Direccion</th>
                            <th >NIT</th>
                            <th >Nombre de contacto</th>
                            <th >Telefono</th>
                            <th >Correo</th>
                            <th >Observacion</th>
                          <th WIDTH="130">Opciones</th>
                        </tr>
                        </thead>
                        
                        <tbody >
                          <?php
                            $extraer="SELECT * FROM proveedor";
                            $ejecutar=mysqli_query($mysqli,$extraer);
                            while($ejecuta=mysqli_fetch_array($ejecutar))
                            {if (($ejecuta['estado'])==$est) {
                              $cont=$cont+1;

                                ?>  
                              <tr>
                                <td><?php  echo $cont ?> </td>
                                <td><?php  echo $ejecuta['nombre'] ?> </td>
                                <td><?php echo $ejecuta['direccion']?></td>
                                <td> <?php echo $ejecuta['nit']?></td>
                                <td> <?php echo $ejecuta['contacto']?></td>
                                <td> <?php echo $ejecuta['telefono']?></td>
                                <td> <?php echo $ejecuta['correo']?></td>
                                <td> <?php echo $ejecuta['observacion']?></td>
                                <td>
                                 <?php if($est=="1"){ ?>
                                 <div class="col-md-6" style="margin-right:0px; padding-left:0px; padding-right: 0px;">
                                    <button   type="submit" class="btn btn-danger" id="btnEditar" name="btnEditar"  data-toggle="modal"  onclick="editar('<?php echo $ejecuta['ide']?>','ModalProveedorEditar');"><i class="fa fa-edit"></i></button>
                              </div>
                              <div class="col-md-6">
                                  <button  type="button" class="btn btn-warning"  onClick="darBaja('<?php echo $ejecuta['ide']; ?>','Desea dar de baja al Proveedor','proveedor','0')"><i class="fa fa-arrow-circle-down"></i> </button>
                              </div>
                                 <?php }else if($est=='0'){ ?>
                                 <div class="col-md-12">
                                  <button  type="button" class="btn btn-warning"  onClick="darBaja('<?php echo $ejecuta['ide']; ?>','Desea dar de alta al Proveedor','proveedor','1')"><i class="fa fa-arrow-circle-up"></i> </button>
                              </div>
                                 <?php } ?>
                                </td>
                              </tr>

                            <?php
                            }
                            }
                            ?> 
                        </tbody>
                        <?php }elseif($opcion==='ubicacion'){ ?>
                         <thead>
                          <tr >
                              <th  WIDTH="50" HEIGHT='9' >N°</th>
                              <th >Código</th>
                              <th >Nombre</th>
                              <th  WIDTH="170" HEIGHT='9'>Opciones</th>
                            </tr>
                        </thead>
                        <tbody >
                          <?php
                            $extraer="SELECT * FROM ubicacion";
                            $ejecutar=mysqli_query($mysqli,$extraer);
                            while($ejecuta=mysqli_fetch_array($ejecutar))
                            { if (($ejecuta['estado'])==$est) {
                              $cont=$cont+1;
                                ?>  
                              <tr>
                                <td><?php  echo $cont ?> </td>
                                <td><?php echo $ejecuta['codU']?></td>
                                <td id="nam" name="nam"><?php echo $ejecuta['nombre']?></td>
                                <td>
                                <?php if($est==='1'){ ?>
                                <div class="col-md-6 text-right">
                                    <button   type="submit" class="btn btn-danger" id="btnEditar" name="btnEditar"  data-toggle="modal" onclick="editar('<?php echo $ejecuta['idUb']?>','ModalUbicacionEditar');"  ><i class="fa fa-edit"></i></button>
                              </div>
                              <div class="col-md-6 text-left">
                                  <button  type="button" class="btn btn-warning"  onClick="darBaja('<?php echo $ejecuta['idUb']; ?>','Desea dar de baja a la Ubicación','ubicacion','0')"><i class="fa fa-arrow-circle-down"></i> </button>
                              </div>
                                <?php }else if($est==='0'){ ?>
                                <div class="col-md-12 text-center">
                                  <button  type="button" class="btn btn-warning"  onClick="darBaja('<?php echo $ejecuta['idUb']; ?>','Desea dar de alta a la Ubicación','ubicacion','1')"><i class="fa fa-arrow-circle-up"></i> </button>
                              </div>
                                <?php } ?>
                                </td>
                              </tr>

                            <?php
                            }
                            }
                            ?> 
                        </tbody>
                        <?php } else if($opcion==='institucion'){ ?>
                            <thead>
                          <tr >
                              <th  WIDTH="50" HEIGHT='9' >N°</th>
                              <th >Código</th>
                              <th >Nombre</th>
                              <th  WIDTH="170" HEIGHT='9'>Opciones</th>
                            </tr>
                        </thead>
                        <tbody >
                          <?php
                            $extraer="SELECT * FROM institucion";
                            $ejecutar=mysqli_query($mysqli,$extraer);
                            while($ejecuta=mysqli_fetch_array($ejecutar))
                            { if (($ejecuta['estado'])==$est) {
                              $cont=$cont+1;
                                ?>  
                              <tr>
                                <td><?php  echo $cont ?> </td>
                                <td><?php echo $ejecuta['codigo']?></td>
                                <td id="nam" name="nam"><?php echo $ejecuta['Nombre']?></td>
                                <td>
                                <?php if($est==='1'){ ?>
                                <div class="col-md-6 text-right">
                                    <button   type="submit" class="btn btn-danger" id="btnEditar" name="btnEditar"  data-toggle="modal"  onclick="editar('<?php echo $ejecuta['idIn']?>','ModalInstitucionEditar');"><i class="fa fa-edit"></i></button>
                              </div>
                              <div class="col-md-6 text-left">
                                  <button  type="button" class="btn btn-warning"  onClick="darBaja('<?php echo $ejecuta['idIn']; ?>','Desea dar de baja a la Institución','institucion','0')"><i class="fa fa-arrow-circle-down"></i> </button>
                              </div>
                                <?php }else if($est==='0'){ ?>
                                <div class="col-md-12 text-center">
                                  <button  type="button" class="btn btn-warning"  onClick="darBaja('<?php echo $ejecuta['idIn']; ?>','Desea dar de alta a la Institución','institucion','1')"><i class="fa fa-arrow-circle-up"></i> </button>
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
