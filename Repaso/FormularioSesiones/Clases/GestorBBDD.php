<?php

namespace Clases;


require("AccionesBD.php");
require("Libro.php");
/**
 * Clase de gestion de libros
 */
class GestorBBDD implements AccionesBD
{

    private $conexion;
    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }
    /**
     * isnerta un libro
     * @param mixed $array 
     */
    function insertar($array)
    {
        try {
            $sql = "INSERT INTO `login`(`USUARIO`, `CONTRASEÑA`) VALUES ('$array[USUARIO]', $array[CONTRASEÑA])";
            $resultado = $this->conexion->query($sql);
            if ($resultado) {
                echo "Usuario dado de alta correctamente. Hay ahora mismo " . $resultado->rowCount() . " libros. <br>";
            } else {
                print_r($this->conexion->errorInfo());
                throw new \Exception("Error por consulta");
            }
        } catch (\PDOException $e) {
            echo "error pdo";
        } catch (\Exception $e) {

            echo $e->getMessage();
        }
    }

    /**
     * Actualiza el libro
     * @param mixed $array 
     */
    function actualizar($array)
    {
        try {
            $contador = 0;
            $sentencia = "";
            $codigo = 0;
            foreach ($array as $key => $value) {
                if ($key == "TITULO" || $key == "FECHAPUBLI") {
                    $sentencia = $sentencia . " " . $key . "='" . $value . "'";
                } elseif ($key == "VENDIBLE" || $key == "NUMPAGINAS") {
                    $sentencia = $sentencia . " " . $key . "=" . $value;
                } elseif ($key == "CODIGO") {
                    $codigo = $value;
                }
                if ($contador < count($array) - 1 && $contador != 0) {
                    $sentencia = $sentencia . ",";
                }
                $contador++;
            }
            $sql = "UPDATE `LOGIN` SET $sentencia WHERE CODLIBRO =$codigo;";
            $resultado = $this->conexion->query($sql);
            if ($resultado) {

                echo "Piloto modificado correctamente. Se ha actualizado " . $resultado->rowCount() . " pilotos.<br>";
            } else {
                echo print_r($this->conexion->errorInfo());
                throw new \Exception("error en la sentencia");
            }
        } catch (\PDOException $e) {
            $e->getMessage();
        } catch (\Exception $e) {
            $e->getMessage();
        }
    }
/**
 * Elimina un libro
 *  @param mixed $id
 */
    function eliminar($id)
    {
        try {
            $sql = "DELETE FROM `login` WHERE CODLIBRO = $id";
            $resultado = $this->conexion->query($sql);
            if ($resultado) {
                echo "Libro borrado correctamente. Se ha actualizado " . $resultado->rowCount() . " libros.<br>";
            } else {
                echo print_r($this->conexion->errorInfo());
                throw new \Exception("Error en la consulta");
            }
        } catch (\Exception $e) {
            $e->getMessage();
        }
    }

    /**
     * Devuelve un array con todos los hobbies
     * @return mixed
     */
    function obtenerHobbies()
    {
        try {
            $sql = "SELECT * FROM `login` ";
            $libros = $this->conexion->query($sql);
            $contador = 1;
            return $libros;

            
        } catch (\PDOException $e) {
            $e->getMessage();
        }
    }

    /**
     * obtiene los hobbies aplicando filtros
     * @param mixed $array 
     *
     * @return mixed
     */
    function obtenerHobbiesFiltros($array)
    {

        $contador = 0;
        $sentencia = "";

        foreach ($array as $key => $value) {
            $sentencia = $sentencia . $key . $value;
            if ($contador < count($array) - 1) {
                $sentencia = $sentencia . " AND ";
            }
            $contador++;
        }

        $sql = "SELECT * FROM `login` WHERE $sentencia";

        $libros = $this->conexion->query($sql);
        $contador = 1;
        foreach ($libros as $libro) {
            echo "Libro " . $contador . ":<br>";
            echo "Titulo:" . $libro["TITULO"] . " Numero de paginas: " . $libro["NUMPAGINAS"] . " Vendible: " . $libro["VENDIBLE"] . " Fecha Publicacion" . $libro["FECHAPUBLI"] . "<br><br>";
            $contador++;
        }

        echo "Número de libros : " . $libros->rowCount() . "<br>";
    }
/**
 * Llama al metodo privado
 * @param mixed $array
 */
    public function transaccion($array){
        
        $this->altaSimultanea($array);
    }
    /**
     * recibe un array e inserta los libros si es posibe
     */
    private function altaSimultanea($array)
    {
        try {
            $this->conexion->beginTransaction();
            foreach ($array as $value) {
                $sql = $value;
                $resultado = $this->conexion->query($sql);
                if (!$resultado) {
                    echo "Fallo al insertar $value<br>";
                    $this->conexion->rollBack();
                    throw new \Exception("Fallo en la inserccion");
                }
            }
            $this->conexion->commit();
            echo "Libros insertados correctamente";
        }catch(\PDOException $e){
            $e->getMessage();
        } catch (\Exception $e) {
            $e->getMessage();
        }
    }

}
