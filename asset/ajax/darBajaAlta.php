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
    $resultado = $mysqli->query($sql); 
?>