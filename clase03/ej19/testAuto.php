<?php

require_once 'auto.php'; // Incluye el archivo donde está definida la clase Auto

// Crear dos objetos "Auto" de la misma marca y distinto color
$auto1 = new Auto("Toyota", "Rojo", 10000);
$auto2 = new Auto("Toyota", "Azul", 12000);

// Crear dos objetos "Auto" de la misma marca, mismo color y distinto precio
$auto3 = new Auto("Honda", "Verde", 15000);
$auto4 = new Auto("Honda", "Verde", 16000);

// Crear un objeto "Auto" utilizando la sobrecarga restante
$auto5 = new Auto("Ford", "Negro", 18000, new DateTime('2023-08-01'));

// Utilizar el método "AgregarImpuestos" en los últimos tres objetos, agregando $1500 al atributo precio
$auto3->AgregarImpuestos(1500);
$auto4->AgregarImpuestos(1500);
$auto5->AgregarImpuestos(1500);

// Obtener el importe sumado del primer objeto "Auto" más el segundo y mostrar el resultado obtenido
$importeSumado = Auto::Add($auto1, $auto2);
echo "Importe sumado de auto1 y auto2: $importeSumado\n";

// Comparar el primer "Auto" con el segundo y quinto objeto e informar si son iguales o no
$sonIguales1y2 = $auto1->Equals($auto2);
$sonIguales1y5 = $auto1->Equals($auto5);

echo "El auto1 y auto2 son iguales: " . ($sonIguales1y2 ? "Sí" : "No") . "\n";
echo "El auto1 y auto5 son iguales: " . ($sonIguales1y5 ? "Sí" : "No") . "\n";

// Utilizar el método de clase "MostrarAuto" para mostrar cada uno de los objetos impares (1, 3, 5)
function MostrarAuto($auto)
{
    echo $auto->mostrarInformacion() . "\n";
}

// Mostrar información de los autos impares (1, 3, 5)
MostrarAuto($auto1);
MostrarAuto($auto3);
MostrarAuto($auto5);

// Guardar información de los autos en el archivo CSV
$archivoCSV = "autos.csv";
$auto1->guardarEnCSV($archivoCSV);
$auto2->guardarEnCSV($archivoCSV);
$auto3->guardarEnCSV($archivoCSV);
$auto4->guardarEnCSV($archivoCSV);
$auto5->guardarEnCSV($archivoCSV);

echo "Información de los autos guardada en el archivo CSV.\n";

?>
