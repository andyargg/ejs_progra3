<?php
//Arguindegui Andres
require_once 'Usuario.php'; 

$nombre = $_POST['nombre'] ?? '';
$clave = $_POST['clave'] ?? '';
$mail = $_POST['mail'] ?? '';

if (empty($nombre) || empty($clave) || empty($mail)) {
    echo "Todos los campos son obligatorios.";
    exit;
}

$archivoCSV = 'usuarios.csv';
$resultado = Usuario::verificarUsuario($nombre, $clave, $mail, $archivoCSV);
echo $resultado;

?>
