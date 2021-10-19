<?php

require_once("db_inc.php");

$db = new PDO(DB_INFO, DB_USER, DB_PASS);



try {

    //INSERT

     $sql = "INSERT INTO PILOTOS (codpiloto,nompiloto,fecha_nacimiento,equipo,sueldo,amigo) values (" . time() . ",'Juan',null,null,null,null)";

     $resultado = $db->query($sql);

     if ($resultado) {

         echo "Piloto dado de alta correctamente. Hay ahora mismo " . $resultado->rowCount() . " pilotos. <br>";

     } else {

         print_r($db->errorInfo());

     }



    // UPDATE

    // $sql = "UPDATE PILOTOS SET nompiloto = 'Unai' WHERE nompiloto = 'Juan';";

    // $resultado = $db->query($sql);

    // if ($resultado) {

    //     echo "Piloto modificado correctamente. Se ha actualizado " . $resultado->rowCount() . " pilotos.<br>";

    // } else {

    //     echo print_r($db->errorInfo());

    // }




    // //DELETE

    // $sql= "DELETE FROM PILOTOS WHERE nompiloto = 'Unai'";

    // $resultado = $db->query($sql);

    // if ($resultado) {

    //     echo "Piloto borrado correctamente. Se ha actualizado " . $resultado->rowCount() . " pilotos.<br>";

    // } else {

    //     echo print_r($db->errorInfo());

    // }


    //1º MANERA

    $db = new PDO(DB_INFO, DB_USER, DB_PASS);

    $sql = "SELECT * FROM PILOTOS WHERE CODPILOTO>10";

    $pilotos = $db->query($sql);

    foreach ($pilotos as $piloto){

        echo "INFO 1:".$piloto["NOMPILOTO"]."<br>";

    }

    echo "Número de pilotos : ". $pilotos->rowCount() . "<br>";



    //2º MANERA

    $sql ="SELECT * FROM PILOTOS WHERE CODPILOTO>?";

    //se prepara la sentencia

    $stmt = $db->prepare($sql);

    //se ejecuta la sentencia poniendo 10 en al interrogante.

    $stmt->execute(array(10));



    foreach ($stmt as $piloto){

        echo "INFO 2:".$piloto["NOMPILOTO"]."<br>";

    }

    echo "Número de pilotos : ". $pilotos->rowCount();foreach ($stmt as $piloto){



    }



    //3º MANERA

    $sql = "SELECT * FROM PILOTOS WHERE CODPILOTO>:codigo";

        //se prepara la sentencia

        $stmt = $db->prepare($sql);

        //se ejecuta la sentencia poniendo 10 en al interrogante.

        $stmt->execute(array("codigo"=>10));

   

        foreach ($stmt as $piloto){

            echo "<br> INFO 3:".$piloto["NOMPILOTO"];

        }

        $stmt->closeCursor();

        echo "<br>Número de pilotos : ". $pilotos->rowCount();foreach ($stmt as $piloto){

        }

} catch (PDOException $e) {

    echo $e->getMessage();

}