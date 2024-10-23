<?php
require 'producto.php'; // Asegúrate de tener la clase Producto en este archivo

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recibir los datos del producto
    $codigoBarra = $_POST['codigoBarra'];
    $nombre = $_POST['nombre'];
    $tipo = $_POST['tipo'];
    $stock = $_POST['stock'];
    $precio = $_POST['precio'];

    // Crear una instancia de Producto
    $producto = new Producto($codigoBarra, $nombre, $tipo, $stock, $precio);

    // Usar el método para agregar o actualizar el producto
    $resultado = $producto->guardarProducto();

    // Devolver el resultado
    echo $resultado;
}
?>
