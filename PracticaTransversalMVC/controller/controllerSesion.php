<?php
class controllerSesion
{
    public function login()
    {
        $accion_actual = "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
        $ruta = str_replace("/login", "", $accion_actual);
        
        $borrar=explode("?",$ruta);
        if(count($borrar)>1){
            $borrar = $borrar[1];
            $ruta = str_replace("?".$borrar,"",$ruta);
            $ruta = str_replace("//","",$ruta);
        }
        
        $accion=  $ruta . "/comprobarlogin";
        echo "<br>HOLA->".$accion;
        require("view/login.php");
    }
    function is_valid_email($str)
    {
        return (false !== filter_var($str, FILTER_VALIDATE_EMAIL));
    }
    function comprobarLogin($restaurante, $contraseña)
    {
        $restaurante = $_POST["usuario"];
        $contraseña = $_POST["contraseña"];
        

        $accion_actual = "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
        $ruta_hasta_frontal = str_replace("/comprobarlogin", "", $accion_actual);
        echo $ruta_hasta_frontal;
        if(!empty($restaurante)||!empty($contraseña)){
            $nueva_accion = $ruta_hasta_frontal.'/login';
            echo '<script>alert("Error en la autentificacioasdfn")</script>';
            //header("Location: ".$nueva_accion);
            //   header('Location: login/?respuesta=' . "Usuario o contraseña incorrectos<br>");
            //   return true;
        }
       
        $arrayFiltros = [
            "CORREO=" => "'" . $restaurante . "'"
        ];
        $gestor = new bd(Conexion::getConexion("localhost", "dwes_pedidos", "root", ""));

        $resultado = $gestor->obtenerRestaurantesFiltros($arrayFiltros);
        if ($resultado->rowCount() == 0) {
            
            $nueva_accion = $ruta_hasta_frontal.'/login';
            header("Location: ".$nueva_accion);
           // header('Location: login/?respuesta=' . "Usuario Incorrecto<br>");
            return [false,"Location: ".$nueva_accion];
        }
        foreach ($resultado as $usuario) {
            if ($usuario["Clave"] == $contraseña) {
                $_SESSION["usuario"] = $usuario["Correo"];
                $_SESSION["productos"] = array();
              //  header('Location: categorias');
            } else {
                $nueva_accion = $ruta_hasta_frontal.'/login';
             //   header("Location: ".$nueva_accion);
             //   header('Location: login/?respuesta=' . "Usuario o contraseña incorrectos<br>");
             //   return true;
            }
        }
    }
}
