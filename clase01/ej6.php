<!-- Definir un Array de 5 elementos enteros y asignar a cada uno de ellos un número (utilizar la
función rand). Mediante una estructura condicional, determinar si el promedio de los números
son mayores, menores o iguales que 6. Mostrar un mensaje por pantalla informando el
resultado. -->
<!-- Andres Arguindegui -->
 
<?php

$numeros = [];

// Asignar un número aleatorio a cada elemento del array
for ($i = 0; $i < 5; $i++) {
    $numeros[$i] = rand(1, 100); // Puedes ajustar el rango de los números aleatorios
}

echo "Los números generados son: <br/>";
foreach ($numeros as $numero) {
    echo $numero . "<br/>";
}


$suma = array_sum($numeros);
$promedio = $suma / count($numeros);
if ($promedio > 6) {
    echo "El promedio es mayor que 6.";
} elseif ($promedio < 6) {
    echo "El promedio es menor que 6.";
} else {
    echo "El promedio es igual a 6.";
}
