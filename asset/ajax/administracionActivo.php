<table id="datable_1" class="table table-hover display  pb-30 tablaAct">
   <?php
    $mysqli = new mysqli('localhost', 'root', '', 'siccif');
    $actualiza=$_REQUEST['actualiza'];

if($actualiza==="reevaluar"){
?>
<thead>
                          <tr >
                            <th  WIDTH="50" HEIGHT='9' >N°</th>
                            <th >Código</th>
                            <th >Descripción</th>
                            <th >Categoria</th>
                            <th >Subcategoria</th>
                            <th  WIDTH="250" HEIGHT='9'>Opciones</th>
                          </tr>
                        </thead>
                        
                        <tbody >
                          <?php
                            $extraer="SELECT * FROM activo";
                            
                            $ejecutar=mysqli_query($mysqli,$extraer);
                            while($ejecuta=mysqli_fetch_array($ejecutar))
                            {
                                
                            $extraerreevaluar='SELECT categoria.reevaluar as reevaluar FROM activo ,categoria where activo.idAc='.$ejecuta['idAc'].' and categoria.idCat='.$ejecuta['idCat'];
                            $ejecutarreevaluar=mysqli_query($mysqli,$extraerreevaluar);
                                while($ejecutareeval=mysqli_fetch_array($ejecutarreevaluar))
                                { $reevaluar=$ejecutareeval['reevaluar'];}
                                
                                
                             if (($ejecuta['estado'])==1 && ($reevaluar==1)) {
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
                                
                                <td style="margin:010px; padding:0px;">
                                <?php
                                ?>
                                <div class="col-md-4" style="margin:0px; padding:0px;">
                                  <button  type="submit" class="btn btn-success" id="btnId" name="btnId"  data-toggle="modal"  onclick="cargarModal('<?php echo $ejecuta['idAc']; ?>');"><i class="glyphicon glyphicon-eye-open"></i> Ver</button>
                                </div>                                                                
                                  
                                    <div class="col-md-8" style="margin:0px; padding:0px;">
                                 <button  type="submit" class="btn btn-warning" id="btnenvia" name="btnenvia" style="background-color: transparent border:0" data-toggle="modal"  onclick="editar('<?php echo $ejecuta['idAc']; ?>','ModalReevaluar')"><i class="glyphicon glyphicon-usd"></i>Reevaluar</button>
                                 </div>

                                 <?php }?>
                                </td>
                              </tr>
                            <?php
                            }
                            ?> 
                        </tbody>
<?php }else if($actualiza==="vender"){ ?>
<thead>
                          <tr >
                              <th  WIDTH="50" HEIGHT='9' >N°</th>
                              <th >Código</th>
                              <th >Descripción</th>
                              <th >Categoria</th>
                              <th >Subcategoria</th>
                              <th  WIDTH="200" HEIGHT='9'>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php
                            $extraer="SELECT * FROM activo";
                            $ejecutar=mysqli_query($mysqli,$extraer);
                            while($ejecuta=mysqli_fetch_array($ejecutar))
                            {
                             if (($ejecuta['estado'])==1) {
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
                                <td>
                                <?php
                                ?>
                               
                                  <div class="col-md-4" style="margin:0px; padding:0px;">
                                  <button  type="submit" class="btn btn-success" id="btnId" name="btnId"  data-toggle="modal"  onclick="cargarModal('<?php echo $ejecuta['idAc']; ?>');"><i class="glyphicon glyphicon-eye-open"></i> Ver</button>
                                </div>
                                
                                  <div class="col-md-4" style="margin-left:10px;">
                                 <form action="ventaProcesar.php" method="post" class="form-register" > 
                                 <button  type="submit" class="btn btn-warning" id="btnenvia" name="btnenvia" style="background-color: transparent border:0" data-toggle="modal"  value="<?php echo $ejecuta['idAc']; ?>"><i class="glyphicon glyphicon-usd"></i>  Vender</button>
                                 </form>
                                    </div>

                                 <?php }?>

                                </td>
                              </tr>

                            <?php

                            }
                            ?> 
                             
                        </tbody>
<?php }else if($actualiza==='depreciar'){ ?>
<thead>
<tr>
<th WIDTH="50" HEIGHT='9'>N°</th>
<th>Código</th>
<th>Descripción</th>
<th>Categoria</th>
<th>Subcategoria</th>
<th WIDTH="40" HEIGHT='9'>Opciones</th>
</tr>
</thead>
<tbody>
<?php
$extraer="SELECT * FROM activo";
$ejecutar=mysqli_query($mysqli,$extraer);
while($ejecuta=mysqli_fetch_array($ejecutar))
    
    $extraerdepreciar='SELECT categoria.depreciar as depreciar FROM activo ,categoria where activo.idAc='.$ejecuta['idAc'].' and categoria.idCat='.$ejecuta['idCat'];
    $ejecutadepreciar=mysqli_query($mysqli,$extraerdepreciar);
        while($ejecutadepre=mysqli_fetch_array($ejecutadepreciar))
        { $depreciar=$ejecutadepre['depreciar'];}
{
if (($ejecuta['estado'])==1 && $depreciar==1) {
$cont1=$cont1+1;
?>
<tr>
<td>
<?php  echo $cont1 ?>
</td>
<td>
<?php  echo $ejecuta['codAct'] ?>
</td>
<td>
<?php echo $ejecuta['descrip']?>
</td>
<?php
$aux=$ejecuta['idCat'];
$sentencia1 = "SELECT * FROM categoria WHERE idCat=$aux"; 
$ejecutar1=mysqli_query($mysqli,$sentencia1);
$fila = mysqli_fetch_assoc($ejecutar1);
?>
<td>
<?php echo $fila['nombre'];?>
</td>
<?php
$aux2=$ejecuta['idSub'];
$sentencia2 = "SELECT * FROM subcategoria WHERE idSub=$aux2"; 
$ejecutar2=mysqli_query($mysqli,$sentencia2);
$fila1 = mysqli_fetch_assoc($ejecutar2);
?>
<td>
<?php echo $fila1['nombre'];?>
</td>
<td>
<?php
?>
<form action="verActivo.php" method="get" class="form-register">
<button type="submit" class="btn btn-success" id="btnId" name="btnId" data-toggle="modal" value="<?php echo $ejecuta['idAc']; ?>"><i class="glyphicon glyphicon-eye-open"></i> Ver</button>
</form>
<?php }?>
</td>
</tr>
<?php

}
?>
</tbody>
<?php } ?>
</table>