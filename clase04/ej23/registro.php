<?php
require_once 'usuario.php';

if (isset($_POST['nombre'], $_POST['clave'], $_POST['mail'], $_FILES['imagen'])) {
    $nombre = $_POST['nombre'];
    $clave = $_POST['clave'];
    $mail = $_POST['mail'];
    $imagen = $_FILES['imagen'];

    $usuario = new Usuario($nombre, $clave, $mail, $imagen);

    // Subir imagen al servidor
    $directorioDestino = 'Usuario/fotos';
    $resultadoImagen = $usuario->subirImagen($directorioDestino);

    if ($resultadoImagen) {
        $pathJson = 'usuarios.json';
        $resultadoJson = $usuario->guardarEnJson($pathJson);

        if ($resultadoJson) {
            echo "Usuario registrado correctamente.";
        } else {
            echo "Error al guardar los datos en JSON.";
        }
    } else {
        echo "Error al subir la imagen.";
    }
} else {
    echo "Faltan datos o archivo.";
}
?>
