<?php
    $mysqli = new mysqli('localhost', 'root', '', 'siccif');
    $opcion=$_REQUEST['tbld'];
    $est=$_REQUEST['estado'];
    $id=$_REQUEST['id'];
    if($opcion=='categoria')
        $sql = " UPDATE categoria set estado='$est' WHERE idCat='$id'";
    if($opcion=='subcategoria')
        $sql = " UPDATE subcategoria set estado='$est' WHERE idSub='$id'";
    if($opcion=='compraactivo')
        $sql = " UPDATE activo set estado='$est' WHERE idAc='$id'";
    if($opcion=='proveedor')
        $sql = " UPDATE proveedor set estado='$est' WHERE ide='$id'";
    if($opcion=='marca')
        $sql = " UPDATE marca set estado='$est' WHERE idMarca='$id'";
    if($opcion=='movimiento')
        $sql = " UPDATE movimiento set estado='$est' WHERE idMov='$id'";
    if($opcion=='ubicacion')
        $sql = " UPDATE ubicacion set estado='$est' WHERE idUb='$id'";
    if($opcion=='cliente')
        $sql = " UPDATE cliente set estado='$est' WHERE idCliente='$id'";
if($opcion=='institucion')
        $sql = " UPDATE institucion set estado='$est' WHERE idIn='$id'";

    $resultado = $mysqli->query($sql); 
?>