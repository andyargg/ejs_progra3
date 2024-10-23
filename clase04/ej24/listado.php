<?php
require_once '../ej23/usuario.php';

// Verificar si el parámetro 'listado' está definido en el GET
if (isset($_GET['listado'])) {
    $listado = $_GET['listado'];

    // Solo tenemos usuarios por ahora
    if ($listado == 'usuarios') {
        // Cargar el archivo usuarios.json
        $usuarios = Usuario::cargarDesdeJson('../ej23/usuarios.json');

        // Verificar si hay usuarios cargados
        if (!empty($usuarios)) {
            // Retornar los usuarios como una lista en formato JSON
            echo json_encode(Usuario::usuariosComoArray($usuarios));
        } else {
            echo json_encode(['error' => 'No hay usuarios disponibles']);
        }
    } else {
        echo json_encode(['error' => 'Listado no disponible']);
    }
} else {
    echo json_encode(['error' => 'Debe especificar el tipo de listado']);
}
?>
