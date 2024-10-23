<?php

require_once '../ej25/producto.php';
require_once '../ej23/usuario.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibir el ID del usuario desde POST
    $usuarioId = $_POST['usuarioId'];
    $codigoBarra = $_POST['codigoBarra'];
    $cantidad = $_POST['cantidad'];

    // Verificar si el usuario existe
    if (Usuario::verificarUsuario($usuarioId, '../ej23/usuarios.json')) {
        echo "Usuario encontrado";

        if (Producto::verificarProductoPorCodigo($codigoBarra, '../ej25/productos.json') && Producto::verificarStock($codigoBarra, '../ej25/productos.json')){
            Producto::realizarVenta($codigoBarra, $cantidad, '../ej25/productos.json');
            echo "venta realizada";
        }
        else{

            echo "producto no encontrado";
        }
    } else {
        echo "Usuario no encontrado";
    }
} else {
    echo "Método no soportado";
}
