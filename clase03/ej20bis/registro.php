<?php
//Arguindegui Andres
$nombre = $_POST['nombre'] ?? '';
$clave = $_POST['clave'] ?? '';
$mail = $_POST['mail'] ?? '';

if (empty($nombre) || empty($clave) || empty($mail)) {
    echo "Todos los campos son obligatorios.";
    exit;
}

$usuario = new Usuario($nombre, $clave, $mail);

$archivoCSV = 'usuarios.csv';
$usuario->guardarEnCSV($archivoCSV);

class Usuario
{
    private $_nombre;
    private $_clave;
    private $_mail;

    public function __construct($nombre, $clave, $mail)
    {
        $this->_nombre = $nombre;
        $this->_clave = $clave;
        $this->_mail = $mail;
    }

    public function guardarEnCSV($archivo)
    {
        $fp = fopen($archivo, 'a');

        fputcsv($fp, [$this->_nombre, $this->_clave, $this->_mail]);

        fclose($fp);

        echo "Guardado con éxito";
    }
}
?>
