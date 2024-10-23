<?php

function buscarPorPalabra($string, $max) {
    $palabrasValidas = ["recuperatorio", "parcial", "programacion"];

    if (strlen($string) > $max) {
        return 0;
    }

    if (in_array(strtolower($string), $palabrasValidas)) {
        return 1;
    } else {
        return 0;
    }
}

$palabra = "Parcial";
$max = 10;
$resultado = buscarPorPalabra($palabra, $max);

echo $resultado;  



