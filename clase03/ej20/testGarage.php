<?php
// Incluir Auto.php (que está en la carpeta ej17)
require_once __DIR__ . '/../ej19/auto.php';
require_once __DIR__ . '/garage.php';

// Código adicional aquí


// Crear autos
$auto1 = new Auto("Toyota", "Rojo", 10000);
$auto2 = new Auto("Honda", "Verde", 15000);
$auto3 = new Auto("Toyota", "Rojo", 12000); // Mismo marca y color que auto1, pero con un precio diferente
$auto4 = new Auto("Ford", "Azul", 20000);
$auto5 = new Auto("Toyota", "Rojo", 11000, new DateTime()); // Auto con todos los parámetros

// Crear un garage
$garage = new Garage("Garaje Central", 10.0);

// Agregar autos al garage
echo $garage->add($auto1) . "\n"; // Debería ser "Auto agregado exitosamente."
echo $garage->add($auto2) . "\n"; // Debería ser "Auto agregado exitosamente."
echo $garage->add($auto3) . "\n"; // Debería ser "El auto ya está en el garaje."
echo $garage->add($auto4) . "\n"; // Debería ser "Auto agregado exitosamente."
echo $garage->add($auto5) . "\n"; // Debería ser "Auto agregado exitosamente."

// Mostrar información del garage
echo "Información del garaje:\n";
echo $garage->mostrarGarage() . "\n";

// Agregar un auto que ya está en el garage
echo $garage->add($auto1) . "\n"; // Debería ser "El auto ya está en el garaje."

// Eliminar un auto del garage
echo $garage->remove($auto2) . "\n"; // Debería ser "Auto eliminado exitosamente."

// Intentar eliminar un auto que no está en el garage
echo $garage->remove($auto2) . "\n"; // Debería ser "El auto no está en el garaje."

// Mostrar información del garage después de eliminar un auto
echo "Información del garaje después de eliminar un auto:\n";
echo $garage->mostrarGarage() . "\n";

// Comparar autos
echo "¿El auto1 está en el garaje?: " . ($garage->equals($auto1) ? "Sí" : "No") . "\n"; // Sí
echo "¿El auto2 está en el garaje?: " . ($garage->equals($auto2) ? "Sí" : "No") . "\n"; // No
echo "¿El auto5 está en el garaje?: " . ($garage->equals($auto5) ? "Sí" : "No") . "\n"; // Sí

$archivoCSV = "garage.csv";
$garage->guardarEnCSV($archivoCSV);

?>
