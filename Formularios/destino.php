<?php
if($_SERVER["REQUEST_METHOD"]=='POST'){
    if(isset($_POST["control"])){
        $contador=0;
        $titulo = $_POST["titulo"];
        $numPaginas = (int) $_POST["numeroPaginas"];
        $vendible = $_POST["vendible"];
        $fechaPubli = $_POST["fechaPubli"];
        $_FILES["archivosubido"][];
        if($vendible=="si"){
            $vendible=true;
        }else{
            $vendible=false;
        }
        echo "<br>$titulo";
        echo "<br>$numPaginas";
        echo "<br>$vendible";
        echo "<br>$fechaPubli";
        if(!empty($_POST["titulo"])){
            $contador++;
        }
        if(!empty($_POST["numeroPaginas"])){
            $contador++;
        }
        if(!empty($_POST["vendible"])){
            $contador++;
        }
        if(!empty($_POST["fechaPubli"])){
            $contador++;
        }
        if($contador==4){
            header('Location: http://localhost/dwes/Form.php?m='."Se han recibido todos los datos");
        }else{
            header('Location: http://localhost/dwes/Form.php?m='."No se han recibido todos los datos");
        }
    }
}else{
    header('Location: http://localhost/dwes/Form.php');
}
?>