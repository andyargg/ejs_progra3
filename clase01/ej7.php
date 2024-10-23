<!-- Generar una aplicación que permita cargar los primeros 10 números impares en un Array.
Luego imprimir (utilizando la estructura for) cada uno en una línea distinta (recordar que el
salto de línea en HTML es la etiqueta <br/>). Repetir la impresión de los números
utilizando las estructuras while y foreach. -->
<!-- Andres Arguindegui -->
 
<?php
$numerosImpares = [];

$numero = 1;
while (count($numerosImpares) < 10) {
    if ($numero % 2 != 0) {
        $numerosImpares[] = $numero;
    }
    $numero++;
}

echo "Los primeros 10 números impares son:<br/>";
foreach ($numerosImpares as $impar) {
    echo $impar . "<br/>";
}
?>
