<?php
    $mysqli = new mysqli('localhost', 'root', '', 'siccif');
    $est=$_REQUEST['estado'];
    $id=$_REQUEST['id'];
    $sql = " UPDATE categoria set estado='$est' WHERE idCat='$id'";
    $resultado = $mysqli->query($sql); 
?>