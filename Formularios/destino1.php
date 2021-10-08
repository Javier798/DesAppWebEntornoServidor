<?php

spl_autoload_register(function ($nombre_clase) {
    echo $nombre_clase;
    include $nombre_clase . '.php';
});
use Clases\Libro;
if($_SERVER["REQUEST_METHOD"]=='POST'){
    if(isset($_POST["control"])){
        $contador=0;
        $titulo = $_POST["titulo"];
        $numPaginas = (int) $_POST["numeroPaginas"];
        $vendible = $_POST["vendible"];
        $fechaPubli = $_POST["fechaPubli"];
        $fileTmpPath = $_FILES['archivosubido']['tmp_name'];
        $pdfName = "D:\\archivo.pdf";
        $pdfType = $_FILES["archivosubido"]["type"];
        $pdfSize = $_FILES["archivosubido"]["size"];
        echo "<br>$fileTmpPath";
        echo "<br>$pdfName";
        echo "<br>$pdfType";
        echo "<br>$pdfSize";
        
        if($_FILES["archivosubido"]["type"] == "application/pdf" && $_FILES["archivosubido"]["size"] <= 2097152 && !file_exists($pdfName)){
            move_uploaded_file($fileTmpPath, "D:\\archivo.pdf");
        }else{
            echo "<br> El archivo no se guardó";
        }
        
        
        if($vendible=="si"){
            $vendible=true;
        }else{
            $vendible=false;
        }
        $libro = new Libro();
        $libro->setFechaPublicacion($fechaPubli);
        $libro->setNumPaginas($numPaginas);
        $libro->setTitulo($titulo);
        $libro->setVendible($vendible);
        $libro->rutaImagen = $fileTmpPath;

        $serialisasion=serialize($libro);
        file_put_contents('libroSerializado', $serialisasion);

        echo "<br>$titulo";
        echo "<br>$numPaginas";
        echo "<br>$vendible";
        echo "<br>$fechaPubli";
        if(empty($_POST["titulo"])){
            $contador++;
        }
        if(empty($_POST["numeroPaginas"])){
            $contador++;
        }
        if(empty($_POST["vendible"])){
            $contador++;
        }
        if(empty($_POST["fechaPubli"])){
            $contador++;
        }
        if(empty($_FILES["archivosubido"])){
            $contador++;
        }
        if($contador==0){
            header('Location: http://localhost/dwes/Formularios/Form.php?m='."Se han recibido todos los datos<br>");
        }else{
            header('Location: http://localhost/dwes/Formularios/Form.php?m='."No se han recibido todos los datos<br>");
        }
    }
}else{
    header('Location: http://localhost/dwes/Form.php');
}
?>