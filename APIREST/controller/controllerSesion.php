<?php
class controllerSesion
{
    public function login($respuesta)
    {

        $accion =  $this->getRuta("/comprobarlogin", "/login");
        $registro = $this->getRuta("/registro", "/login");
        $contraseña = $this->getRuta("/correoContrasena", "/login");
    }
    function is_valid_email($str)
    {
        return (false !== filter_var($str, FILTER_VALIDATE_EMAIL));
    }
    function comprobarLogin()
    {
        $restaurante = $_POST["usuario"];
        $contraseña = $_POST["contraseña"];
        $arrayFiltros = [
            "CORREO=" => "'" . $restaurante . "'"
        ];
        $gestor = new bd(Conexion::getConexion("localhost", "dwes_pedidos", "root", ""));
        $resultado = $gestor->obtenerRestaurantesFiltros($arrayFiltros);
        foreach ($resultado as $usuario) {
            if ($usuario["Clave"] == $contraseña) {
                $_SESSION["usuario"] = $usuario["Correo"];
                $_SESSION["productos"] = array();
                $ruta = $this->getRuta("/categorias", "/comprobarlogin");
                header("Location: " . $ruta);
                return;
            } else {
                $respuesta = "Usuario o contraseña incorrectos";
                $_SESSION["respuestaLogin"] = $respuesta;
                header("Location: " . $ruta);
                return;
            }
        }
    }
    function comprobarSession($accionActual)
    {

        if (!isset($_SESSION["usuario"])) {
            header('Location: ' . $this->getRuta("/login", $accionActual));
            return;
        }
    }
    static function getRuta($accionDestino, $accionActual)
    {

        $rutaActual = "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];

        $ruta = str_replace($accionActual, "", $rutaActual);

        $accion =  $ruta . $accionDestino;

        return $accion;
    }
}
