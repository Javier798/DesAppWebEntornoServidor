<?php 

use Firebase\JWT\JWT;

class ApiController
{
    var $productos;
    var $key = 'my_secret_key'; 
    const DATA = '222';
    var $gestor;
    function __construct()
    {
        $this->gestor = new bd(Conexion::getConexion("localhost", "dwes_pedidos", "root", ""));
        $this->productos= $this->gestor->obtenerProductos();
    }
    
    /**
     Los códigos de respuesta más comúnmente utilizados con REST son:
     
     200 OK. Satisfactoria.
     201 Created. Un resource se ha creado. Respuesta satisfactoria a un request POST o PUT.
     400 Bad Request. El request tiene algún error, por ejemplo cuando los datos proporcionados en POST o PUT no pasan la validación.
     401 Unauthorized. Es necesario identificarse primero.
     404 Not Found. Esta respuesta indica que el resource requerido no se puede encontrar (La URL no se corresponde con un resource).
     405 Method Not Allowed. El método HTTP utilizado no es soportado por este resource.
     409 Conflict. Conflicto, por ejemplo cuando se usa un PUT request para crear el mismo resource dos veces.
     500 Internal Server Error. Un error 500 suele ser un error inesperado en el servidor.
     
     **/

    /**
     * Autenticación básica. Se obtendrá un response si el usuario y password facilitado en 
     * la cabecera es correcta, sin devolver ningún token adicional.
     */
    public function getCoches(){
        $check = $this->basicAuthorization();
        if ($check){
            header("Content-Type: application/json', 'HTTP/1.1 200 OK");
            echo json_encode($this->coches);
        }else{
            header('HTTP/1.1 401 Unauthorized', true, 401);
            echo "Acceso no autorizado ";
        }
    }
   
    
    /**
     * Autenticación básica. Se obtendrá un response si el usuario y password facilitado en 
     * la cabecera es correcta, pero en esta ocasión devolverá un token adicional (JWT), que será transportado
     * en el resto de peticiones mediante autenticación Bearer.
     */
    public function getTokenJWT(){
        $check = $this->basicAuthorization();
        if ($check){
            header("Content-Type: application/json', 'HTTP/1.1 200 OK");
            $array = array();
            $array["token"] = $this->getJWT(self::DATA);
            // Lo suyo sería obtener el token con datos del usuario al que se le entrega el token, si es que
            // hay usuarios personalizados. Si es un servicio general, se le entrega un dato genérico para todos
            // Se transporta el token para ser reenviado en posteriores llamadas al API Rest
            echo json_encode($array);
        }else{
            header('HTTP/1.1 401 Unauthorized', true, 401);
            echo "Acceso no autorizado ";
        }
    }
    
    /**
     * Autenticación básica. Se obtendrá un response si el usuario y password facilitado en
     * la cabecera es correcta, devolverá un token simple que será transportado
     * en el resto de peticiones mediante autenticación Bearer.
     */
    public function getTokenSimple(){
        $check = $this->basicAuthorization();
        if ($check){
            header("Content-Type: application/json', 'HTTP/1.1 200 OK");
            $array = array();
            $array["token"] = $this->getToken(20);
            echo json_encode($array);
        }else{
            header('HTTP/1.1 401 Unauthorized', true, 401);
            echo "Acceso no autorizado ";
        }
    }
    
    /**
     * Autenticación Bearer. Se transporta en la cabecera el token simple obtenido en la petición de login simple.
     * Debe verificarse que el token es válido: se almacenará en BD la lista de tokens para ello.
     */
    public function getCategoriasSimple(){
        $token = $this->getBearerToken();
        // Este condicional debe transformarse en una peticion a BD
        // y verificar que el $token existe en la tabla de la BD
        if ($token=="8d4fc8d0b16fe0e715ac"){ 
            header("Content-Type: application/json', 'HTTP/1.1 200 OK");
            $array = array();
            $array["categorias"]=array();
            $resultado = $this->gestor->obtenerCategorias();
            foreach ($resultado as $categoria) {
                array_push($array["categorias"],$categoria);
            }
            echo json_encode($array);
        }else{
            header('HTTP/1.1 401 Unauthorized', true, 401);
            echo "Acceso no autorizado ";
        }
    }
    
    /**
     * Autenticación Bearer. Se transporta en la cabecera el token JWT obtenido en la petición de login.
     * Debe verificarse que el JWT es válido. Puede usarse a modo de testeo adicional https://jwt.io/
     */
    public function getPrdoCategorias($id){
        $jwt = $this->getBearerToken();
        try{
            $dataObject = JWT::decode($jwt, $this->key, array('HS256'));
            $data = (array) $dataObject;
            if ($data["passwordToken"] = self::DATA){
                header("Content-Type: application/json', 'HTTP/1.1 200 OK");
                $array = array();
                $array["categorias"]=array();
                $arrayFiltros = [
                    "CodCategoria=" => $id
                ];
                $resultado = $this->gestor->obtenerProductosFiltros($arrayFiltros);
            foreach ($resultado as $categoria) {
                array_push($array["categorias"],$categoria);
            }
                echo json_encode($array);
            }else{
                header('HTTP/1.1 401 Unauthorized', true, 401);
                echo "Token incorrecto ";
            }
        }catch(\Exception $e){
            header('HTTP/1.1 401 Unauthorized', true, 401);
            echo "Acceso no autorizado. Token inválido. ".$e->getMessage();
        }
    }

