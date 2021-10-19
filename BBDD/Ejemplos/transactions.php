<?php

require_once("db_inc.php");

$db = new PDO(DB_INFO, DB_USER, DB_PASS);

try{
    $db->beginTransaction();
    $sql = "INSERT INTO PILOTOS (codpiloto,nompiloto,fecha_nacimiento,equipo,sueldo,amigo) values (" . time() . ",'Juan',null,null,null,null)";
    $resultado = $db->query($sql);
    if($resultado){
        echo "Piloto insertado correctamente. Hay: " .$resultado->rowCount() ." pilotos";
        $db->commit();
    }else{
        echo "insercciones anualadas";
        $db->rollBack();
    }
}catch(PDOException $e){
    echo "Error con la BD: ".$e->getMessage();
}