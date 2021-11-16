<?php
class controllerCompra
{
    function categorias()
    {
        $gestor = new bd(Conexion::getConexion("localhost", "dwes_pedidos", "root", ""));
        $categorias = $gestor->obtenerCategorias();
        $verCarrito = controllerSesion::getRuta("/carrito","/categorias");
        $verCategorias = controllerSesion::getRuta("/categorias","/categorias");
        $verLogout = controllerSesion::getRuta("/logout","/categorias");
        $mostrarProdctos= controllerSesion::getRuta("/mostrarProductos","/categorias");
    }
    function mostrarProductos($id, $nombre)
    {
        $array_rutas = explode("/?", $_SERVER["REQUEST_URI"]);
        $accion =  controllerSesion::getRuta("/anadir","/mostrarProductos/?".$array_rutas[1]);
        $verCarrito = controllerSesion::getRuta("/carrito","/mostrarProductos/?".$array_rutas[1]);
        $verCategorias = controllerSesion::getRuta("/categorias","/mostrarProductos/?".$array_rutas[1]);
        $verLogout = controllerSesion::getRuta("/logout","/mostrarProductos/?".$array_rutas[1]);
        $gestor = new bd(Conexion::getConexion("localhost", "dwes_pedidos", "root", ""));
        $arrayFiltros = [
            "sha1(CodCategoria)=" => "'" . $id . "'"
        ];
        $productos = $gestor->obtenerProductosFiltros($arrayFiltros);
    }
}
