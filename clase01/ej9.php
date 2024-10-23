<!-- Realizar las líneas de código necesarias para generar un Array asociativo $lapicera, que
contenga como elementos: ‘color’, ‘marca’, ‘trazo’ y ‘precio’. Crear, cargar y mostrar tres
lapiceras. -->
<!-- Andres Arguindegui -->

<?php 
function crearLapicera($color, $marca, $trazo, $precio){
    $v = [
        "color" => $color,
        "marca" => $marca,
        "trazo" => $trazo, 
        "precio" => $precio,
    ];

    return $v;
}

$lapicera1 = crearLapicera('Azul', 'Bic', 'Fino', 1.50);
$lapicera2 = crearLapicera('Negro', 'Faber-Castell', 'Medio', 2.00);
$lapicera3 = crearLapicera('Rojo', 'Pilot', 'Grueso', 3.25);

$lapiceras = [$lapicera1, $lapicera2, $lapicera3];

foreach ($lapiceras as $index => $lapicera) {
    echo "Lapicera " . ($index + 1) . ":<br/>";
    foreach ($lapicera as $clave => $valor) {
        echo ucfirst($clave) . ": $valor<br/>";
    }
    echo "<br/>";
}