<!-- //Aplicación No 1 (Sumar números)
Confeccionar un programa que sume todos los números enteros desde 1 mientras la suma no
supere a 1000. Mostrar los números sumados y al finalizar el proceso indicar cuantos números
se sumaron. -->
<!-- Andres Arguindegui -->
<?php
$suma = 0;
$contador = 0;

for ($i = 1; $suma + $i <= 1000; $i++) {
    $suma += $i;
    echo "Número sumado: $i" . "<br/>";
    $contador++;
}

echo "Total de números sumados: $contador " . "<br/>";
echo "Suma total: $suma " . "<br/>";

?>

