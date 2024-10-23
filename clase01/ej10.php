<!-- Realizar las líneas de código necesarias para generar un Array asociativo y otro indexado que
contengan como elementos tres Arrays del punto anterior cada uno. Crear, cargar y mostrar los
Arrays de Arrays. -->
<!-- Andres Arguindegui -->


<?php
function crearLapicera($color, $marca, $trazo, $precio){
    return [
        "color" => $color,
        "marca" => $marca,
        "trazo" => $trazo, 
        "precio" => $precio,
    ];
}

$lapicera1 = crearLapicera('Azul', 'Bic', 'Fino', 1.50);
$lapicera2 = crearLapicera('Negro', 'Faber-Castell', 'Medio', 2.00);
$lapicera3 = crearLapicera('Rojo', 'Pilot', 'Grueso', 3.25);

$arrayIndexado = [$lapicera1, $lapicera2, $lapicera3];

$arrayAsociativo = [
    'lapicera1' => $lapicera1,
    'lapicera2' => $lapicera2,
    'lapicera3' => $lapicera3,
];

echo "<h2>Array Indexado:</h2>";
foreach ($arrayIndexado as $index => $lapicera) {
    echo "Lapicera " . ($index + 1) . ":<br/>";
    foreach ($lapicera as $clave => $valor) {
        echo ucfirst($clave) . ": $valor<br/>";
    }
    echo "<br/>";
}

echo "<h2>Array Asociativo:</h2>";
foreach ($arrayAsociativo as $nombre => $lapicera) {
    echo ucfirst($nombre) . ":<br/>";
    foreach ($lapicera as $clave => $valor) {
        echo ucfirst($clave) . ": $valor<br/>";
    }
    echo "<br/>";
}
?>
