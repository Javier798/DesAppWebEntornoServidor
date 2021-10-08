<?php
use Clases\Ayuda;
use Clases\Libro;
use Clases\Hobby;

spl_autoload_register(function ($nombre) {
    require($nombre . '.php');
});

$libros=[];
const n=10;
$ayuda = new Ayuda();
for($i=0;$i<n;$i++){
    $libros[$i] = new Libro($ayuda->generarTitulo(),$ayuda->generarPaginas(),$ayuda->generarVendible(),$ayuda->generarFecha());
 }
 for ($i=0; $i < count($libros); $i++) { 
     echo $libros[$i]."<br>";
 }

 $atributos = array("editorial","libreria","resumen");
echo "<br><br>AÑADIR ATRIBUTOS<br><br>";
var_dump( $atributos[0]);
for ($i=0; $i < count($libros); $i++) {
        foreach($atributos as $valor){
            $libros[$i]->$valor= $ayuda->generarTitulo();
        }
        
    
}
for ($i=0; $i < count($libros); $i++) { 
    echo $libros[$i];

    foreach($atributos as $valor){
        echo ", ".$valor.": ". $libros[$i]->$valor;
    }
    echo "<br>";

}
//echo $libros[0]->getTienda();
Libro::$numLibros=10;
echo "numero de libros: ". Libro::$numLibros."<br>";
Libro::$numLibros=5;
echo "numero de libros: ". Libro::$numLibros."<br>";


var_dump(new class(10) extends Hobby {
    private $num;

    public function __construct($num)
    {
        $this->num = $num;
    }
	/**
	 *
	 * @param mixed $titulo 
	 *
	 * @return mixed
	 */
	function setTitulo($titulo) {
	}
	
	/**
	 *
	 * @return mixed
	 */
	function getTitulo() {
	}
	
	/**
	 *
	 * @return mixed
	 */
	function iniciar() {
	}
	
	/**
	 *
	 * @return mixed
	 */
	function detener() {
	}
	
	/**
	 *
	 * @param array $a 
	 *
	 * @return mixed
	 */
	function actualizar(array $a) {
	}
});
?>