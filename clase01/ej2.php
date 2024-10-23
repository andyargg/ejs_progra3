<!-- Obtenga la fecha actual del servidor (función date) y luego imprímala dentro de la página con
distintos formatos (seleccione los formatos que más le guste). Además indicar que estación del
año es. Utilizar una estructura selectiva múltiple. -->
<!-- Andres Arguindegui -->

<?php
$fecha_actual = date("Y-m-d");
$mes = date("m");
$dia = date("d");

echo "Fecha en formato estándar: " . date("Y-m-d") . "<br/>";
echo "Fecha en formato extendido: " . date("l, d F Y") . "<br/>";
echo "Hora actual: " . date("H:i:s") . "\n";
echo "Fecha con formato corto: " . date("d/m/Y") . "<br/>";

$estacion = "";

switch ($mes) {
    case 12:
    case 1:
    case 2:
        $estacion = "Verano";
        break;
    case 3:
    case 4:
    case 5:
        $estacion = "Otoño";
        break;
    case 6:
    case 7:
    case 8:
        $estacion = "Invierno";
        break;
    case 9:
    case 10:
    case 11:
        $estacion = "Primavera";
        break;
}

echo "La estación del año es: $estacion";

?>