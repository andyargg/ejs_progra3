<?php
//Arguindegui Andres
$listado = $_GET['listado'] ?? '';

if ($listado === 'usuarios') {
    $archivoCSV = 'usuarios.csv';

    if (!file_exists($archivoCSV)) {
        echo "El archivo CSV no existe.";
        exit;
    }

    $usuarios = [];

    if (($fp = fopen($archivoCSV, 'r')) !== false) {
        while (($datos = fgetcsv($fp)) !== false) {
            if (count($datos) === 3) {
                $usuarios[] = [
                    'nombre' => $datos[0],
                    'clave'  => $datos[1],
                    'mail'   => $datos[2]
                ];
            }
        }
        fclose($fp);
    } else {
        echo "Error al abrir el archivo CSV.";
        exit;
    }

    echo "<h1>Listado de Usuarios</h1>";
    echo "<ul>";

    foreach ($usuarios as $usuario) {
        echo "<li>Nombre: {$usuario['nombre']}, Clave: {$usuario['clave']}, Mail: {$usuario['mail']}</li>";
    }

    echo "</ul>";
} else {
    echo "Listado no reconocido.";
}
?>