    public function getPedidosRes($id){
        $jwt = $this->getBearerToken();
        try{
            $dataObject = JWT::decode($jwt, $this->key, array('HS256'));
            $data = (array) $dataObject;
            if ($data["passwordToken"] = self::DATA){
                header("Content-Type: application/json', 'HTTP/1.1 200 OK");
                $array = array();
                $array["pedidos"]=array();
                $arrayFiltros = [
                    "CodRes=" => $id
                ];
                $resultado = $this->gestor->obtenerPedidosFiltros($arrayFiltros);
            foreach ($resultado as $pedido) {
                array_push($array["pedidos"],$pedido);
            }
                echo json_encode($array);
            }else{
                header('HTTP/1.1 401 Unauthorized', true, 401);
                echo "Token incorrecto ";
            }
        }catch(\Exception $e){
            header('HTTP/1.1 401 Unauthorized', true, 401);
            echo "Acceso no autorizado. Token inválido. ".$e->getMessage();
        }
    }
    
    /**
     * Get header Authorization
     * */
    function getAuthorizationHeader(){
        $headers = null;
        if (isset($_SERVER['Authorization'])) {
            $headers = trim($_SERVER["Authorization"]);
        }else if (isset($_SERVER['HTTP_AUTHORIZATION'])) { //Nginx or fast CGI
            $headers = trim($_SERVER["HTTP_AUTHORIZATION"]);
        }elseif (function_exists('apache_request_headers')) {
            $requestHeaders = apache_request_headers();
            // Server-side fix for bug in old Android versions (a nice side-effect of this fix means we don't care about capitalization for Authorization)
            $requestHeaders = array_combine(array_map('ucwords', array_keys($requestHeaders)), array_values($requestHeaders));
            //print_r($requestHeaders);
            if (isset($requestHeaders['Authorization'])) {
                $headers = trim($requestHeaders['Authorization']);
            }
        }
        return $headers;
    }
    
    /**
     * get access token from header
     * */
    function getBearerToken() {
        $headers = $this->getAuthorizationHeader();
        // HEADER: Get the access token from the header
        if (!empty($headers)) {
            if (preg_match('/Bearer\s(\S+)/', $headers, $matches)) {
                return $matches[1];
            }
        }
        return null;
    }
    
    private function basicAuthorization(){
        $arrayFiltros = [
            "CORREO=" => "'" . $_SERVER['PHP_AUTH_USER'] . "'"
        ];
        $usu="";
        $contrasena="";
        $resultado = $this->gestor->obtenerRestaurantesFiltros($arrayFiltros);
        foreach ($resultado as $usuario) {
            $usu=$usuario["Correo"];
            $contrasena =$usuario["Clave"];
        }
        if ((isset($_SERVER['PHP_AUTH_USER'])) && (isset($_SERVER['PHP_AUTH_PW']))) {
            if (($_SERVER['PHP_AUTH_USER'] == $usu) && ($_SERVER['PHP_AUTH_PW'] == $contrasena)) {
                return true;
            }
            else {
                return false;
            }
        }else{
            return false;
        }
    }
    
    private function tokenAuthorization(){
        if (($_SERVER['PHP_AUTH_USER'] == "111") && ($_SERVER['PHP_AUTH_PW'] == "222")) {
            return true;
        }else {
            return false;
        }
    }
    
    // Token criptográficamente seguro, pero no podemos asociarle informacion como sucede con el JWT
    private function getToken($longitud){
        if ($longitud < 4) {
            $longitud = 4;
        }
        $token = bin2hex(random_bytes(($longitud - ($longitud % 2)) / 2));
        // El token sólo será válido si no está repetido en BD. Se ser así, se 
        // almacenará en la tabla correspondiente
        return $token;
    }
    
    // Ejecutar composer require firebase/php-jwt en la raíz de mvc_api_rest
    // Esto generará la carpeta vendor con la librería de Firebase para obtener tokens
    // En el frontal index.php se incluye 'require("./vendor/autoload.php");'
    // En esta clase se incluye 'use Firebase\JWT\JWT;'
    // URL tutorial: https://anexsoft.com/implementacion-de-json-web-token-con-php
    private function getJWT($data){ 
        $time = time();      
        $token = array(
            'iat' => $time, // Tiempo que inició el token
            'exp' => $time + (60*60), // Tiempo que expirará el token (+1 hora)
            'data' => [ // información del usuario o lo que consideremos necesario incluir
                'idUser' => 1, // Se obtendría de BD si hay usuarios personalizados
                'passwordUser' => '222', // Se obtendría de BD si hay usuarios personalizados
                'passwordToken' => $data // Para usuarios genéricos
            ]
        );     
        $jwt = JWT::encode($token, $this->key); 
        return $jwt;
        //$data = JWT::decode($jwt, $key, array('HS256')); // Si ha expirado dará un error
        //var_dump($jwt);
        //var_dump($data);
    }
    
}

?>