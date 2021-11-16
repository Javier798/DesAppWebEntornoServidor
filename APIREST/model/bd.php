<?php


/**
 * Clase de gestion de libros
 */
class bd
{

    private $conexion;
    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }
    /**
     * obtiene los hobbies aplicando filtros
     * @param mixed $array 
     *
     * @return mixed
     */
    function obtenerRestaurantesFiltros($array)
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
        $sql = "SELECT * FROM `restaurante` WHERE $sentencia;";
        $libros = $this->conexion->query($sql);
        return $libros;
    }
    function obtenerCategorias()
    {
        $sql = "SELECT * FROM categoria;";
        $libros = $this->conexion->query($sql);
        return $libros;
    }
    function obtenerProductosFiltros($array)
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
        $sql = "SELECT * FROM `producto` WHERE $sentencia;";
        $libros = $this->conexion->query($sql);
        return $libros;
    }
    function obtenerPedidosFiltros($array)
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
        $sql = "SELECT * FROM `pedido` WHERE $sentencia;";
        $libros = $this->conexion->query($sql);
        return $libros;
    }
    function obtenerPedidos()
    {

        $sql = "SELECT * FROM `pedido`;";
        $libros = $this->conexion->query($sql);
        return $libros;
    }
    function obtenerProductos()
    {
        $sql = "SELECT * FROM `producto`;";
        $libros = $this->conexion->query($sql);
        return $libros;
    }

    function insertarPedido($array)
    {
        try {
            var_dump($array);
            $sql = "INSERT INTO `pedido`(`Fecha`, `Enviado`, `CodRes`) VALUES (now(), $array[Enviado],$array[CodRes])";
            echo $sql;
            $resultado = $this->conexion->query($sql);
            if ($resultado) {
                echo "Usuario dado de alta correctamente.";
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
    function obtenerUltimoPedido()
    {
        $sql = "SELECT * FROM pedido ORDER BY CodPedido DESC LIMIT 1;";
        $libros = $this->conexion->query($sql);
        return $libros;
    }
    function iniciarTransaccion()
    {
        $this->conexion->beginTransaction();
    }
    function finalizarTransaccion()
    {
        $this->conexion->commit();
    }
    public function cancelarTransaccion()
    {
        $this->conexion->rollBack();
    }
    function insertarPedidosProductos($array)
    {
        try {
            $sql = "INSERT INTO `pedidosproductos`( `CodPedido`, `CodProducto`, `Cantidad`) VALUES ($array[idpedido], $array[idproducto],$array[cantidad])";
            echo $sql;
            $resultado = $this->conexion->query($sql);
            if ($resultado) {
                echo "Usuario dado de alta correctamente.";
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
    function insertarRestaurante($array)
    {
        try {
            $sql = "INSERT INTO `restaurante`(`Correo`, `Clave`, `Direccion`,`CodPostal`,`Pais`) VALUES ('$array[Correo]','$array[Clave]','$array[Direccion]',$array[CodPostal],'$array[Pais]')";

            $resultado = $this->conexion->query($sql);
            if ($resultado) {
                echo "Usuario dado de alta correctamente.";
                return $resultado;
            } else {
                echo "Introduzca correctamente los campos sin que esten repetidos<br>";
                throw new \Exception("Error por consulta");
            }
        } catch (\PDOException $e) {
            echo "error pdo rellene todos los campos sin que ya exsistan";
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
    function updateRestaurante($array)
    {

        $contador = 0;
        $sentencia = "";

        foreach ($array as $key => $value) {
            $sentencia = $sentencia . $key . $value;
            if ($contador < count($array) - 2) {
                $sentencia = $sentencia . ", ";
            }
            $contador++;
        }
        $sql = "UPDATE `restaurante` SET " . $sentencia;
        echo $sql;
        $result = $this->conexion->query($sql);
        return $result;
    }
}
