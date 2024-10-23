<?php
// Incluir Auto.php (que está en la carpeta ej17)
require_once __DIR__ . '/../ej17/Auto.php';
// Incluir Garage.php (que está en la misma carpeta que testGarage.php)
require_once __DIR__ . '/Garage.php';

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
echo $garage->add($auto1) . "\n"; //  "Auto agregado exitosamente."
echo $garage->add($auto2) . "\n"; // "Auto agregado exitosamente."
echo $garage->add($auto3) . "\n"; //  "El auto ya está en el garaje."
echo $garage->add($auto4) . "\n"; //  "Auto agregado exitosamente."
echo $garage->add($auto5) . "\n"; // "Auto agregado exitosamente."

// Mostrar información del garage
echo "Información del garaje:\n";
echo $garage->mostrarGarage() . "\n";

echo $garage->add($auto1) . "\n"; //"El auto ya está en el garaje."

// Eliminar un auto del garage
echo $garage->remove($auto2) . "\n"; //"Auto eliminado exitosamente."

echo $garage->remove($auto2) . "\n"; //"El auto no está en el garaje."

echo "Información del garaje después de eliminar un auto:\n";
echo $garage->mostrarGarage() . "\n";

echo "¿El auto1 está en el garaje?: " . ($garage->equals($auto1) ? "Sí" : "No") . "\n"; // Sí
echo "¿El auto2 está en el garaje?: " . ($garage->equals($auto2) ? "Sí" : "No") . "\n"; // No
echo "¿El auto5 está en el garaje?: " . ($garage->equals($auto5) ? "Sí" : "No") . "\n"; // Sí

?>
