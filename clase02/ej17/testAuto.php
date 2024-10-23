<?php

require_once 'Auto.php'; 

$auto1 = new Auto("Toyota", "Rojo", 10000);
$auto2 = new Auto("Toyota", "Azul", 12000);

$auto3 = new Auto("Honda", "Verde", 15000);
$auto4 = new Auto("Honda", "Verde", 16000);

$auto5 = new Auto("Ford", "Negro", 18000, new DateTime('2023-08-01'));

$auto3->AgregarImpuestos(1500);
$auto4->AgregarImpuestos(1500);
$auto5->AgregarImpuestos(1500);

$importeSumado = Auto::Add($auto1, $auto2);
echo "Importe sumado de auto1 y auto2: $importeSumado\n";

$sonIguales1y2 = $auto1->Equals($auto2);
$sonIguales1y5 = $auto1->Equals($auto5);

echo "El auto1 y auto2 son iguales: " . ($sonIguales1y2 ? "Sí" : "No") . "\n";
echo "El auto1 y auto5 son iguales: " . ($sonIguales1y5 ? "Sí" : "No") . "\n";

function MostrarAuto($auto)
{
    echo $auto->mostrarInformacion() . "\n";
}

MostrarAuto($auto1);
MostrarAuto($auto3);
MostrarAuto($auto5);

?>
